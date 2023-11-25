<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('auth/login');
});

// start admin route
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'AdminDashboard'])->name('admin.home');

    Route::get('/index', [AdminController::class, 'ViewDashboard'])->name('admin.index');

    // calamity-types
    Route::get('/calamity-type', [AdminController::class, 'ViewCalamity'])->name('admin.calamity-type');
    Route::post('/admin/addcalamitytype', [AdminController::class, 'AddCalamity'])->name('admin.calamitytype');
    Route::put('/admin/update/{id}', [AdminController::class, 'updateDataCalamity'])->name('admin.update');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'deleteDataCalamity'])->name('admin.delete');

    // end calamity-types

    // start barangay name

    Route::get('/barangay', [AdminController::class, 'ViewBarangay'])->name('admin.barangay');
    Route::post('/admin/AddBarangay', [AdminController::class, 'AddBarangay'])->name('admin.AddBarangayName');
    Route::delete('/admin/delete/barangay/{id}', [AdminController::class, 'deleteBarangay'])->name('admin.delete-barangay');
    Route::put('/admin/edit/barangay/{id}', [AdminController::class, 'editBarangay'])->name('admin.edit-barangay');

    // end barangay name

    // start Evacuation Center

    Route::get('/evacuation-center', [AdminController::class, 'ViewEvacuationCenter'])->name('admin.evacuation-center');
    Route::post('/admin/AddEvacuationCenter', [AdminController::class, 'AddEvacuationCenter'])->name('admin.EvacuationCenter');
    Route::delete('/admin/delete/center/{id}', [AdminController::class, 'deleteCenter'])->name('admin.delete-center');
    Route::put('/admin/edit/center/{id}', [AdminController::class, 'editCenter'])->name('admin.edit-center');

    // end Evacuation Center

    // star add Evacuees
    Route::get('/add-evacuees', [AdminController::class, 'AddEvacuees'])->name('admin.add-evacuees');
    Route::post('/admin/AddEvacues', [AdminController::class, 'AddEvacuee'])->name('admin.AddEvacuess');

    // end add evacuees
    Route::get('/manage-evacuees', [AdminController::class, 'ManageEvacuees'])->name('admin.manage-evacuees');
    Route::put('/admin/edit/evacuee/{id}', [AdminController::class, 'updateEvacInfo'])->name('admin.update-evac-info');
    Route::delete('/admin/delete/evacuee/{id}', [AdminController::class, 'deleteEvacInfo'])->name('admin.delete-EvacInfo');

// start Lgu
    Route::get('/lgu', [AdminController::class, 'ViewLGU'])->name('admin.lgu');
    Route::post('/admin/AddLgu', [AdminController::class, 'AddLgu'])->name('admin.AddLgu');

    // end Lgu
    Route::get('/add-user', [AdminController::class, 'AddUser'])->name('admin.add-user');
    Route::post('/admin/AddUser', [AdminController::class, 'AddUsers'])->name('admin.AddUser');
    Route::put('/admin/edit/user/{id}', [AdminController::class, 'updateUsers'])->name('admin.update-user');
    Route::delete('/admin/delete/user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUsers');


    Route::get('/manage-user', [AdminController::class, 'ManageUser'])->name('admin.manage-user');
    Route::get('/evacuees-report', [AdminController::class, 'ViewEvacueesReport'])->name('admin.evacuees-report');
    Route::get('/gender-report', [AdminController::class, 'ViewGenderReport'])->name('admin.gender-report');
    Route::get('/barangay-report', [AdminController::class, 'ViewBarangayReport'])->name('admin.barangay-report');
    Route::get('/age-report', [AdminController::class, 'ViewAgeReport'])->name('admin.age-report');
    Route::get('/calamity-report', [AdminController::class, 'ViewCalamityReport'])->name('admin.calamity-report');
    Route::get('/center-report', [AdminController::class, 'ViewCenterReport'])->name('admin.center-report');

});
// end admin route

// start user route
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/home', [UserController::class, 'UserDashboard'])->name('user.home');

});
// end user route

require __DIR__.'/auth.php';