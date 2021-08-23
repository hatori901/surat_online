<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['surats'] = Surat::has('user')->where('user_id',Auth::user()->id)->paginate(10);
        return view('home.surat.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->kelas_id == NULL){
            return redirect()->route('settings')->with('error','Silahkan Atur Kelasmu Terlebih Dahulu Sebelum Membuat Surat');
        }
        return view('home.surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'wali_murid' => 'required',
            'alasan' => 'required',
            'ttd' => 'required',
            'tanggal' => 'required'
        ]);
        $insert = Surat::create([
            'user_id' => Auth::user()->id,
            'kategori' => $request->kategori,
            'alasan' => $request->alasan,
            'wali_murid' => $request->wali_murid,
            'ttd' => $request->ttd,
            'tanggal' => $request->tanggal,
            'status' => 'Pending',
        ]);
        if($insert){
            return redirect()->route('surat')->with('success','Surat Berhasil dibuat, Silahkan Tunggu Konfirmasi dari Admin');
        }else{
            return redirect()->route('surat')->with('error','Surat Gagal dibuat, Silahkan Coba Beberapa Saat Lagi');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['surat'] = Surat::has('user')->findOrFail($id);
        return view('home.surat.show',$data);
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
        $update = Surat::where('id',$id)->update([
            'status' => $request->status,
        ]);
        return response()->json([
            'message' => 'Status Surat Berhasil diUpdate',
        ]);
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
