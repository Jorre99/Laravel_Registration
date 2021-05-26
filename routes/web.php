<?php

use App\Meal;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});



//Clear-cache

//Route::get('/clear-cache', function() {
//    Artisan::call('view:clear');
//    return "View cache is cleared";
//});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
//users
Route::redirect('home', '/');
Route::view('/', 'home');
Route::get('contact-us', 'ContactUsController@show');
Route::post('contact-us', 'ContactUsController@sendEmail');
Route::view('swimmingPreference', 'user.swimmingPreference');
Route::view('faq','faq');

//Pool_parties
//Route::resource('poolparties', 'Pool_partyController');
//Route::get('poolparties', 'PoolPartyController@index');
//Route::get('poolparties\create', 'PoolPartyController@create');
//Route::post('poolparties', 'PoolPartyController@store');
//Route::get('poolparties\{poolparty}', 'PoolPartyController@show');
//Route::get('poolparties\{poolparty}.edit', 'PoolPartyController@edit');
//Route::put('poolparties\{poolparty}', 'PoolPartyController@update');
//Route::delete('poolparties\{poolparty}', 'PoolPartyController@delete');


//lesvoorkeuren
Route::resource('lessonpref', 'Customer\LessonprefController');

//Customer
Route::resource('customers','Customer\CustomerController');

//Pool party customers
Route::get('poolparties/{pool_party}', 'SwimPartyController@create');
Route::resource('poolparties','SwimPartyController');



//Customer swimming lesson
//Route::resource('customerSwimminglessons','CustomerSwimminglessonController');



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //this is a middleware function to protect the routes for admins.
    //admin
    Route::view('receipt', 'admin\receipt');
    Route::view('login', 'login');


    Route::view('waitinglist', 'admin\waitinglist');
    Route::view('school', 'admin\school');

    //Admin Prices CRUD
    Route::resource('prices', 'Admin\PriceController');

    //Admin Meal CRUD
    Route::resource('meals', 'Admin\MealController');

    //Admin School CRUD
    Route::resource('schools','Admin\SchoolController');
    Route::resource('classes','Admin\ClassesController');


    //Admin Receipt CRUD
    Route::get('invoice/{receipt}/show', 'Admin\InvoiceController@show');
    Route::get('invoice/{receipt}/send', 'Admin\InvoiceController@send');
    Route::resource('receipts','Admin\ReceiptController');

    //Admin Appointments CRUD
    Route::get('pool_appointments/{school}', 'Admin\Pool_appointmentController@create');
    Route::resource('pool_appointments', 'Admin\Pool_appointmentController');

    //Admin User CRUD
    Route::resource('users', 'Admin\UserController');

    //Admin Poolparties CRUD
    Route::put('customers2/{pool_party}','Admin\Pool_partyController@confirm2');
    Route::put('customers/{pool_party}','Admin\Pool_partyController@confirm');
    Route::put('poolparties/{pool_party}','Admin\Pool_partyController@update');
    Route::get('poolparties/{pool_party}/edit', 'Admin\Pool_partyController@edit');
    Route::delete('poolparties/{pool_party}', 'Admin\Pool_partyController@destroy');
    Route::resource('poolparties', 'Admin\Pool_partyController');

    //Admin Add swimminglessons CRUD
    Route::resource('swimminglesson', 'Admin\SwimminglessonController', ['parameters' => ['swimminglesson' => 'swimming_lesson']]);


});


Route::redirect('user', '/user/profile');
Route::middleware(['auth'])->prefix('user')->group(function () {

    Route::get('profile', 'User\ProfileController@edit');
    Route::post('profile', 'User\ProfileController@update');
    Route::get('password', 'User\PasswordController@edit');
    Route::post('password', 'User\PasswordController@update');
});

Route::middleware(['auth'])->prefix('auth')->group(function () {
    Route::resource('waitinglists', 'Auth\WaitinglistController', ['parameters' => ['waitinglists' => 'customer_swimming_lesson']]);
    Route::resource('swimminglessonslists', 'Auth\SwimminglessonslistController', ['parameters' => ['swimminglessonslists' => 'customer_swimming_lesson']]);

    //Auth user Custumers management CRUD

//  Route::get('swimmers/{customer}', 'Auth\SwimmersController@show');
    Route::get('swimmers/{customer}/edit', 'Auth\SwimmersController@edit');
    Route::put('swimmers/{customer}','Auth\SwimmersController@update');
    Route::delete('swimmers/{customer}', 'Auth\SwimmersController@destroy');
    Route::resource('swimmers', 'Auth\SwimmersController');

    //assign swimmers to swimminglessons
    Route::resource('assignswimmers', 'Auth\AssignswimmersController', ['parameters' => ['assignswimmers' => 'customer_swimming_lesson']]);
    Route::resource('completeswimmers', 'Auth\CompleteswimmersController', ['parameters' => ['completeswimmers' => 'customer_swimming_lesson']]);
});



