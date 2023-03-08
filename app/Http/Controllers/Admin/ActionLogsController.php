<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\ActionLog;
use Session;
use Mail;
use Validator;
use App;
class ActionLogsController extends Administrator {

    public $model;
    public $module;
    public $rules;

    public function __construct(ActionLog $model) {
        parent::__construct();
        $this->module = 'action_logs';
        $this->model = $model;

    }

    public function getIndex(Request $request) {
        authorize('view-' . $this->module);
        $rows = $this->model->latest();
        if($request->action){
          $rows = $rows->where('action', 'like', '%' . $request->action . '%');
        }
        if($request->admin_name){
          $rows = $rows->where('title', 'like', '%' . $request->admin_name . '%');
        }
        $rows = $rows->get();
        return view('admin.' . $this->module . '.index', ['rows' => $rows, 'module' => $this->module]);
    }
}
