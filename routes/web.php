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
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\FD6Controller;
use App\Http\Controllers\Admin\FD7Controller;
use App\Http\Controllers\Admin\Fc1Controller;
use App\Http\Controllers\Admin\Fc2Controller;
use App\Http\Controllers\Admin\FD3Controller;
use App\Http\Controllers\Admin\DocumentPresentController;
use App\Http\Controllers\Admin\DocumentTypeController;
use App\Http\Controllers\Admin\ChildNoteController;
use App\Http\Controllers\Admin\ParentNoteController;
use App\Http\Controllers\Admin\OfficeSarokController;
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


    Route::resource('documentPresent', DocumentPresentController::class);
    Route::resource('documentType', DocumentTypeController::class);
    Route::resource('officeSarok', OfficeSarokController::class);


    Route::resource('childNote', ChildNoteController::class);
    Route::resource('parentNote', ParentNoteController::class);


    Route::controller(ParentNoteController::class)->group(function () {

        Route::get('/addParentNote/{status}/{dakId}/{nothiId}', 'addParentNote')->name('addParentNote');

    });

    Route::controller(DocumentPresentController::class)->group(function () {

        Route::get('/searchResultForDak', 'searchResultForDak')->name('searchResultForDak');


        Route::get('/deleteAdminFromEdit', 'deleteAdminFromEdit')->name('deleteAdminFromEdit');
        Route::get('/deleteBrachFromEdit', 'deleteBrachFromEdit')->name('deleteBrachFromEdit');

        Route::get('/savePermissionNothi', 'savePermissionNothi')->name('savePermissionNothi');
        Route::get('/givePermissionToNothi/{id}', 'givePermissionToNothi')->name('givePermissionToNothi');



    });

    Route::controller(ChildNoteController::class)->group(function () {


        Route::get('/addChildNote/{status}/{parentId}/{nothiId}/{id}/{activeCode}', 'addChildNote')->name('addChildNote');


    });




    Route::controller(DocumentPresentController::class)->group(function () {

        Route::get('/docTypeCode', 'docTypeCode')->name('docTypeCode');
        Route::get('/presentDocument/{status}/{id}', 'presentDocument')->name('presentDocument');
        Route::get('/sheetAndNotes/{status}/{nothiId}/{id}', 'sheetAndNotes')->name('sheetAndNotes');

    });
    Route::resource('fd3Form', FD3Controller::class);

    Route::controller(FD3Controller::class)->group(function () {

        Route::get('reliefAssistanceProjectProposalPdf/{id}', 'reliefAssistanceProjectProposalPdf')->name('reliefAssistanceProjectProposalPdf');

        Route::get('authorizationLetter/{id}', 'authorizationLetter')->name('authorizationLetter');

        Route::get('letterFromDonorAgency/{id}', 'letterFromDonorAgency')->name('letterFromDonorAgency');



        Route::post('/statusUpdateForFd3', 'statusUpdateForFd3')->name('statusUpdateForFd3');

        Route::get('/fd3FormForRevision', 'fd3FormForRevision')->name('fd3FormForRevision');
        Route::get('/acceptedFd3Form', 'acceptedFd3Form')->name('acceptedFd3Form');

        Route::get('/fd3PdfDownload/{id}', 'fd3PdfDownload')->name('fd3PdfDownload');
        Route::get('/fd3fd2PdfDownload/{id}', 'fd3fd2PdfDownload')->name('fd3fd2PdfDownload');
        Route::get('/fd3fd2OtherPdfDownload/{id}', 'fd3fd2OtherPdfDownload')->name('fd3fd2OtherPdfDownload');


    });





    Route::resource('fc2Form', Fc2Controller::class);

    Route::controller(Fc2Controller::class)->group(function () {

        Route::get('reliefAssistanceProjectProposalPdf/{id}', 'reliefAssistanceProjectProposalPdf')->name('reliefAssistanceProjectProposalPdf');

        Route::get('authorizationLetter/{id}', 'authorizationLetter')->name('authorizationLetter');

        Route::get('letterFromDonorAgency/{id}', 'letterFromDonorAgency')->name('letterFromDonorAgency');



        Route::post('/statusUpdateForFc2', 'statusUpdateForFc2')->name('statusUpdateForFc2');

        Route::get('/fc2FormForRevision', 'fc2FormForRevision')->name('fc2FormForRevision');
        Route::get('/acceptedFc2Form', 'acceptedFc2Form')->name('acceptedFc2Form');

        Route::get('/fc2PdfDownload/{id}', 'fc2PdfDownload')->name('fc2PdfDownload');
        Route::get('/fc2fd2PdfDownload/{id}', 'fc2fd2PdfDownload')->name('fc2fd2PdfDownload');
        Route::get('/fc2fd2OtherPdfDownload/{id}', 'fc2fd2OtherPdfDownload')->name('fc2fd2OtherPdfDownload');


    });



    Route::resource('fc1Form', Fc1Controller::class);

    Route::controller(Fc1Controller::class)->group(function () {

        Route::get('reliefAssistanceProjectProposalPdf/{id}', 'reliefAssistanceProjectProposalPdf')->name('reliefAssistanceProjectProposalPdf');

        Route::get('authorizationLetter/{id}', 'authorizationLetter')->name('authorizationLetter');

        Route::get('letterFromDonorAgency/{id}', 'letterFromDonorAgency')->name('letterFromDonorAgency');



        Route::post('/statusUpdateForFc1', 'statusUpdateForFc1')->name('statusUpdateForFc1');

        Route::get('/fc1FormForRevision', 'fc1FormForRevision')->name('fc1FormForRevision');
        Route::get('/acceptedFc1Form', 'acceptedFc1Form')->name('acceptedFc1Form');

        Route::get('/fc1PdfDownload/{id}', 'fc1PdfDownload')->name('fc1PdfDownload');
        Route::get('/fc1fd2PdfDownload/{id}', 'fc1fd2PdfDownload')->name('fc1fd2PdfDownload');
        Route::get('/fc1fd2OtherPdfDownload/{id}', 'fc1fd2OtherPdfDownload')->name('fc1fd2OtherPdfDownload');


    });



    Route::resource('fd7Form', FD7Controller::class);

    Route::controller(FD7Controller::class)->group(function () {

        Route::get('reliefAssistanceProjectProposalPdf/{id}', 'reliefAssistanceProjectProposalPdf')->name('reliefAssistanceProjectProposalPdf');

        Route::get('authorizationLetter/{id}', 'authorizationLetter')->name('authorizationLetter');

        Route::get('letterFromDonorAgency/{id}', 'letterFromDonorAgency')->name('letterFromDonorAgency');



        Route::post('/statusUpdateForFd7', 'statusUpdateForFd7')->name('statusUpdateForFd7');

        Route::get('/fd7FormForRevision', 'fd7FormForRevision')->name('fd7FormForRevision');
        Route::get('/acceptedFd7Form', 'acceptedFd7Form')->name('acceptedFd7Form');

        Route::get('/fd7PdfDownload/{id}', 'fd7PdfDownload')->name('fd7PdfDownload');
        Route::get('/fd7fd2PdfDownload/{id}', 'fd7fd2PdfDownload')->name('fd7fd2PdfDownload');
        Route::get('/fd7fd2OtherPdfDownload/{id}', 'fd7fd2OtherPdfDownload')->name('fd7fd2OtherPdfDownload');


    });


    Route::resource('fd6Form', FD6Controller::class);

    Route::controller(FD6Controller::class)->group(function () {

        Route::post('/statusUpdateForFd6', 'statusUpdateForFd6')->name('statusUpdateForFd6');

        Route::get('/fd6FormForRevision', 'fd6FormForRevision')->name('fd6FormForRevision');
        Route::get('/acceptedFd6Form', 'acceptedFd6Form')->name('acceptedFd6Form');

        Route::get('/fd6PdfDownload/{id}', 'fd6PdfDownload')->name('fd6PdfDownload');
        Route::get('/fd2PdfDownload/{id}', 'fd2PdfDownload')->name('fd2PdfDownload');
        Route::get('/fd2OtherPdfDownload/{id}', 'fd2OtherPdfDownload')->name('fd2OtherPdfDownload');


    });

    Route::get('/', [DashBoardController::class, 'index'])->name('admin.dashboard');


    Route::resource('noticeList', NoticeController::class);
    Route::resource('branchList', BranchController::class);



    Route::resource('dakBranchList', PostController::class);


    Route::controller(PostController::class)->group(function () {


        Route::get('/main_doc_download/{id}', 'main_doc_download')->name('main_doc_download');

        Route::get('/deleteMemberList/{status}/{id}', 'deleteMemberList')->name('deleteMemberList');

        Route::get('/deleteMemberListAjax', 'deleteMemberListAjax')->name('deleteMemberListAjax');


        Route::get('/createSeal/{status}/{id}', 'createSeal')->name('createSeal');




        Route::get('/dakListFirstStep', 'dakListFirstStep')->name('dakListFirstStep');
        Route::post('/dakListSecondStep', 'dakListSecondStep')->name('dakListSecondStep');

        Route::get('/showDataAll/{status}/{id}', 'showDataAll')->name('showDataAll');

        Route::get('/showDataDesignationWiseOne', 'showDataDesignationWiseOne')->name('showDataDesignationWiseOne');

        Route::get('/showDataDesignationWise', 'showDataDesignationWise')->name('showDataDesignationWise');
        Route::get('/showDataBranchWise', 'showDataBranchWise')->name('showDataBranchWise');

    });

    Route::controller(BranchController::class)->group(function () {
        Route::get('/checkBranch', 'checkBranch')->name('checkBranch');
        Route::get('/showBranchStep', 'showBranchStep')->name('showBranchStep');

    });


    Route::resource('designationList', DesignationController::class);

    Route::controller(DesignationController::class)->group(function () {
        Route::get('/checkDesignation', 'checkDesignation')->name('checkDesignation');
        Route::get('/getDesignationFromBranch', 'getDesignationFromBranch')->name('getDesignationFromBranch');
    });


    Route::resource('assignedEmployee', DesignationStepController::class);

    Route::resource('country', CountryController::class);
    Route::resource('civilInfo', CountryController::class);

    Route::resource('fd9Form', Fd9Controller::class);

    Route::controller(Fd9Controller::class)->group(function () {


        Route::post('/statusUpdateForFd9', 'statusUpdateForFd9')->name('statusUpdateForFd9');




        Route::post('/submitForCheck','submitForCheck')->name('submitForCheck');
        Route::get('/statusCheck','statusCheck')->name('statusCheck');

        Route::get('/downloadForwardingLetter/{id}','downloadForwardingLetter')->name('downloadForwardingLetter');
        Route::post('/postForwardingLetter','postForwardingLetter')->name('postForwardingLetter');

        Route::post('/postForwardingLetterForEdit','postForwardingLetterForEdit')->name('postForwardingLetterForEdit');



        Route::post('/forwardingLetterPost','forwardingLetterPost')->name('forwardingLetterPost');
        Route::get('/fdNinePdfDownload/{id}','fdNinePdfDownload')->name('fdNinePdfDownload');
        Route::get('/nVisaDocumentDownload/{cat}/{id}', 'nVisaDocumentDownload')->name('nVisaDocumentDownload');
    });






    Route::resource('fd9OneForm', Fd9OneController::class);

    Route::controller(Fd9OneController::class)->group(function () {
        Route::post('/statusUpdateForFd9One', 'statusUpdateForFd9One')->name('statusUpdateForFd9One');
        Route::get('/fd9OneDownload/{cat}/{id}', 'fd9OneDownload')->name('fd9OneDownload');
    });



    //register_list_view

    Route::post('/updateStatusRegForm', [RegisterController::class, 'updateStatusRegForm'])->name('updateStatusRegForm');
    Route::get('/printCertificateView', [RegisterController::class, 'printCertificateView'])->name('printCertificateView');

    Route::get('/printCertificateViewDemo', [RegisterController::class, 'printCertificateViewDemo'])->name('printCertificateViewDemo');


    Route::get('/formOnePdf/{main_id}/{id}', [RegisterController::class, 'formOnePdf'])->name('formOnePdf');
    Route::get('/formEightPdf/{main_id}', [RegisterController::class, 'formEightPdf'])->name('formEightPdf');
    Route::get('/sourceOfFund/{id}', [RegisterController::class, 'sourceOfFund'])->name('sourceOfFund');
    Route::get('/otherPdfView/{id}', [RegisterController::class, 'otherPdfView'])->name('otherPdfView');

    Route::get('/ngoMemberDocPdfView/{id}', [RegisterController::class, 'ngoMemberDocPdfView'])->name('ngoMemberDocPdfView');
    Route::get('/ngoDocPdfView/{id}', [RegisterController::class, 'ngoDocPdfView'])->name('ngoDocPdfView');
    Route::get('/renewPdfList/{main_id}/{id}', [RegisterController::class, 'renewPdfList'])->name('renewPdfList');




    Route::get('/nameChangeDoc/{id}', [NameCangeController::class, 'nameChangeDoc'])->name('nameChangeDoc');
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


    Route::controller(RenewController::class)->group(function () {

    Route::get('changeAcNumberDownload/{id}', 'changeAcNumberDownload')->name('changeAcNumberDownload');
    Route::get('dueVatPdfDownload/{id}', 'dueVatPdfDownload')->name('dueVatPdfDownload');
    Route::get('copyOfChalanPdfDownload/{id}', 'copyOfChalanPdfDownload')->name('copyOfChalanPdfDownload');
    Route::get('yearlyBudgetPdfDownload/{id}', 'yearlyBudgetPdfDownload')->name('yearlyBudgetPdfDownload');
    Route::get('foreginPdfDownload/{id}', 'foreginPdfDownload')->name('foreginPdfDownload');
    Route::get('verifiedFdEightDownload/{id}', 'verifiedFdEightDownload')->name('verifiedFdEightDownload');


    Route::get('renewalFileDownload/{title}/{id}', 'renewalFileDownload')->name('renewalFileDownload');


    Route::get('changeAcNumberDownloadOld/{id}', 'changeAcNumberDownloadOld')->name('changeAcNumberDownloadOld');
    Route::get('dueVatPdfDownloadOld/{id}', 'dueVatPdfDownloadOld')->name('dueVatPdfDownloadOld');
    Route::get('copyOfChalanPdfDownloadOld/{id}', 'copyOfChalanPdfDownloadOld')->name('copyOfChalanPdfDownloadOld');
    Route::get('yearlyBudgetPdfDownloadOld/{id}', 'yearlyBudgetPdfDownloadOld')->name('yearlyBudgetPdfDownloadOld');
    Route::get('foreginPdfDownloadOld/{id}', 'foreginPdfDownloadOld')->name('foreginPdfDownloadOld');
    Route::get('verifiedFdEightDownloadOld/{id}', 'verifiedFdEightDownloadOld')->name('verifiedFdEightDownloadOld');

});


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

  Route::controller(AdminController::class)->group(function () {
    Route::get('/getAdminDetail', 'getAdminDetail')->name('getAdminDetail');
        Route::post('/employeeEndDatePost', 'employeeEndDatePost')->name('employeeEndDatePost');
        Route::get('/employeeEndDate', 'employeeEndDate')->name('employeeEndDate');
        Route::post('/postPasswordChange', 'postPasswordChange')->name('postPasswordChange');
        Route::get('/accountPasswordChange/{id}', 'accountPasswordChange')->name('accountPasswordChange');

    });


    Route::controller(AdminController::class)->group(function () {

        Route::post('/checkMailPost', 'checkMailPost')->name('checkMailPost');
        Route::get('/forgetPassword', 'forgetPassword')->name('forgetPassword');
        Route::get('/checkMailForPassword', 'checkMailForPassword')->name('checkMailForPassword');


        Route::get('/newEmailNotify', 'newEmailNotify')->name('newEmailNotify');




        Route::post('/postPasswordChange', 'postPasswordChange')->name('postPasswordChange');
        Route::get('/accountPasswordChange/{id}', 'accountPasswordChange')->name('accountPasswordChange');
    });




    Route::resource('setting', SettingController::class);

    Route::controller(SettingController::class)->group(function () {


        Route::get('/basicInformationEdit', 'basicInformationEdit')->name('basicInformationEdit');
        Route::get('/digitalSignatureEdit', 'digitalSignatureEdit')->name('digitalSignatureEdit');
        Route::post('/digitalSignatureUpdate', 'digitalSignatureUpdate')->name('digitalSignatureUpdate');


        Route::get('/passwordEdit', 'passwordEdit')->name('passwordEdit');
        Route::post('/passwordUpdate', 'passwordUpdate')->name('passwordUpdate');

        Route::get('/profilePictureEdit', 'profilePictureEdit')->name('profilePictureEdit');
        Route::post('/profilePictureUpdate', 'profilePictureUpdate')->name('profilePictureUpdate');




        Route::get('/testOne', 'testOne')->name('testOne');

        Route::get('/testTwo', 'testTwo')->name('testTwo');
    });

    Route::resource('systemInformation', SystemInformationController::class);




});
