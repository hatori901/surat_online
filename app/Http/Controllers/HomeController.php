<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kelas;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['surats'] = Surat::where('user_id',Auth::user()->id)->take(5)->orderBy('id','DESC')->get();
        $data['total_surat'] = Surat::count();
        $data['users'] = User::where('role','User')->count();
        if(Auth::user()->kelas_id != NULL){
            $get_kelas = Kelas::where('id',Auth::user()->kelas_id)->get('nama');
            $data['kelas'] = $get_kelas[0]->nama;
        }
        return view('home.index',$data);
    }
    public function surats(){
        if(Auth::user()->role == "Admin"){
            $data['surats'] = Surat::has('user')->paginate(10);
            return view('admin.surats',$data);
        }else{
            return redirect()->route('home.index');
        }
    }
    public function users(){
        $data['users'] = User::has('kelas')->paginate(10);
        return view('admin.users',$data);
    }
    public function blogs(){
        $data['blogs'] = Blog::paginate(10);
        return view('admin.blog',$data);
    }
}
