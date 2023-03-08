<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\User;
use App\Models\Task;
use App\Models\UserPickupLocation;
use Session;
use Mail;
use App;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
class Users extends Administrator {

    public $model;
    public $module;
    public $rules;

    public function __construct(User $model) {
        parent::__construct();
        $this->module = 'users';
        $this->model = $model;
        $this->rules = [
            'name' => 'required',
            'area_id' => 'required',
            'mobile' => 'required|phone|unique:users,mobile',
            "password" => "required|confirmed|min:4",
            'branch_id' => 'required',

        ];
    }

    public function getIndex(Request $request) {
        authorize('view-' . $this->module);
        $rows = $this->model->latest();
        if($request->name){
          $rows = $rows->where('name', 'like', '%' . $request->name . '%');
        }

         if($request->code){
          $rows = $rows->where('code', 'like', '%' . $request->code . '%');
        }
        if($request->national_id){
          $rows = $rows->where('national_id', 'like', '%' . $request->national_id . '%');
        }
        if($request->mobile){
          $rows = $rows->where('mobile', 'like', '%' . $request->mobile . '%');
        }
        if($request->email){
          $rows = $rows->where('email', 'like', '%' . $request->email . '%');
        }
        $rows = $rows->get();
        $areas = \App\Models\Area::published()->get()->pluck("title","id");
        $branches = \App\Models\Branch::get()->pluck("title","id");

        $arr=[
            "action"=>"تم عرض كل الفنيين",
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
        \App\Models\ActionLog::create($arr);
        return view('admin.' . $this->module . '.index', ['branches' => $branches,'areas' => $areas,'rows' => $rows, 'module' => $this->module]);
    }

    public function getView($id,Request $request) {
        authorize('view-'.$this->module);
        $row = $this->model->findOrFail($id);

        $start = null;
		$end = null;
		$rows = null;
        if($request->input("fromdate") && $request->input("todate")){
			$start = $request->input("fromdate") . " 00:00:00";
			$end = $request->input("todate") . " 23:59:59";
			$rows = Task::latest()->whereBetween("created_at",[$start,$end])->where('user_id', $id)->get();
		}else{
		    $rows = Task::latest()->where('user_id', $id)->get();
		}

		if($request->msg){
		    $result = sendSMS($request->msg,$row->mobile,2);
		    flash()->success("تم ارسال الرسالة بنجاح");
		    $arr=[
            "action"=>"تم ارسال الفني ".$row->name,
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
		}else{
		    $arr=[
            "action"=>"تم عرض الفني ".$row->name,
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
		}

        \App\Models\ActionLog::create($arr);
        return view('admin.' . $this->module . '.view', ['rows' => $rows,'row' => $row, 'module' => $this->module]);
    }

    public function getCreate() {
        authorize('create-'.$this->module);
        $row = $this->model;
        $areas = \App\Models\Area::published()->get()->pluck("title","id");
        return view('admin.' . $this->module . '.create', ['areas' => $areas,'row' => $row, 'module' => $this->module]);
    }

    public function postCreate(Request $request) {
        authorize('create-'.$this->module);
        $this->validate($request, $this->rules);
        $request->merge(["area_id"=>implode(",",$request->area_id)]);
        if ($row = $this->model->create($request->except(['profile_img','employment_file'])) ) {
            if($request->file('profile_img')){
              $imageSizes = ['small' => 'crop,100x100', 'large' => 'crop,400x300'];
              $row->uploadAndResize('profile_img', $row, $imageSizes);
            }
            if($request->file('employment_file')){
              $row->uploadFile('employment_file', $row);
            }

            $arr=[
            "action"=>"تم انشاء الفني ".$row->name,
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
        \App\Models\ActionLog::create($arr);
            flash()->success(trans('admin.Add successfull'));
            return redirect(App::getLocale().'/admin/' . $this->module . '');
        }


        flash()->error(trans('admin.failed to save'));
    }

    public function getEdit($id) {
        authorize('edit-'.$this->module);
        $row = $this->model->findOrFail($id);
        $areas = \App\Models\Area::published()->get()->pluck("title","id");
        $branches = \App\Models\Branch::get()->pluck("title","id");

        return view('admin.' . $this->module . '.edit', ['branches' => $branches,'areas' => $areas,'row' => $row, 'module' => $this->module]);
    }

    public function postEdit($id, Request $request) {
        authorize('edit-'.$this->module);
        $row = $this->model->findOrFail($id);
        $this->rules['mobile'] = $this->rules['mobile'] . "," . $row->id;

        $this->rules['password'] = "";
        if($request->input('password')){
          $this->rules['password'] = "confirmed|min:4";
        }
        $this->validate($request, $this->rules);
        if ($row->update($request->except(['password','profile_img','employment_file']))) {
            if (trim($request->input('password'))) {
                $row->password = trim($request->input('password'));
                $row->save();
            }
            if($request->file('profile_img')){
              $imageSizes = ['small' => 'crop,100x100', 'large' => 'crop,400x300'];
              $row->uploadAndResize('profile_img', $row, $imageSizes);
            }
            if($request->file('employment_file')){

              $row->uploadFile('employment_file', $row);
            }
            $arr=[
            "action"=>"تم تعديل الفني ".$row->name,
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
        \App\Models\ActionLog::create($arr);
            flash()->success(trans('admin.Edit successfull'));
            return redirect(App::getLocale().'/admin/' . $this->module . '/edit/' . $row->id);
        }
        flash()->error(trans('admin.failed to save'));
    }

    public function getDelete($id) {
        authorize('delete-'.$this->module);
        $row = $this->model->findOrFail($id);
        $arr=[
            "action"=>"تم مسح الفني ".$row->name,
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
        \App\Models\ActionLog::create($arr);
        $row->delete();
        flash()->success(trans('admin.Delete successfull'));
        return back();
    }
    public function getPublish($value, $id) {
        authorize('publish-'.$this->module);
        $row = $this->model->findOrFail($id);
        if ($value == 0) {
            $row->published = 0;
            $arr=[
            "action"=>"تم تعطيل حساب الفني ".$row->name,
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
        \App\Models\ActionLog::create($arr);
            $published = trans('admin.Unpublished');
        } else {
            $arr=[
            "action"=>"تم تفعيل حساب الفني ".$row->name,
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
        \App\Models\ActionLog::create($arr);
            $row->published = 1;
            $published = trans('admin.Published');
        }
        $row->save();
        flash()->success($published . " " . trans('admin.Successfull'));
        return back();
    }




    public function exportUsers(){
        return Excel::download(new ExportUser, 'users.xlsx');
    }

}
