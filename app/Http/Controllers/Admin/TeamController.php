<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Traits\imagesTrait;
class TeamController extends Controller
{
    use imagesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::orderBy('id','DESC')->paginate(20);

        return view('admin.team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            // 'des_en' => 'required|string',
            'image'=> 'image|mimes:jpg,png,jpeg',
            'name'=>'required'
        ]);
        $data = $request->all();
        if ($request -> has('image')) {
            $image = $this -> saveImages($request -> image, 'uploads/team');
            $data['image'] = $image;
        }

      if(Team::create($data)){
        session() -> flash('success', __('Successfully'));
      }else{
        session() -> flash('Error', 'Error in create');
      }


        return redirect() -> route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team ::findOrFail($id);
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            // 'des_en' => 'required|string',
            // 'des_ar' => 'required|string',
            'name' => 'required|string',
            'image'=> 'image|mimes:jpg,png,jpeg'
        ]);
        $team = Team ::findOrFail($id);
        $data = $request->all();
        if(! $request->has('is_special')){
            $data['is_special'] = 0;
        }
        if(! $request->has('status')){
            $data['status'] = 1;
        }
        if ($request -> has('image')) {

            $image = $this -> saveImages($request ->image, 'uploads/team');
            $data['image'] = $image;
        }
            $team->update($data);
        session() -> flash('success', __('Updated successfully'));
        return redirect() -> route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team ::findOrFail($id);
        $team ->  delete();


        session() -> flash('success',__('deleted successfully'));
        return redirect() -> route('team.index');
    }
}
