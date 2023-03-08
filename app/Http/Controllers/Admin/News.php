<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;

class News extends Administrator {

    public $model;
    public $module;
    public $rules;

    public function __construct(\App\Models\News $model, Request $request) {
        parent::__construct();
        $this->module = 'news';
        $this->model = $model;
        // $locale =app()->getLocale();

        // app()->setLocale($locale);
// dd(app()->getLocale());
        $this->rules = [
            'title' => 'required',
            'title_ar' => 'required',
            'content' => 'required',
            'content_ar' => 'required',
            'summary' => 'required',
            'summary_ar' => 'required',
            'post_date' => 'required'
        ];

        /////////////////////// main_image validation
        if ($request->is('admin/' . $this->module . '/create*')) {
            $this->rules['main_image'] = "required|image";
        }
        if ($request->is('admin/' . $this->module . '/edit*')) {
            $this->rules['main_image'] = "image";
        }
        /////////////////////////
    }

    // protected function getMessages(){
    //     return $messages =[
    //         'title.required' =>__('admin.title') ,
    //         'title_ar.required' =>__('admin.title_ar'),
    //         'content.required' =>__('admin.content'),
    //         'content_ar.required' =>__('admin.content_ar'),
    //         'summary.required' =>__('admin.summary'),
    //         'summary_ar.required' =>__('admin.summary_ar'),
    //         'post_date.required' =>__('admin.post_date'),
    //     ];
    // }

    public function getIndex(Request $request) {
        authorize('view-'.$this->module);
        $rows = $this->model->latest();
        $rows = $rows->paginate();
        return view('admin.' . $this->module . '.index', ['rows' => $rows, 'module' => $this->module]);
    }

    public function getView($id) {
        authorize('view-'.$this->module);
        $row = $this->model->findOrFail($id);
        return view('admin.' . $this->module . '.view', ['row' => $row, 'module' => $this->module]);
    }

    public function getCreate() {

        authorize('create-'.$this->module);
        $row = $this->model;
        return view('admin.' . $this->module . '.create', ['row' => $row, 'module' => $this->module]);
    }

    public function postCreate(Request $request) {
        // dd(app()->getLocale());
        authorize('create-'.$this->module);
        // dd($request->all());
    // $messages = $this->getMessages();
        $this->validate($request, $this->rules);
        if ($row = $this->model->create($request->all())) {
            $this->model->makeSlug($request->input('title'), 'slug', $row);
            $imageSizes = ['small' => 'crop,100x100', 'large' => 'resize,600x480'];
            $this->model->uploadAndResize('main_image', $row, $imageSizes);
            if ($request->hasFile('images')) {
                $imageSizes = ['small' => 'crop,100x100', 'large' => 'resize,600x480'];
                foreach ($request->file('images') as $file) {
                    $image = $row->images()->create(['title' => $request->input('title'),
                        'admin_id' => $request->input('admin_id')]);
                    $this->model->uploadAndResizeMultiple($file, $image, 'image_name', $imageSizes);
                }
            }
            flash()->success(trans('admin.Add successfull'));
            return redirect('admin/' . $this->module . '');
        }
        flash()->error(trans('admin.failed to save'));
    }

    public function getEdit($id) {
        authorize('edit-'.$this->module);
        $row = $this->model->findOrFail($id);
        return view('admin.' . $this->module . '.edit', ['row' => $row, 'module' => $this->module]);
    }

    public function postEdit($id, Request $request) {
        authorize('edit-'.$this->module);
        // dd($request->all());
        $row = $this->model->findOrFail($id);
        $this->validate($request, $this->rules);
        if ($row->update($request->all())) {
            $this->model->makeSlug($request->input('title'), 'slug', $row);
            $imageSizes = ['small' => 'crop,100x100', 'large' => 'resize,600x480'];
            $this->model->uploadAndResize('main_image', $row, $imageSizes);
            if ($request->hasFile('images')) {
                $imageSizes = ['small' => 'crop,100x100', 'large' => 'resize,600x480'];
                foreach ($request->file('images') as $file) {
                    $image = $row->images()->create(['title' => $request->input('title'),
                        'admin_id' => $request->input('admin_id')]);
                    $this->model->uploadAndResizeMultiple($file, $image, 'image_name', $imageSizes);
                }
            }

            flash()->success(trans('admin.Edit successfull'));
            return back();
        }
        flash()->error(trans('admin.failed to save'));
    }

    public function getDelete($id) {
        authorize('delete-'.$this->module);
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('admin.Delete successfull'));
        return back();
    }

    public function getPublish($value, $id) {
        authorize('publish-'.$this->module);
        $row = $this->model->findOrFail($id);
        if ($value == 0) {
            $row->published = 0;
            $published = trans('admin.Unpublished');
        } else {
            $row->published = 1;
            $published = trans('admin.Published');
        }
        $row->save();
        flash()->success($published . " " . trans('admin.Successfull'));
        return back();
    }
    public function getDeleteImage($id) {
        $row = \App\Models\Image::whereImageName($id)->orWhere("id", "=", $id)->first();
        if ($row)
            $row->delete();
        flash()->success(trans('admin.Delete successfull'));
        return back();
    }

}
