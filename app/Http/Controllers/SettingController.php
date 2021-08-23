<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kelas'] = Kelas::get();
        if(Auth::user()->kelas_id != NULL){
            $get_kelas = Kelas::where('id',Auth::user()->kelas_id)->get('nama');
            $data['kelas'] = $get_kelas[0]->nama;
        }
        // print_r(Auth::user()->kelas_id);
        return view('home.setting.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $request->validate([
            'alamat' => 'required',
            'kelas' => 'required',
            'phone_number' => 'required',
            'profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('profile')){
            $imageName = time().'.'.$request->profile->extension();
            $request->profile->move(public_path('assets/images/profile/'), $imageName);
            $path = 'assets/images/profile/'.$imageName;
        }else{
            $path = NULL;
        }
        $update = User::where('id',$id)->update([
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas,
            'phone_number' => $request->phone_number,
            'profile' => $path
        ]);

        if($update){
            return redirect()->route('settings')->with('success','Profile Berhasil Diubah!');
        }

    }
    public function update_password(Request $request,$id){
        $request->validate([
            'password' => 'required|string|min:8'
        ]);
        $pass = Hash::make($request->password);
        $update = User::where('id',$id)->update([
            'password' => $pass
        ]);
        return redirect()->route('settings',$id)->with('success-pw','Password Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
