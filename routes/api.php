<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$controller_path = 'App\Http\Controllers';

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get-all-property-types', $controller_path . '\Api\Property@GetPropertyTypes')->name('get-all-property-types');
Route::get('/get-all-project', $controller_path . '\Api\Property@GetProject')->name('get-all-project');
Route::post('/add-callback', $controller_path . '\Callback\Callback@AddCallback')->name('add-callback');
Route::post('/saveBookVisit', $controller_path . '\Callback\Callback@saveBookVisit')->name('saveBookVisit');

Route::post('/get-properts', $controller_path . '\Api\Property@GetProperty')->name('get-properts');

Route::post('/get-properts-by-search', $controller_path . '\Api\Property@GetPropertySearch')->name('get-properts-by-search');
Route::post('/get-properts-by-search-filter', $controller_path . '\Api\Property@GetPropertySearchFilter')->name('get-properts-by-search-filter');
Route::post('/get-single-property', $controller_path . '\Api\Property@GetPropertySingle')->name('get-single-property');
Route::post('/saveAppointmeant', $controller_path . '\Api\Property@saveAppointmeant')->name('saveAppointmeant');
Route::post('/getAgentTimesloat', $controller_path . '\Api\Property@getAgentTimesloat')->name('getAgentTimesloat');
Route::get('/getAllBlogs', $controller_path . '\Api\Blog@getAllBlogs')->name('getAllBlogs');
Route::get('/getAllBlogsC', $controller_path . '\Api\Blog@getAllBlogsC')->name('getAllBlogsC');
Route::post('/getAllBlogsSingle', $controller_path . '\Api\Blog@getAllBlogsSingle')->name('getAllBlogsSingle');

Route::post('/getProjectSingle', $controller_path . '\Api\Property@getProjectSingle')->name('getProjectSingle');
Route::post('/getSubProjects', $controller_path . '\Api\Property@getSubProjects')->name('getSubProjects');

Route::post('/getProjectSingleSub', $controller_path . '\Api\Property@getProjectSingleSub')->name('getProjectSingleSub');
Route::post('/getSubProperty', $controller_path . '\Api\Property@getSubProperty')->name('getSubProperty');
Route::get('/getAllSubProject', $controller_path . '\Api\Property@getAllSubProject')->name('getAllSubProject');

Route::get('/getAllPublicHolidays', $controller_path . '\Api\Property@getAllPublicHolidays')->name('getAllPublicHolidays');
Route::get('/getWorkingDays', $controller_path . '\Api\Property@getWorkingDays')->name('getWorkingDays');

Route::get('/getHomeData', $controller_path . '\Setting\setting@getHomeData')->name('getHomeData');
Route::get('/getOtherData', $controller_path . '\Setting\setting@getOtherData')->name('getOtherData');

Route::post('/getAgentSlot', $controller_path . '\Api\Property@getAgentSlot')->name('getAgentSlot');

Route::post('/getAppointmentTime', $controller_path . '\Api\Property@getAppointmentTime')->name('getAppointmentTime');

//j Routes
Route::post('/changeuserstatus', $controller_path . '\Api\User@Index')->name('changeuserstatus');
Route::post('/changeprojectstatus', $controller_path . '\Api\User@changeprojectstatus')->name('changeprojectstatus');
Route::post('/changesubprojectstatus', $controller_path . '\Api\User@changesubprojectstatus')->name('changesubprojectstatus');
Route::post('/changepropertystatus', $controller_path . '\Api\User@changepropertystatus')->name('changepropertystatus');
Route::post('/changeblogstatus', $controller_path . '\Api\User@changeblogstatus')->name('changeblogstatus');
Route::post('/sendcontactmail', $controller_path . '\Api\User@sendcontactmail')->name('sendcontactmail');
// Route::post('/sendcareermail', $controller_path . '\Api\User@sendcareermail')->name('sendcareermail');
Route::post('send/mail', [SendMailController::class, 'send_mail'])->name('send_mail');

Route::post('/sendcareermail',[MailController::class,'sendMail']);

