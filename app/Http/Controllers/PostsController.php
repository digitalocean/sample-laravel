<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
class PostsController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$posts = Post::all();
        //return Post::where('title','Post Tow')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->get();
       // $posts = Post::orderBy('title','desc')->take(2)->get();

       $posts = Post::orderBy('created_at','desc')->paginate(2);

        return view('posts.index')->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required','body' => 'required','cover_image' => 'nullable|max:5999' ]);
    //Handle File Upload
        if($request->hasfile('cover_image')){
            //Get File Name With Extension
            $filenamewithExt = $request->file('cover_image')->getOriginalClientName();
            //Get just file name
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getOriginalClientExtension();
            //File Name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extenson;
            //Uploade Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
		return 123;
			//Create Post
				$post = new Post;
				$post->title = $request->input('title');
				$post->body = $request->input('body');
				$post->cover_image = $fileNameToStore;
				$post->user_id = auth()->user()->id;
				$post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
    //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthraized Page');
        }
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $post = Post::find($id);
          //Check for correct user
          if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthraized Page');
            }


        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }

}
