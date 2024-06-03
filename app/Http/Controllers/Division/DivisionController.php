<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Division::all();
        return view('backend.division-mgmt.division-index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.division-mgmt.division-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'division_name' => 'required',
        ],[
            'division_name.required' => 'Division name field is required. !!',
        ]);

        $data = new Division();
        $data->division_name = $request->division_name;

        $data->save();

       /*  $popup = array(
            'message' => 'Division name added successfully !!',
            'alert-type' => 'success',
        ); */

        return redirect()->route('division-show')->with('msg','Division name added successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Division::findOrFail($id);

        return view('backend.division-mgmt.division-edit',compact('data'));
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
        $data = Division::findOrFail($id);


        $request->validate([
            'division_name' => 'required',
        ],[
            'division_name.required' => 'Division name field is required. !!',
        ]);

        $data->division_name = $request->division_name;
        $data->status = $request->status;

        $data->save();

       /*  $popup = array(
            'message' => 'Division name added successfully !!',
            'alert-type' => 'success',
        ); */

        return redirect()->route('division-show')->with('msg','Division name updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Division::findOrFail($id);

        if($data){
           $data->delete();

            return redirect()->route('division-show')->with('msg','Division name deleted successfully !!');
        }
    }
}
