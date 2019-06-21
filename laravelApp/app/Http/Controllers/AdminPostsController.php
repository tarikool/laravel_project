<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\PostsRequest;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( PostsRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $data = $request->file('photo_id');


        if ( $data ) {

            $name = 'post_'.strtok( $request->title, ' ').'_'.$data->getClientOriginalName();
            $data->move('images', $name );
            $photo = Photo::create([ 'file' => $name ]);
            $input['photo_id'] = $photo->id;
//            $input['user_id'] = $user->id;
        }

//        $posts = Post::create( $input );
//        return $input;


        $user->posts()->create( $input );
        $request->session()->flash('post_created', ' New post has been created ' );

        return redirect('/admin/posts');
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
        $post = Post::findOrFail( $id );

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( PostsRequest $request, $id )
    {
        $userID = Auth::user()->id;
        $post = Post::findOrFail( $id );

        if ( $userID == $post->user_id ) {

            $photoID = $post->photo_id;
            $postName = $post->title;
            $input = $request->all();

            $data = $request->file( 'photo_id' );
            if ( $data ) {

                $newPhoto = 'post_'.strtok( $postName,' ').'_'.$data->getClientOriginalName();
                $photo =  Photo::find( $photoID );

                if( $photo ) {

                    $oldPhoto = $photo->file;
                    if ( file_exists(public_path(). $oldPhoto))
                        unlink(public_path().$oldPhoto );
                    $photo->update( [ 'file' =>$newPhoto ] );
                    $input['photo_id'] = $photoID;

                }
                else {
                    $photo = Photo::create([ 'file' => $newPhoto ]);
                    $input['photo_id'] = $photo->id;
                }

                $data->move( 'images', $newPhoto);
            }

            $post->update( $input );
            $request->session()->flash('post_updated', 'Post '.$postName.' has been Updated');


        } else {
            $request->session()->flash('not_allowed', ' Sorry! Your not allowed to make any changes');
        }


        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail( $id );
        if (file_exists(public_path(). $post->photo->file))
        unlink(public_path(). $post->photo->file );
        $post->photo->delete();
        $post->delete();
        Session::flash('post_deleted', 'Post '.$post->title.' has been Deleted');
        
        return redirect('/admin/posts');

    }


    public function post($id)
    {
        $post = Post::findOrFail( $id );
        $comments = $post->comments;

        return view('post', compact('post', 'comments'));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
    