<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }


    public function create()
    {
        return view('admin.media.create');
    }


    public function store( Request $request )
    {
    	$photo = $request->file('file');

    	if ( $photo ) {

    	    $name = 'photo_'.$photo->getClientOriginalName();
    	    $photo->move('images', $name );
    	    Photo::create([ 'file' => $name ]);

    	    $request->session()->flash('photo_created', 'Photo has been uploaded successfully');
        }

        return redirect('/admin/media');

    }


    public function destroy($id)
    {
        $photo = Photo::findOrFail( $id );
        if (file_exists(public_path(). $photo->file))
        unlink(public_path(). $photo->file );
        $photo->delete();
        Session::flash('photo_deleted', 'Photo has been deleted' );

        return redirect('/admin/media');

    }











}
