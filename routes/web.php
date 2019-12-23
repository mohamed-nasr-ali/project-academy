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
/*
 * 1- Admin Panel -> has a group of routes use roles middleware
 * 2- visitor to website can only show the index page
 * 3- normal user how has register before has group of routes use auth middleware
 * /////////////////////////   */


//!- A group of Route For DashBoard !
//    use => roles middleware ,
//    and the role must be admin.
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'roles',
        'roles'=>'admin'
    ]
    ,function(){
        //!- Every Resource Controller include CRUD Operations
    Route::resource('users','AdminUsersController'); //!- Users Controller
    Route::resource('categories','AdminCategoriesController'); //!- Categories Controller
    Route::resource('semesters','AdminSemesterController'); //!- Semesters Controller
    Route::resource('types','AdminTypesController'); //!- Types of Posts Controller
    Route::resource('contactus','AdminContactusController'); //!-Contacts Controller
    Route::resource('posts','AdminPostsController'); //!- Posts Controller

        //!- TO get a specific Category ; use category_id to return a category with all data
    Route::get('category/{id}','PagesController@viewcategories')->name('viewcategories');

        //!- TO get a specific Type of Posts ; use Type_id to return a Type of post with all data
    Route::get('type/{id}','PagesController@viewtypes')->name('viewtypes');

        //!- create post need to choose a type recording to a category-- then you must choose a specific category first then choose the type of post
    Route::get('checkcategory/{id}','PagesController@checkcategory')->name('checkcategory');

        //!-active user from pagecontroller
    Route::post('active/{id}','PagesController@active')->name('active');

        //!-new users
    Route::get('newusers','PagesController@newusers')->name('newusers');
    Route::Post('newuseractive/{id}','PagesController@newuseractive')->name('newuseractive');
    //!- admin/admin open the main Page of admin panel AdminLTE
    Route::get('admin', function () {
        return view('admin.main');
    });
});


//!- group of route for the user who has auth--
// use auth middleware.
Route::group(
    [
        'prefix'=>'academy',
        'middleware'=>['auth','roles'],
        'role'=>['admin','user'],
    ]
    ,function(){


    Route::get('group/{id}','PagesController@group')->name('group'); //!-posts in category
    Route::get('subofgroup/{id}','PagesController@subofgroup')->name('subofgroup'); //!-every category has types here we return the posts for the Type_id -> {id}
    Route::resource('comments','UsersCommentsController'); //!- comments controller with CRUD operations
});

//!- Authentication Route
Auth::routes();

//!- the Main page for user
Route::get('/home', 'HomeController@index')->name('home');


//!- Index page the Main page in the website for a normal visitor
Route::get('/', function () {
    return view('index');//welcome
});


Route::get('poster/{parameter}','PagesController@poster')->name('poster'); //!- find post
