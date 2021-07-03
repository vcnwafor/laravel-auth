<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    Route::get('/', 'App\Http\Controllers\WelcomeController@welcome')->name('welcome');
    Route::get('/terms', 'App\Http\Controllers\TermsController@terms')->name('terms');
});

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'App\Http\Controllers\Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'App\Http\Controllers\Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'App\Http\Controllers\Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'App\Http\Controllers\Auth\ActivateController@exceeded']);

    // // Socialite Register Routes
    // Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'App\Http\Controllers\Auth\SocialController@getSocialRedirect']);
    // Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'App\Http\Controllers\Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'App\Http\Controllers\RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'App\Http\Controllers\Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'App\Http\Controllers\Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home',   'uses' => 'App\Http\Controllers\UserController@index']);
    Route::get('/qaqcs', ['as' => 'public.qaqcs',   'uses' => 'App\Http\Controllers\UserController@qaqc']);
    Route::get('/sheets', ['as' => 'public.sheets',   'uses' => 'App\Http\Controllers\UserController@sheets']);
    Route::get('/personnels', ['as' => 'public.personnels',   'uses' => 'App\Http\Controllers\UserController@personnels']);
    Route::get('/configs', ['as' => 'public.configs',   'uses' => 'App\Http\Controllers\UserController@configs']);
    Route::get('/assets', ['as' => 'public.assets',   'uses' => 'App\Http\Controllers\UserController@cassets']);
    //Route::get('/services', ['as' => 'public.services',   'uses' => 'App\Http\Controllers\UserController@services']);
    Route::get('/projects', ['as' => 'public.projects',   'uses' => 'App\Http\Controllers\UserController@projects']);
    Route::get('/reports', ['as' => 'public.reports',   'uses' => 'App\Http\Controllers\UserController@reports']);
    Route::get('/procedures', ['as' => 'public.procedures',   'uses' => 'App\Http\Controllers\UserController@procedures']);


    Route::post('/newsheet',['as' => 'service.newsheet', 'uses' => 'App\Http\Controllers\ServiceController@newsheet']);
    Route::get('/downloadsheet/{file}',['as' => 'downloadsheet', 'uses' => 'App\Http\Controllers\ServiceController@downloadsheet']);
    Route::delete('/destroysheet/{file}',['as' => 'destroysheet', 'uses' => 'App\Http\Controllers\ServiceController@destroysheet']);
    Route::resource('service', 'App\Http\Controllers\ServiceController');

    Route::resource('client', 'App\Http\Controllers\ClientController');

    Route::post('/newpdoc',['as' => 'procedure.newpdoc', 'uses' => 'App\Http\Controllers\ProcedureController@newpdoc']);
    Route::get('/downloadpdoc/{file}',['as' => 'downloadpdoc', 'uses' => 'App\Http\Controllers\ProcedureController@downloadpdoc']);
    Route::delete('/destroypdoc/{file}',['as' => 'destroypdoc', 'uses' => 'App\Http\Controllers\ProcedureController@destroypdoc']);
    Route::resource('procedure', 'App\Http\Controllers\ProcedureController');

    Route::get('report/download', 'App\Http\Controllers\ReportController@download');
    Route::resource('report', 'App\Http\Controllers\ReportController');

    Route::post('/newservice',['as' => 'project.newservice', 'uses' => 'App\Http\Controllers\ProjectController@newservice']);
    Route::get('/downloadservice/{file}',['as' => 'downloadservice', 'uses' => 'App\Http\Controllers\ProjectController@downloadservice']);
    Route::delete('/destroyservice/{file}',['as' => 'destroyservice', 'uses' => 'App\Http\Controllers\ProjectController@destroyservice']);

    Route::post('/newreport',['as' => 'project.newreport', 'uses' => 'App\Http\Controllers\ProjectController@newreport']);
    Route::get('/downloadreport/{file}',['as' => 'downloadreport', 'uses' => 'App\Http\Controllers\ProjectController@downloadreport']);
    Route::delete('/destroyreport/{file}',['as' => 'destroyreport', 'uses' => 'App\Http\Controllers\ProjectController@destroyreport']);

    Route::post('/newpteam',['as' => 'project.newpteam', 'uses' => 'App\Http\Controllers\ProjectController@newpteam']);
    Route::get('/downloadpteam/{file}',['as' => 'downloadpteam', 'uses' => 'App\Http\Controllers\ProjectController@downloadpteam']);
    Route::delete('/destroypteam/{file}',['as' => 'destroypteam', 'uses' => 'App\Http\Controllers\ProjectController@destroypteam']);

    Route::get('project/download', 'App\Http\Controllers\ProjectController@download');
    Route::resource('project', 'App\Http\Controllers\ProjectController');

    Route::get('tsheet/download', 'App\Http\Controllers\TsheetController@download');
    Route::resource('tsheet', 'App\Http\Controllers\TsheetController');

    Route::post('/newcertification',['as' => 'personnel.newcertification', 'uses' => 'App\Http\Controllers\PersonnelController@newcertification']);
    Route::get('/downloadcertification/{file}',['as' => 'downloadcertification', 'uses' => 'App\Http\Controllers\PersonnelController@downloadcertification']);
    Route::delete('/destroycertification/{file}',['as' => 'destroycertification', 'uses' => 'App\Http\Controllers\PersonnelController@destroycertification']);

    Route::post('/newwork',['as' => 'personnel.newwork', 'uses' => 'App\Http\Controllers\PersonnelController@newwork']);
    Route::get('/downloadwork/{file}',['as' => 'downloadwork', 'uses' => 'App\Http\Controllers\PersonnelController@downloadwork']);
    Route::delete('/destroywork/{file}',['as' => 'destroywork', 'uses' => 'App\Http\Controllers\PersonnelController@destroywork']);

    Route::resource('personnel', 'App\Http\Controllers\PersonnelController');


    Route::get('/downloadasset/{file}',['as' => 'downloadasset', 'uses' => 'App\Http\Controllers\AssetController@downloadasset']);
    Route::resource('asset', 'App\Http\Controllers\AssetController');

    Route::get('sheet/download', 'App\Http\Controllers\SheetController@download');
    Route::resource('sheet', 'App\Http\Controllers\SheetController');

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'App\Http\Controllers\ProfilesController@show',
    ]);

    Route::get('/download/{Attachment}', function($Attachment){
        $name = $Attachment;

        $file = Storage::disk('public')->get("uploads/services/sheets/".$Attachment);
        $dray = explode('.',$Attachment);
        $headers  = array(
            'Content-Type: application/'.$dray[count($dray) - 1],
        );

        return Response::download($file, $name, $headers);
    });

});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        \App\Http\Controllers\ProfilesController::class,
        [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'App\Http\Controllers\ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'App\Http\Controllers\ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'App\Http\Controllers\ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'App\Http\Controllers\ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'App\Http\Controllers\ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    Route::resource('/users/deleted', \App\Http\Controllers\SoftDeletesController::class, [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', \App\Http\Controllers\UsersManagementController::class, [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'App\Http\Controllers\UsersManagementController@search')->name('search-users');

    Route::resource('themes', \App\Http\Controllers\ThemesManagementController::class, [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'App\Http\Controllers\AdminDetailsController@listRoutes');
    Route::get('active-users', 'App\Http\Controllers\AdminDetailsController@activeUsers');
});

Route::redirect('/php', '/phpinfo', 301);



