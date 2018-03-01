<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
//基础路由
Route::get('basic1',function(){
    return 'hello word';
});

Route::post('basic2',function(){
    return 'basic2';
});
//多请求路由
Route::match(['get','post'],'multy1',function(){
    return 'multy1';
});

Route::any('multy2',function(){
    return 'multy2';
});
//路由参数
/*Route::get('user/{id}',function($id){
    return 'User-id-'.$id;
});*/

/*Route::get('user/{name?}',function($name = null){
    return 'User-name-'.$name;
});*/

/*Route::get('user/{name?}',function($name = 'han'){
    return 'User-name-'.$name;
});*/
/*Route::get('user/{name?}',function($name = 'han'){
    return 'User-name-'.$name;
})->where('name','[A-Za-z]+');*/

/*Route::get('user/{id}/{name?}',function($id,$name = 'han'){
    return 'User-id-'.$id.'-name-'.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);*/

//路由别名
/*Route::get('user/center',['as'=>'center',function(){
    return route('center');
}]);*/


//路由群组
Route::group(['prefix'=>'member'],function(){
    Route::get('user/center',['as'=>'center',function(){
        return route('center');
    }]);
    Route::any('multy2',function(){
        return 'member-multy2';
    });
});

//路由中输出视图
Route::get('view', function(){
    return view('welcome');
});

/*Route::get('member/info','MemberController@info');
Route::get('member/info',['uses'=>'MemberController@info']);*/
/*Route::get('member/info',[
    'uses'=>'MemberController@info',
    'as'=>'memberinfo'
]);*/
Route::any('member/{id}',['uses'=>'MemberController@info'])
->where('id','[0-9]+');

//2.27

Route::any('query1',[
    'uses'=>'MemberController@query1',
]);
Route::any('query2',[
    'uses'=>'MemberController@query2',
]);
Route::any('query3',[
    'uses'=>'MemberController@query3',
]);