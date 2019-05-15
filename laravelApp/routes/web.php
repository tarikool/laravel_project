<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/insert', function () {

    $role = Role::find(1);
    $user = User::findOrFail(1);

    if( !$role && $user ){

        DB::table('roles')->insert([
            ['name' => 'Administrator' ],
            ['name' => 'Author' ],
            ['name' => 'Subscriber' ]
        ]);

        $user->update([ 'role_id' => 1, 'is_active' =>1 ]);
    }

    return redirect('/');
});


Route::group(['middleware' => 'admin'], function (){

//    Route::resource('admin/users', 'AdminController');
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');

});

