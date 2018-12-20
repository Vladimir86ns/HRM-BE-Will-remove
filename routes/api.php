<?php

use Dingo\Api\Routing\Router;

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
$api = app(Router::class);

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers', 'middleware' => 'api'], function (Router $api) {

        // ACCOUNT
        $api->group(['prefix' => 'account'], function ($api) {
            $api->post('create', 'AccountController@create');
            $api->get('/{id}', 'AccountController@getAccount');
        });

        // COMPANY
        $api->group(['prefix' => 'company'], function ($api) {
            $api->get('/{id}', 'CompanyController@getCompany');
            $api->post('save_company_settings', 'CompanyController@saveCompanyInfo');
        });

        // USER
        $api->group(['prefix' => 'user'], function ($api) {
            $api->get('/{id}', 'UserController@getUser');
        });
    });
});
