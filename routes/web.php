<?php

use Illuminate\Support\Facades\Route;

//Accessible Pages
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\FaqComponent;

//Age Verification Controller
use App\Http\Controllers\Auth\AgeVerificationController;

//Resident Verification Controller
use App\Http\Controllers\Auth\ResidentVerificationController;

//Auth
use App\Http\Controllers\Auth\ChangePasswordController;

//Admin Controller
use App\Http\Controllers\Admin\AdminUserRoleController;
use App\Http\Controllers\Admin\AdminVerifyUserController;

// Admin Livewire
use App\Http\Livewire\Admin\AdminDashboardComponent;

use App\Http\Livewire\Admin\AdminBarangayPermitComponent;
use App\Http\Livewire\Admin\AdminUpdateBarangayPermitComponent;
use App\Http\Livewire\Admin\AdminPrintBarangayPermitComponent;


use App\Http\Livewire\Admin\AdminCertificateComponent;
use App\Http\Livewire\Admin\AdminUpdateCertificateComponent;
use App\Http\Livewire\Admin\AdminPrintCertificateComponent;

use App\Http\Livewire\Admin\AdminClearanceComponent;
use App\Http\Livewire\Admin\AdminUpdateClearanceComponent;
use App\Http\Livewire\Admin\AdminPrintClearanceComponent;

use App\Http\Livewire\Admin\AdminIndigencyComponent;
use App\Http\Livewire\Admin\AdminUpdateIndigencyComponent;
use App\Http\Livewire\Admin\AdminPrintIndigencyComponent;

// use App\Http\Livewire\Admin\AdminBhertComponent;
// use App\Http\Livewire\Admin\AdminUpdateBhertComponent;
// use App\Http\Livewire\Admin\AdminPrintBhertComponent;

use App\Http\Livewire\Admin\AdminBusinessPermitComponent;
use App\Http\Livewire\Admin\AdminUpdateBusinessPermitComponent;
use App\Http\Livewire\Admin\AdminPrintBusinessPermitComponent;

use App\Http\Livewire\Admin\AdminJobSeekerComponent;
use App\Http\Livewire\Admin\AdminUpdateJobSeekerComponent;
use App\Http\Livewire\Admin\AdminPrintJobSeekerComponent;

use App\Http\Livewire\Admin\AdminBarangayOfficialComponent;
use App\Http\Livewire\Admin\AdminAddBarangayOfficialComponent;
use App\Http\Livewire\Admin\AdminUpdateBarangayOfficialComponent;

use App\Http\Livewire\Admin\AdminAnnoucementComponent;
use App\Http\Livewire\Admin\AdminAddAnnoucementComponent;
use App\Http\Livewire\Admin\AdminUpdateAnnouncementComponent;

use App\Http\Livewire\Admin\AdminResidentComponent;
use App\Http\Livewire\Admin\AdminUpdateResidentComponent;

use App\Http\Livewire\Admin\AdminBarangayStaffComponent;
use App\Http\Livewire\Admin\AdminUpdateBarangayStaffComponent;

// User Livewire
use App\Http\Livewire\User\UserDashboardComponent;

use App\Http\Livewire\User\UserBarangayPermitComponent;
use App\Http\Livewire\User\UserBarangayPermitStatusComponent;

use App\Http\Livewire\User\UserCertificateComponent;
use App\Http\Livewire\User\UserCertificateStatusComponent;

use App\Http\Livewire\User\UserClearanceComponent;
use App\Http\Livewire\User\UserClearanceStatusComponent;

use App\Http\Livewire\User\UserIndigencyComponent;
use App\Http\Livewire\User\UserIndigencyStatusComponent;

// use App\Http\Livewire\User\UserBhertComponent;
// use App\Http\Livewire\User\UserBhertStatusComponent;

use App\Http\Livewire\User\UserBusinessPermitComponent;
use App\Http\Livewire\User\UserBusinessPermitStatusComponent;

use App\Http\Livewire\User\UserJobSeekerComponent;
use App\Http\Livewire\User\UserJobSeekerStatusComponent;

use App\Http\Livewire\User\UserAnnoucementComponent;

use App\Http\Livewire\User\UserInformationComponent;
use App\Http\Livewire\User\UserUpdateInformationComponent;

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


Auth::routes([
    'verify' => true
]);

// Route::get('/welcome', function () {
//     return view('welcome');
// });

//Home Route
Route::get('/', HomeComponent::class)->name('home-component');

//Faq
Route::get('/faq', FaqComponent::class)->name('faq-component');

Route::middleware(['auth'])->group(function () {

    //Age Verification
    Route::get('/age-verification', [AgeVerificationController::class, 'index'])->name('age-verification');

    //Resident Verification
    Route::get('/resident-verification', [ResidentVerificationController::class, 'index'])->name('resident-verification');

    Route::middleware(['verified', 'is_adult', 'is_resident'])->group(function () {
        //Change Password
        Route::get('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');
        Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('update-password');

        Route::get('/dashboard', UserDashboardComponent::class)->name('user.user-dashboard');

        Route::get('barangay-permit', UserBarangayPermitComponent::class)->name('user.user-barangay-permit');
        Route::get('barangay-permit/status', UserBarangayPermitStatusComponent::class)->name('user.user-barangay-permit-status');

        Route::get('certificate', UserCertificateComponent::class)->name('user.user-certificate');
        Route::get('certificate/status', UserCertificateStatusComponent::class)->name('user.user-certificate-status');

        Route::get('clearance', UserClearanceComponent::class)->name('user.user-clearance');
        Route::get('clearance/status', UserClearanceStatusComponent::class)->name('user.user-clearance-status');

        Route::get('indigency', UserIndigencyComponent::class)->name('user.user-indigency');
        Route::get('indigency/status', UserIndigencyStatusComponent::class)->name('user.user-indigency-status');

        // Route::get('bhert', UserBhertComponent::class)->name('user.user-bhert');
        // Route::get('bhert/status', UserBhertStatusComponent::class)->name('user.user-bhert-status');

        Route::get('business-permit', UserBusinessPermitComponent::class)->name('user.user-business-permit');
        Route::get('business-permit/status', UserBusinessPermitStatusComponent::class)->name('user.user-business-permit-status');

        Route::get('job-seeker', UserJobSeekerComponent::class)->name('user.user-job-seeker');
        Route::get('job-seeker/status', UserJobSeekerStatusComponent::class)->name('user.user-job-seeker-status');

        Route::get('announcements', UserAnnoucementComponent::class)->name('user.user-annoucement');

        Route::get('information', UserInformationComponent::class)->name('user.user-information');
        Route::get('information/update/{user_id}', UserUpdateInformationComponent::class)->name('user.user-update-information');

        //Route Admin
        Route::middleware(['is_admin'])->prefix('admin')->group(function () {
            Route::get('/dashboard', AdminDashboardComponent::class)->name('admin.admin-dashboard');

            Route::get('users', [AdminUserRoleController::class, 'index']);
            Route::get('users/{user_id}', [AdminUserRoleController::class, 'edit']);
            Route::put('update-user/{user_id}', [AdminUserRoleController::class, 'update']);

            Route::get('verify', [AdminVerifyUserController::class, 'index']);
            Route::get('verify/{user_id}', [AdminVerifyUserController::class, 'edit']);
            Route::put('update-verify/{user_id}', [AdminVerifyUserController::class, 'update']);

            Route::get('barangay-permits', AdminBarangayPermitComponent::class)->name('admin.admin-barangay-permit');
            Route::get('barangay-permits/update/{barangay_permit_id}', AdminUpdateBarangayPermitComponent::class)->name('admin.admin-update-barangay-permit');
            Route::get('barangay-permits/print/{barangay_permit_id}', AdminPrintBarangayPermitComponent::class)->name('admin.admin-print-barangay-permit');

            Route::get('certificates', AdminCertificateComponent::class)->name('admin.admin-certificate');
            Route::get('certificates/update/{certificate_id}', AdminUpdateCertificateComponent::class)->name('admin.admin-update-certificate');
            Route::get('certificates/print/{certificate_id}', AdminPrintCertificateComponent::class)->name('admin.admin-print-certificate');

            Route::get('clearances', AdminClearanceComponent::class)->name('admin.admin-clearance');
            Route::get('clearances/update/{clearance_id}', AdminUpdateClearanceComponent::class)->name('admin.admin-update-clearance');
            Route::get('clearances/print/{clearance_id}', AdminPrintClearanceComponent::class)->name('admin.admin-print-clearance');

            Route::get('indigencies', AdminIndigencyComponent::class)->name('admin.admin-indigency');
            Route::get('indigencies/update/{indigency_id}', AdminUpdateIndigencyComponent::class)->name('admin.admin-update-indigency');
            Route::get('indigencies/print/{indigency_id}', AdminPrintIndigencyComponent::class)->name('admin.admin-print-indigency');

            // Route::get('bherts', AdminBhertComponent::class)->name('admin.admin-bhert');
            // Route::get('bherts/update/{bhert_id}', AdminUpdateBhertComponent::class)->name('admin.admin-update-bhert');
            // Route::get('bherts/print/{bhert_id}', AdminPrintBhertComponent::class)->name('admin.admin-print-bhert');

            Route::get('business-permits', AdminBusinessPermitComponent::class)->name('admin.admin-business-permit');
            Route::get('business-permits/update/{business_permit_id}', AdminUpdateBusinessPermitComponent::class)->name('admin.admin-update-business-permit');
            Route::get('business-permits/print/{business_permit_id}', AdminprintBusinessPermitComponent::class)->name('admin.admin-print-business-permit');

            Route::get('job-seekers', AdminJobSeekerComponent::class)->name('admin.admin-job-seeker');
            Route::get('job-seekers/update/{job_seeker_id}', AdminUpdateJobSeekerComponent::class)->name('admin.admin-update-job-seeker');
            Route::get('job-seekers/print/{job_seeker_id}', AdminPrintJobSeekerComponent::class)->name('admin.admin-print-job-seeker');

            Route::get('barangay-officials', AdminBarangayOfficialComponent::class)->name('admin.admin-barangay-official');
            Route::get('barangay-officials/add', AdminAddBarangayOfficialComponent::class)->name('admin.admin-add-barangay-official');
            Route::get('barangay-officials/update/{barangay_official_id}', AdminUpdateBarangayOfficialComponent::class)->name('admin.admin-update-barangay-official');

            Route::get('announcements', AdminAnnoucementComponent::class)->name('admin.admin-announcement');
            Route::get('announcements/add', AdminAddAnnoucementComponent::class)->name('admin.admin-add-announcement');
            Route::get('announcements/update/{announcement_id}', AdminUpdateAnnouncementComponent::class)->name('admin.admin-update-announcement');

            Route::get('residents', AdminResidentComponent::class)->name('admin.admin-resident');
            Route::get('residents/update/{user_id}', AdminUpdateResidentComponent::class)->name('admin.admin-update-resident');

            Route::get('barangay-staff', AdminBarangayStaffComponent::class)->name('admin.admin-barangay-staff');
            Route::get('barangay-staff/update/{user_id}', AdminUpdateBarangayStaffComponent::class)->name('admin.admin-update-barangay-staff');
        });
    });
});
