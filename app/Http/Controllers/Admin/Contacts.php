<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\Contact;

class Contacts extends Administrator {

    public $model;
    public $module;

    public function __construct(Contact $model) {
        parent::__construct();
        $this->module = 'contacts';
        $this->model = $model;
    }

    public function getIndex(Request $request) {
        authorize('view-'.$this->module);
        $rows = $this->model->orderBy("viewed",'asc');
        $rows = $rows->paginate();
        return view('admin.' . $this->module . '.index',
            ['rows' => $rows, 'module' => $this->module]);
    }

    public function getView($id) {
        authorize('view-'.$this->module);
        $row = $this->model->findOrFail($id);
        $row->viewed=1;
        $row->save();
        return view('admin.' . $this->module . '.view',
            ['row' => $row, 'module' => $this->module]);
    }

    public function getDelete($id) {
        authorize('delete-'.$this->module);
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('admin.Delete successfull'));
        return back();
    }
}
