<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\Image;

class Images extends Administrator {

    public $model;
    public $module;
    public $rules;

    public function __construct(Image $model, Request $request) {
        parent::__construct();
        $this->module = 'images';
        $this->model = $model;
    }

    public function getIndex(Request $request) {
        authorize('view-' . $this->module);
        $rows = $this->model->latest();
        $rows = $rows->paginate();
        return view('admin.' . $this->module . '.index', ['rows' => $rows, 'module' => $this->module]);
    }

    public function getCreate() {
        authorize('create-'.$this->module);
        $row = $this->model;
        return view('admin.' . $this->module . '.create', ['row' => $row, 'module' => $this->module]);
    }

    public function postCreate(Request $request) {
        authorize('create-'.$this->module);
        $this->validate($request, [
            "title" => "required",
            "image_name" => "required"
        ]);
        if ($row = $this->model->create($request->all())) {
            $imageSizes = ['small' => 'crop,100x100', 'large' => 'resize,600x480'];
            $this->model->uploadAndResize('image_name', $row, $imageSizes);

            flash()->success(trans('admin.Add successfull'));
            return redirect('admin/' . $this->module . '');
        }
        flash()->error(trans('admin.failed to save'));
    }

    public function getDelete($id) {
        $row = $this->model->whereImageName($id)->orWhere("id", "=", $id)->first();
        if ($row)
            $row->delete();
        flash()->success(trans('admin.Delete successfull'));
        return back();
    }

    public function getDeleteImage($id) {
        $row = $this->model->whereImageName($id)->orWhere("id", "=", $id)->first();
        if ($row)
            $row->delete();
        flash()->success(trans('admin.Delete successfull'));
        return back();
    }

}
