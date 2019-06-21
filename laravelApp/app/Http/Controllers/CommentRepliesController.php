<?php

namespace App\Http\Controllers;

use App\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    public function reply( Request $request )
    {
        $user = Auth::user();

        if( $user && $request->body )
        {
            $input = [
                'user_id' => $user->id,
                'comment_id' => $request->comment_id,
                'body' => $request->body,
                'author' => $user->name,
                'email' => $user->email,
            ];

            CommentReply::create( $input );
            $request->session()->flash('commentReply_created', 'Your reply has been posted');

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
        $replies = CommentReply::where('comment_id',$id)->get();
        $comment = $replies->first()->comment;
        return view('admin.comments.replies.show', compact('replies', 'comment'));
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
        CommentReply::findOrFail( $id )->update([ 'is_active' => $input ]);

        if ( $input == 0 ){
            $request->session()->flash('reply_disapproved', 'Reply has been Disapproved! Please, Approve it to make it available in the Post');
        }else {
            $request->session()->flash('reply_approved', 'Reply has been Approved');
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

        CommentReply::findOrFail( $id )->delete();
        Session::flash('reply_deleted', 'Reply has been removed');
        return redirect()->back();
    }
}
