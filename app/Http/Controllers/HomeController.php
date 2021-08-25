<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Blog = Blog::join('users', 'post.id_user', '=', 'users.id')
        ->orderBy('post.id', 'DESC')
        ->simplePaginate(2,['post.*', 'post.content', 'post.title', 'post.created_at','users.name']);
        $User = User::all();
        return view('home',['User'=>$User, 'Blog'=>$Blog]);
    }
    public function account($id)
    {
        $User = User::where('id',$id)->get();
        $Blog = Blog::join('users', 'post.id_user', '=', 'users.id')->where('post.id_user', $id)
        ->orderBy('post.id', 'DESC')
        ->get(['post.*', 'post.content', 'post.title', 'post.created_at','users.name']);


        return view('MyAccount',['User'=>$User, 'Blog'=>$Blog]);
    }

    public function blog($id_blog){
        $Blog = Blog::where('id',$id_blog)->get();
        $User = User::join('post', 'users.id', '=', 'post.id_user')->where('post.id', $id_blog)
        ->get(['post.*', 'post.content', 'post.title', 'post.created_at','users.name']);

        return view('Blog',['User'=>$User, 'Blog'=>$Blog]);
    }

    public function tambah()
    {
        return view('add');
    }

    public function simpan(request $request,$id){
        $this->validate($request,[
            'thumbnail'=> 'mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
            'content' => 'required'
            
        ]);
        
        $imgName = $request->thumbnail->getClientOriginalName().time().'.'.$request->thumbnail->extension();
        $tujuan_upload = 'image';
        $request->thumbnail->move(public_path('image'), $imgName);
        
        
        Blog::create([
            
            'title' => $request->judul,
            'content' => $request->content,
            'id_user' => $id,
            'thumbnail'=>$imgName
        ]);
        
        return redirect('/home');
    }
    public function delete($id)
    {
        $Blog = Blog::find($id);
        $file = public_path('/image/').$Blog->thumbnail;
        if(file_exists($file)){
            @unlink($file);
        }
        $Blog->delete();
        
        return redirect('/home');
    }

    public function edit($id)
    {
        $Blog = Blog::find($id);
        return view('edit', ['Blog' => $Blog]);
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'thumbnail'=> 'mimes:jpeg,png,jpg,gif,svg',
            'judul' => 'required',
            'content' => 'required'
            
        ]);
        
        $Blog = Blog::find($id);
        $awal= $Blog->thumbnail;
        $Blog->title = $request->judul;
        $Blog->content = $request->content;
        $request->thumbnail->move(public_path('image'), $awal);
        $Blog->save();
        
        return redirect('/home');
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari tablesesuai pencarian data
		$Blog = Blog::where('title','like',"%".$search."%")
		->get();
        $User = User::where('name','like',"%".$search."%")
		->get();
 
    		// mengirim data ke view
		return view('search',['Blog' => $Blog, 'User'=>$User]);
 
	}

    public function info($id){
        $User = User::where('id',$id)->get('name', 'email', 'created_at');
        $Blog = Blog::join('users', 'post.id_user', '=', 'users.id')->where('post.id_user', $id)
        ->orderBy('post.id', 'DESC')
        ->get(['post.*', 'post.content', 'post.title', 'post.created_at','users.name','users.created_at','users.email']);


        return view('Info',['User'=>$User, 'Blog'=>$Blog]);
    }
}
