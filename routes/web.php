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



Route::get('/', function () {
    return view('welcome');
})->name('login');


Route::prefix('admin')->group(function() {
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
  });
  
    Route::get('/delete-user/{user_id}', [
      'uses' => 'AdminController@getDeleteUser',
       'as' => 'user.delete'
        //'middleware' => 'auth:admin'
   ]);
    Route::get('/edit-user/{user_id}', [
      'uses' => 'AdminController@getEditUser',
       'as' => 'user.edit'
        //'middleware' => 'auth:admin'
   ]);

   Route::post('/signup', [
      'uses' => 'UserController@postSignUp',
       'as' => 'signup'
   ]);
   
      Route::post('/signin', [
      'uses' => 'UserController@postSignIn',
       'as' => 'signin'
   ]);

   Route::get('/dashboard', [
      'uses' => 'PostController@getDashboard',
       'as' => 'dashboard',
       'middleware' => 'auth'
   ]);
   
      Route::post('/createpost', [
      'uses' => 'PostController@postCreatePost',
       'as' => 'post.create',
       'middleware' => 'auth'
   ]);
      
       Route::get('/delete-post/{post_id}', [
      'uses' => 'PostController@getDeletePost',
       'as' => 'post.delete',
       'middleware' => 'auth'
   ]);
       
   Route::get('/logout', [
      'uses' => 'UserController@getLogout',
       'as' => 'logout'
   ]);
   
   Route::post('/edit',[
      'uses' => 'PostController@postEditPost',
       'as' => 'edit'
   ]);   
    Route::post('/signupPost',[
      'uses' => 'PostController@postSignup',
       'as' => 'signupPost'
   ]); 
   
   Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'account',
       'middleware' => 'auth'
   ]);
   
   
    Route::post('/upateaccount', [
        'uses' => 'UserController@postSaveAccount',
        'as' => 'account.update'
    ]);
    
    Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserProfilePicture',
    'as' => 'account.profile_picture'
]);

    Route::get('/redirect', 'SocialAuthFacebookController@redirect');
    Route::get('/callback', 'SocialAuthFacebookController@callback');