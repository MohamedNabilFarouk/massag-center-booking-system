<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\PricePlan;
use App\Models\Permission;
use Session;
use Mail;
use Validator;
use App;

class PlansController extends Administrator {

    public $model;
    public $module;
    public $rules;

    public function __construct(PricePlan $model) {
        parent::__construct();
        $this->module = 'price_plans';
        $this->model = $model;
        $this->rules = [
            'title' => 'required|unique:price_plans,title',
            'price' => 'required'
        ];
    }

    public function getIndex(Request $request) {
        $rows = $this->model->latest();
        $rows = $rows->paginate();
        return view('admin.' . $this->module . '.index', ['rows' => $rows, 'module' => $this->module]);
    }

    public function getCreate() {
        $row = $this->model;
        return view('admin.' . $this->module . '.create', ['row' => $row, 'module' => $this->module]);
    }

    public function postCreate(Request $request) {
        $this->validate($request, $this->rules);
        if ($row = $this->model->create($request->except([]))) {
            flash()->success(trans('admin.Add successfull'));
            return redirect('admin/' . $this->module . '');
        }

        flash()->error(trans('admin.failed to save'));
    }

    public function getEdit($id) {
        $row = $this->model->findOrFail($id);
        return view('admin.' . $this->module . '.edit', ['row' => $row, 'module' => $this->module]);
    }

    public function postEdit($id, Request $request) {
        $row = $this->model->findOrFail($id);
        $rules = [
            'title' => 'required|unique:price_plans,title,'.$id,
            'price' => 'required',
        ];
        $this->validate($request, $rules);
        if ($row->update($request->except([]))) {
            flash()->success(trans('admin.Edit successfull'));
            return redirect('admin/' . $this->module . '' );
        }
        flash()->error(trans('admin.failed to save'));
    }

    public function getDelete($id) {
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('admin.Delete successfull'));
        return back();
    }

    public function getPermissions($id) {
        $row = $this->model->findOrFail($id);
        $permissions = \App\Models\Permission::all();

        return view('admin.' . $this->module . '.permissions', ['permissions'=>$permissions,'row' => $row, 'module' => $this->module]);
    }

    public function postPermissions($id, Request $request) {
        $row = $this->model->findOrFail($id);
        try {
          $row->permissions()->sync((array) $request->input('role_list'));

          flash()->success(trans('admin.Permission set successfull'));
          return redirect('/admin/' . $this->module . '');
        } catch (\Exception $e) {
          flash()->error(trans('admin.failed to save'));
        }
    }
}
