<?php

namespace App\Http\Controllers;

use App\Blog;
use Auth;
use App\comment;
use Illuminate\Http\Request;


class BlogController extends Controller
{

    //  Constructor
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                    
        //
        // $blog = Blog::where('author',Auth::user()->name)->first();
        // dd($blog);

        // $blog = Blog::where('author','=',Auth::user()->name)->firstOrFail();

        $blog = Blog::where('author',Auth::user()->name)->paginate(5);
        $kirim = ['blog'=>$blog];
        return view('blog.home',$kirim);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        //
        return view('blog.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $blog = new Blog;
    
        if ($request->image == null) {
            $blog->img = 'stealth.png';
        }else{            
            // $image = $request->image->store('public/img');
            // $blog->img = basename($image);        
            $file       = $request->file('image');
            $fileName   = $file->getClientOriginalName();
            $request->file('image')->move("storage/img", $fileName);
            $blog->img = basename($fileName);
        }        
        
        // $file       = $request->file('image');
        // $fileName   = $file->getClientOriginalName();
        // $request->file('image')->move("storage/img", $fileName);
        // $blog->img = basename($fileName);

        // $blog->author = Auth::user()->name;
        $blog->author = $request->author;
        
        $blog->title = $request->title;        
        $blog->category = $request->category;      
        $blog->tag = $request->tag;      

        $blog->isi = $request->isi;      
        
        $blog->save();
        return redirect('/admin');
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
        $comment = comment::where('id_post',$id)->orderBy('id','DESC')->paginate(3);
        // dd($comment);
        $blog = Blog::find($id);
        $semua = Blog::orderBy('id','DESC')->paginate(4);        
        // $tag = explode(',',$blog->tag->facings);
        return view('details',['blog' => $blog,'semua' => $semua, 'comment' => $comment]);
    }

    public function showCategory($category)
    {
        //
        $blog = Blog::where('category',$category)->orderBy('id','DESC')->paginate(10);        
        // $tag = explode(',',$blog->tag->facings);
        $kirim = ['blog'=>$blog];
        $kirimKatek = ['kateg'=>$category];
        return view('category',$kirim,$kirimKatek);
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
        $blog = Blog::find($id);
        return view ('blog.edit',['blog'=>$blog]);
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
        
        $blog = Blog::find($id);
        if ($request->image == null) {
            $blog->img = 'stealth.png';
        }else{
            // $image = $request->image->store('public/img');
            // $blog->img = basename($image);        
            $file       = $request->file('image');
            $fileName   = $file->getClientOriginalName();
            $request->file('image')->move("storage/img", $fileName);
            $blog->img = basename($fileName);
        }                

        // $blog->author = Auth::user()->name;
        $blog->author = $request->author;
        
        $blog->title = $request->title;        
        $blog->category = $request->category;      
        $blog->tag = $request->tag;      

        $blog->isi = $request->isi;      

        $blog->save();
        return redirect('/admin');
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

    public function delete($id)
    {
        $blog = Blog::destroy($id);
        return redirect('/admin');
    }
}
