<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\Subscriber;
use Redirect;
use Session;
use Excel;

class Subscribers extends Administrator {

    public $model;
    public $module;
    public $rules;

    public function __construct(Subscriber $model) {
        parent::__construct();
        $this->module = 'subscribers';
        $this->model = $model;
        $this->rules = [
            'email' => 'required|email|unique:subscribers,email',
        ];
    }

    public function getIndex(Request $request) {
        authorize('view-'.$this->module);
        $rows = $this->model->latest();
        $rows = $rows->paginate();
        return view('admin.' . $this->module . '.index', ['rows' => $rows, 'module' => $this->module]);
    }

    public function getExport() {
        authorize('export-'.$this->module);
        Excel::create($this->module . "_" . date("Y-m-d"), function($excel) {
            $excel->sheet('Sheetname', function($sheet) {
                $subscribers = $this->model->latest()->published()->get(array("email"))->toArray();
                $sheet->row(1, [
                    "Email"
                ]);
                $sheet->rows($subscribers);
                $sheet->row(1, function($row) {
                    // call cell manipulation methods
                    $row->setFontWeight('bold');
                });
            });
        })->export('xlsx');
    }

    public function getImport() {
        authorize('import-'.$this->module);
        $row = $this->model;
        return view('admin.' . $this->module . '.import', ['row' => $row, 'module' => $this->module]);
    }

    public function postImport(Request $request) {
        authorize('import-'.$this->module);
        $field = 'import_file';
        $this->validate($request, [$field => 'required|mimes:xls,xlsx']);
        if ($request->hasFile($field) && $request->file($field)->isValid()) {
            $file = $request->file($field);
            //print_r($file);exit;
            Excel::load($file->getPathName(), function($reader) use ($request) {
                $results = $reader->get()->toArray();
                if ($results) {
                    foreach ($results as $item) {
                        $item['admin_id'] = $request->input("admin_id");
                        $item['published'] = 1;
                        $row = Subscriber::whereEmail($item['email'])->first();
                        if ($row) {
                            $row->update($item);
                        } else {
                            Subscriber::create($item);
                        }
                    }
                }
            });
            flash()->success(trans('admin.Add successfull'));
            return redirect('admin/' . $this->module . '');
        }
        flash()->error(trans('admin.failed to save'));
    }

    public function getView($id) {
        authorize('view-'.$this->module);
        $row = $this->model->findOrFail($id);
        return view('admin.' . $this->module . '.view', ['row' => $row, 'module' => $this->module]);
    }

    public function getCreate() {
        authorize('create-'.$this->module);
        $row = $this->model;
        $row->published = 1;
        return view('admin.' . $this->module . '.create', ['row' => $row, 'module' => $this->module]);
    }

    public function postCreate(Request $request) {
        authorize('create-'.$this->module);
        $this->validate($request, $this->rules);
        if ($row = $this->model->create($request->all())) {
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
        $this->rules['email'] = 'required|email|unique:subscribers,email' . "," . $row->id;
        $this->validate($request, $this->rules);
        if ($row->update($request->all())) {
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
