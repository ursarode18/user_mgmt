<?php

namespace App\Http\Controllers\UserDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Division;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('users')->join('divisions','divisions.id', '=', 'users.division_id')
                ->select('users.*','divisions.division_name')->get() ; //User::orderBy('id')->get();
        $divisions = Division::all();
        $roles = User::where('type',0)->get();
        return view('backend.user-mgmt.user-index',compact('datas','divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = DB::table('divisions')->where('status','=', '1')->get();
        return view('backend.user-mgmt.user-add',compact('divisions'));
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'division_id' => 'required|min:1'
        ],[
            'division_id.required' => 'The division field is required.'
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->division_id = $request->division_id;
        $data->admin = $request->admin;
        $data->aqua = $request->aqua;
        $data->frhphm = $request->frhphm;
        $data->fnbp = $request->fnbp;
        $data->fgb = $request->fgb;
        $data->aehm = $request->aehm;
        $data->academic = $request->academic;
        $data->fees = $request->fees;
        $data->kolkata = $request->kolkata;
        $data->kakinada = $request->kakinada;
        $data->rohtak = $request->rohtak;
        $data->powerkheda = $request->powerkheda;
        $data->motipur = $request->motipur;
        $data->special = $request->special;
        /* $data->status = ; */
        $data->type = 0;

        //dd($data);
        $data->save();

        return redirect()->route('admin-show')->with('msg','User created successfully !!');

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
        $data = User::findOrFail($id);

        $divisions = Division::all();
        return view('backend.user-mgmt.user-edit',compact('data','divisions'));
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
        $data = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        //$data->password = Hash::make($request->password);
        $data->division_id = $request->division_id;
        $data->admin = $request->admin;
        $data->aqua = $request->aqua;
        $data->frhphm = $request->frhphm;
        $data->fnbp = $request->fnbp;
        $data->fgb = $request->fgb;
        $data->aehm = $request->aehm;
        $data->academic = $request->academic;
        $data->fees = $request->fees;
        $data->kolkata = $request->kolkata;
        $data->kakinada = $request->kakinada;
        $data->rohtak = $request->rohtak;
        $data->powerkheda = $request->powerkheda;
        $data->motipur = $request->motipur;
        $data->special = $request->special;
        $data->status = $request->status;
        $data->type = 0;

        $data->update();

        return redirect()->route('admin-show')->with('msg','User updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);

        if($data){
           $data->delete();

            return redirect()->route('admin-show')->with('msg','User name deleted successfully !!');
        }
    }
}
