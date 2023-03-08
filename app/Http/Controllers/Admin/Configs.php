<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Administrator;
use App\Libs\ACL;
use App\Libs\Userauth;
use Session;
use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Str;

class Configs extends Administrator {

    public $model;
    public $module;

    public function __construct(Config $model, Request $input) {
        parent::__construct();
        $this->module = 'configs';
        $this->model = $model;
        $this->input = $input;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resposnse
     */
    public function getEdit() {
        authorizeSuperAdmin();
        $rows = getConfigs();
        return view('admin.' . $this->module . '.edit', ['rows' => $rows, 'module' => $this->module]);
    }

    public function postEdit(Request $request) {
        authorizeSuperAdmin();
        $rows = $this->model->get();
        if ($rows) {
            if ($request->input()) {
                foreach ($request->input() as $key => $value) {
                    if ($key) {
                        if ($key != "_token") {
                            $row = Config::whereFieldName($key)->first();
                            if ($row) {
                                $row->value = $value;
                                $row->save();
                            } else {
                                Config::create(['field_name' => $key, 'value' => $value]);
                            }
                        }
                    }
                }
                ///////////// if file
                $field = 'logo';
                if ($request->hasFile($field) && $request->file($field)->isValid()) {
                    $uploadPath = 'uploads/';
                    $image = $request->file($field);
                    $fileName = Str::random(10) . time() . '.' . $image->getClientOriginalExtension();
                    $request->file($field)->move($uploadPath, $fileName);
                    $filePath = $uploadPath . $fileName;
                    $row = Config::whereFieldName($field)->first();
                    if ($row) {
                        $row->value = $fileName;
                        $row->save();
                    } else {
                        Config::create(['field_name' => $field, 'value' => $fileName]);
                    }
                }
                //////////// end file

                ///////////// if file
                $field = 'footer_logo';
                if ($request->hasFile($field) && $request->file($field)->isValid()) {
                    $uploadPath = 'uploads/';
                    $image = $request->file($field);
                    $fileName = Str::random(10) . time() . '.' . $image->getClientOriginalExtension();
                    $request->file($field)->move($uploadPath, $fileName);
                    $filePath = $uploadPath . $fileName;
                    $row = Config::whereFieldName($field)->first();
                    if ($row) {
                        $row->value = $fileName;
                        $row->save();
                    } else {
                        Config::create(['field_name' => $field, 'value' => $fileName]);
                    }
                }
                //////////// end file

                ///////////// if file
                $field = 'video_cover';
                if ($request->hasFile($field) && $request->file($field)->isValid()) {
                    $uploadPath = 'uploads/';
                    $image = $request->file($field);
                    $fileName =Str::random(10) . time() . '.' . $image->getClientOriginalExtension();
                    $request->file($field)->move($uploadPath, $fileName);
                    $filePath = $uploadPath . $fileName;
                    $row = Config::whereFieldName($field)->first();
                    if ($row) {
                        $row->value = $fileName;
                        $row->save();
                    } else {
                        Config::create(['field_name' => $field, 'value' => $fileName]);
                    }
                }
                //////////// end file

                ///////////// if file
                $field = 'favicon';
                if ($request->hasFile($field) && $request->file($field)->isValid()) {
                    $uploadPath = 'uploads/';
                    $image = $request->file($field);
                    $fileName = Str::random(10) . time() . '.' . $image->getClientOriginalExtension();
                    $request->file($field)->move($uploadPath, $fileName);
                    $filePath = $uploadPath . $fileName;
                    $row = Config::whereFieldName($field)->first();
                    if ($row) {
                        $row->value = $fileName;
                        $row->save();
                    } else {
                        Config::create(['field_name' => $field, 'value' => $fileName]);
                    }
                }
                //////////// end file
            }
        }
        Session::put("configs", getConfigs());
        flash()->success(trans('admin.Edit successfull'));
        return redirect('admin/' . $this->module . '/edit');
    }

}
