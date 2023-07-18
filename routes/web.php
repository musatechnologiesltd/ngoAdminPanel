<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SystemInformationController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CivilController;
use App\Http\Controllers\Admin\NameCangeController;
use App\Http\Controllers\Admin\RenewController;
use App\Http\Controllers\Admin\Fd9Controller;
use App\Http\Controllers\Admin\Fd9OneController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\DesignationStepController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.auth.login');
// });


Route::get('/', [App\Http\Controllers\HomeController::class, 'mainLogin'])->name('mainLogin');

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {


    Route::get('/', [DashBoardController::class, 'index'])->name('admin.dashboard');


    Route::resource('branchList', BranchController::class);
    Route::resource('designationList', DesignationController::class);

    Route::controller(DesignationController::class)->group(function () {

        Route::get('/getDesignationFromBranch', 'getDesignationFromBranch')->name('getDesignationFromBranch');
    });


    Route::resource('designationStepList', DesignationStepController::class);

    Route::resource('country', CountryController::class);
    Route::resource('civilInfo', CountryController::class);

    Route::resource('fd9Form', Fd9Controller::class);

    Route::controller(Fd9Controller::class)->group(function () {
        Route::post('/forwardingLetterPost','forwardingLetterPost')->name('forwardingLetterPost');
        Route::get('/fdNinePdfDownload/{id}','fdNinePdfDownload')->name('fdNinePdfDownload');
        Route::get('/nVisaDocumentDownload/{cat}/{id}', 'nVisaDocumentDownload')->name('nVisaDocumentDownload');
    });






    Route::resource('fd9OneForm', Fd9OneController::class);

    Route::controller(Fd9OneController::class)->group(function () {

        Route::get('/fd9OneDownload/{cat}/{id}', 'fd9OneDownload')->name('fd9OneDownload');
    });



    //register_list_view

    Route::post('/updateStatusRegForm', [RegisterController::class, 'updateStatusRegForm'])->name('updateStatusRegForm');
    Route::get('/printCertificateView', [RegisterController::class, 'printCertificateView'])->name('printCertificateView');


    Route::get('/formOnePdf/{main_id}/{id}', [RegisterController::class, 'formOnePdf'])->name('formOnePdf');
    Route::get('/formEightPdf/{main_id}', [RegisterController::class, 'formEightPdf'])->name('formEightPdf');
    Route::get('/sourceOfFund/{id}', [RegisterController::class, 'sourceOfFund'])->name('sourceOfFund');
    Route::get('/otherPdfView/{id}', [RegisterController::class, 'otherPdfView'])->name('otherPdfView');

    Route::get('/ngoMemberDocPdfView/{id}', [RegisterController::class, 'ngoMemberDocPdfView'])->name('ngoMemberDocPdfView');
    Route::get('/ngoDocPdfView/{id}', [RegisterController::class, 'ngoDocPdfView'])->name('ngoDocPdfView');
    Route::get('/renewPdfList/{main_id}/{id}', [RegisterController::class, 'renewPdfList'])->name('renewPdfList');




    Route::get('/newNameChangeList', [NameCangeController::class, 'newNameChangeList'])->name('newNameChangeList');
    Route::get('/revisionNameChangeList', [NameCangeController::class, 'revisionNameChangeList'])->name('revisionNameChangeList');
    Route::get('/alreadNameChangeList', [NameCangeController::class, 'alreadNameChangeList'])->name('alreadNameChangeList');
    Route::get('/nameChangeView/{id}', [NameCangeController::class, 'nameChangeView'])->name('nameChangeView');
    Route::post('/updateStatusNameChangeForm', [NameCangeController::class, 'updateStatusNameChangeForm'])->name('updateStatusNameChangeForm');


    Route::get('/newRenewList', [RenewController::class, 'newRenewList'])->name('newRenewList');
    Route::get('/revisionRenewList', [RenewController::class, 'revisionRenewList'])->name('revisionRenewList');
    Route::get('/alreadyRenewList', [RenewController::class, 'alreadyRenewList'])->name('alreadyRenewList');
    Route::get('/renewView/{id}', [RenewController::class, 'renewView'])->name('renewView');
    Route::post('/updateStatusRenewForm', [RenewController::class, 'updateStatusRenewForm'])->name('updateStatusRenewForm');




    Route::get('/newRegistrationList', [RegisterController::class, 'newRegistrationList'])->name('newRegistrationList');
    Route::get('/revisionRegistrationList', [RegisterController::class, 'revisionRegistrationList'])->name('revisionRegistrationList');
    Route::get('/alreadyRegistrationList', [RegisterController::class, 'alreadyRegistrationList'])->name('alreadyRegistrationList');
    Route::get('/registrationView/{id}', [RegisterController::class, 'registrationView'])->name('registrationView');
    //end register_list_view


    Route::resource('login', LoginController::class);
    Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout.submit');

    Route::resource('role', RoleController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('user', AdminController::class);

    Route::resource('setting', SettingController::class);

    Route::resource('systemInformation', SystemInformationController::class);




});
