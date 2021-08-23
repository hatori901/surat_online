<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class BlogController extends Controller
{
    public function index(){
        $data['blogs'] = Blog::where('is_publish',1)->orderBy('created_at','DESC')->get();
        return view('web.blog',$data);
    }
    public function create(){
        return view('admin.create-blog');
    }
    public function show($slug){
        $data['blog'] = Blog::where('slug',$slug)->firstOrFail();
        if($data['blog']->is_publish == 0){
            return redirect()->route('landing');
        }else{
            Blog::where('slug',$slug)->update([
                'view' => DB::raw('view+1'),
            ]);
            return view('web.show-blog',$data);
        }
    }
    public function upload(Request $request){
        $path_url = 'storage/' . Auth::user()->id . '/media/blog';

        if ($request->hasFile('upload')) {
           $originName = $request->file('upload')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('upload')->getClientOriginalExtension();
           $fileName = Str::slug($fileName) . '_' . time() . '.' . $extension;
           $request->file('upload')->move(public_path($path_url), $fileName);
           $url = asset($path_url . '/' . $fileName);
        }

        return response()->json(['url' => $url]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'article' => 'required',
            'is_publish' => 'required'
        ]);
        $insert = [
            'title' => $request->title,
            'slug' => Str::slug($request->title,'-'),
            'artikel' => $request->article,
            'is_publish' => $request->is_publish,
            'view' => 0
        ];
        $create = Blog::create($insert);
        return redirect()->route('blogs')->with('success','Tambah Artikel Berhasil');
    }
    public function edit($id){
        $data['blog'] = Blog::findOrFail($id);
        return view('admin.edit-blogs',$data);
    }
    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'article' => 'required',
            'is_publish' => 'required'
        ]);
        $update = [
            'title' => $request->title,
            'slug' => Str::slug($request->title,'-'),
            'artikel' => $request->article,
            'is_publish' => $request->is_publish,
        ];
        $edit = Blog::where('id',$id)->update($update);
        return redirect()->route('blogs')->with('success','Edit Artikel Berhasil');

    }
    public function destroy($id){
        Blog::where('id',$id)->delete();
        return redirect()->route('blogs')->with('success','Berhasil Menghapus Artikel');
    }
}
