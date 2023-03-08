<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\Page;
use Illuminate\Support\Str;

class Pages extends Administrator {

    public $model;
    public $module;
    public $rules;

    public function __construct(Page $model, Request $request) {
        parent::__construct();
        $this->module = 'pages';
        $this->model = $model;
        $this->rules = [
            'title' => 'required',
        ];
        /////////////////////// main_image validation
        if ($request->is('admin/' . $this->module . '/create*')) {
            $this->rules['main_image'] = "image";
        }
        if ($request->is('admin/' . $this->module . '/edit*')) {
            $this->rules['main_image'] = "image";
        }
        /////////////////////////
    }

    public function getIndex(Request $request) {
        authorize('view-' . $this->module);
        $rows = $this->model->latest();
        $rows = $rows->paginate();
        return view('admin.' . $this->module . '.index', ['rows' => $rows, 'module' => $this->module]);
    }

    public function getView($id) {
        authorize('view-' . $this->module);
        $row = $this->model->findOrFail($id);
        return view('admin.' . $this->module . '.view', ['row' => $row, 'module' => $this->module]);
    }

    public function getCreate() {
        authorize('create-' . $this->module);
        $row = $this->model;
        return view('admin.' . $this->module . '.create', ['row' => $row, 'module' => $this->module]);
    }

    public function postCreate(Request $request) {
        authorize('create-' . $this->module);
        $this->validate($request, $this->rules);
        if ($row = $this->model->create($request->all())) {
            $imageSizes = ['small' => 'crop,100x100', 'large' => 'crop,1920x400'];
            $this->model->uploadAndResize('main_image', $row, $imageSizes);
            $this->model->makeSlug($request->input('title'), 'title', $row);
            flash()->success(trans('admin.Add successfull'));
            return redirect('admin/' . $this->module . '');
        }
        flash()->error(trans('admin.failed to save'));
    }

    public function getEdit($id) {
        authorize('edit-' . $this->module);
        $row = $this->model->findOrFail($id);
        return view('admin.' . $this->module . '.edit', ['row' => $row, 'module' => $this->module]);
    }

    public function postEdit($id, Request $request) {
        authorize('edit-'.$this->module);
        $row = $this->model->findOrFail($id);
        $this->validate($request, $this->rules);
        if ($row->update($request->all())) {
            $imageSizes = ['small' => 'crop,100x100', 'large' => 'crop,1920x400'];
            $this->model->uploadAndResize('main_image', $row, $imageSizes);
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

    public function getDeleteMainImage($id) {
        authorize('edit-'.$this->module);
        $row = $this->model->findOrFail($id);
        if ($row->main_image) {
            deleteImage($row->main_image);
            $row->main_image = Null;
            $row->save();
        }
        flash()->success(trans('admin.Delete Successfull'));
        return back();
    }

}
