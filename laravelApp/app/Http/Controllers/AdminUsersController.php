<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users') );

//        return dd( $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     *t Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $user = User::all()->first();
        $userName = $request->name;


        if( trim( $request->password ) == ''  ){
            $input = $request->except('password');

        }else {

            $input = $request->all();
            $input['password'] = bcrypt( $request->password );
        }

        if ( $data = $request->file( 'photo_id' ) ) {

            $name = strtok( $userName,' ').'_'.$data->getClientOriginalName();
            $data->move( 'images', $name);

            $photo = Photo::create([ 'file' => $name ]);
            $input['photo_id'] = $photo->id;

        }

        User::create( $input );

        $request->session()->flash('user_created', 'New user '.$userName.' has been added');

        return redirect('/admin/users');

//                User::create($request->all() );
//                return $request->all();
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
        $user = User::findOrFail( $id );

        $roles = Role::pluck('name', 'id')->all();

        return view( 'admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( UserEditRequest $request, $id)
    {
        $user = User::findOrFail( $id );
        $photo_ID = $user->photo_id;
        $userName = $user->name;

        if( trim( $request->password) == ''  ){
            $input = $request->except('password');

        }else {

            $input = $request->all();
            $input['password'] = bcrypt( $request->password );
        }

        $data = $request->file( 'photo_id' );
        if ( $data ) {


            $newPhoto = strtok( $userName,' ').'_'.$data->getClientOriginalName();
            $data->move( 'images', $newPhoto);

            $photo =  Photo::find( $photo_ID );

            if( $photo ) {

                $oldPhoto = $photo->file;
                unlink(public_path().$oldPhoto );
                $photo->update( [ 'file' =>$newPhoto ] );
                $input['photo_id'] = $photo_ID;

            }
            else {
                $photo = Photo::create([ 'file' => $newPhoto ]);
                $input['photo_id'] = $photo->id;
            }

        }


        $user->update( $input );

        $request->session()->flash('user_updated', $userName.'\'s Profile has been Updated');

        return redirect('/admin/users');

//        return dd( $data ) ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $user = User::findOrFail( $id );
        unlink(public_path(). $user->photo->file );

        $user->delete();

        Session::flash('user_deleted', $user->name.' has been Deleted');

        return redirect('/admin/users');

    }




}
