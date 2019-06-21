<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments') );
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
        $user = Auth::user();

        if( $user && $request->body )
        {
            $input = [
                'user_id' => $user->id,
                'author' => $user->name,
                'email' => $user->email,
                'post_id' => $request->post_id,
                'body' => $request->body
            ];

            Comment::create( $input );
            $request->session()->flash('comment_created', 'Your comment has been posted');
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $comments = Comment::where('post_id', $id )->get();
         $post = Post::findOrFail( $id );
         return view('admin.comments.show', compact('comments', 'post') );
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
        $input = $request->is_active;
        Comment::findOrFail( $id )->update([ 'is_active' => $input ]);

        if ( $input == 0 ){
            $request->session()->flash('comment_disapproved', 'Comment has been Disapproved! Please, Approve it to make it available in the Post');
        }else {
            $request->session()->flash('comment_approved', 'Comment Has Been Approved');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::findOrFail( $id )->delete();
        Session::flash('comment_deleted', 'Comment has been Deleted successfully');
        return redirect('admin/comments');

    }



}
