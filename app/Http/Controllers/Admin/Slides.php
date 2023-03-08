<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\Slide;
use Illuminate\Support\Str;

class Slides extends Administrator {

    public $model;
    public $module;
    public $rules;

    public function __construct(Slide $model, Request $request) {
        parent::__construct();
        $this->module = 'slides';
        $this->model = $model;
        $this->rules = [
            'title' => 'required',
            'order_field'=>'required|min:1'
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
        authorize('create-'.$this->module);
        $this->validate($request, $this->rules);
        if ($row = $this->model->create($request->all())) {
           // $imageSizes = ['small' => 'crop,100x100', 'large' => 'crop,1000x400'];
            if($request->file('main_image')){
                $uploadPath = 'uploads/';
                $image = $request->file("main_image");
                $fileName = Str::random(10) . time() . '.' . $image->getClientOriginalExtension();
                $request->file("main_image")->move($uploadPath, $fileName);
                $filePath = $uploadPath . $fileName;
                $row->main_image = $fileName;
                $row->save();
            }

            //$this->model->uploadAndResize('main_image', $row, $imageSizes);

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
        $row = $this->model->findOrFail($id);
        $this->validate($request, $this->rules);
        if ($row->update($request->all())) {
           // $imageSizes = ['small' => 'crop,100x100', 'large' => 'crop,1000x400'];
            //$this->model->uploadAndResize('main_image', $row, $imageSizes);
            if($request->file('main_image')){
                $uploadPath = 'uploads/';
                $image = $request->file("main_image");
                $fileName = Str::random(10) . time() . '.' . $image->getClientOriginalExtension();
                $request->file("main_image")->move($uploadPath, $fileName);
                $filePath = $uploadPath . $fileName;
                $row->main_image = $fileName;
                $row->save();
            }
            flash()->success(trans('admin.Edit successfull'));
            return redirect('admin/' . $this->module . '/edit/' . $row->id);
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

}
