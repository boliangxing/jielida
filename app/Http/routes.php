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
use App\Entity\Member;
Route::get('/', function () {
    return view('ad/login');
});


Route::group(['prefix'=>'ad'],function(){
  Route::get('/welcome',function(){

    return view('ad/welcome');


  });

   Route::group(['prefix' => 'service'], function () {

     Route::post('scene/add','Ad\sceneController@sceneAdd');
     Route::post('scene/del','Ad\sceneController@scenedel');
     Route::post('scene/edit','Ad\sceneController@sceneedit');

     Route::get('/agency/country_id/{country_id}', 'Ad\agencyController@toagencyBycid');
     Route::get('/agency/province_id/{province_id}/country_id/{country_id}', 'Ad\agencyController@toagencyBypid');
     Route::post('agency/add','Ad\agencyController@agencyAdd');
     Route::post('agency/del','Ad\agencyController@agencydel');


     Route::post('permission/add','Ad\permissionController@permissionAdd');



Route::post('member/del','Ad\userController@memberdel');
Route::get('member/uid/{uid}','Ad\userController@memberdelall');
Route::post('feed/del','Ad\userController@feeddel');

Route::post('appversions/del','Ad\AppController@verdel');
 Route::post('we_list/update','Ad\WechatController@toWeListUpdate');

     Route::group(['middleware' => ['web']], function () {
         // your routes here
         Route::post('/login','Ad\IndexController@Login');

     });


   });
   Route::group(['middleware' => ['web']], function () {
       // your routes here
       Route::get('/index','Ad\IndexController@toIndex');
       Route::get('/exit','Ad\IndexController@toExit');


   });

    Route::get('/login','Ad\IndexController@toLogin');

    Route::get('/member','Ad\userController@tousers');
    Route::get('/memberfeedback','Ad\userController@tofeedback');


    Route::get('/device','Ad\IndexController@toDevice');

    Route::get('/110','Ad\IndexController@to110');

    Route::get('/product_add_brefore','Ad\IndexController@toPAbefore');
    Route::get('/product_list','Ad\ProductController@toProduct_list');

     Route::get('/we_list','Ad\WechatController@toweChat');

     Route::get('/we_menu','Ad\IndexController@toWemenu');
    Route::get('/we_reply','Ad\IndexController@toWereply');

    Route::get('/app_cmds','Ad\AppController@toAppcmds');
    Route::get('/app_versions','Ad\AppController@toAppversions');

Route::get('/cmds_edit','Ad\AppController@cmds_edit');

    Route::get('/scene','Ad\sceneController@toScene');
    Route::get('/scene_add','Ad\sceneController@tosceneAdd');
    Route::get('/scene_edit','Ad\sceneController@tosceneEdit');

    Route::get('/agency','Ad\agencyController@toagency');
    Route::get('/agency_add','Ad\agencyController@toagencyAdd');
    Route::get('/agency_edit','Ad\agencyController@toagencyEdit');

    Route::get('/permission','Ad\permissionController@topermission');
    Route::get('/permission_add', 'Ad\permissionController@topermissionAdd');


});
