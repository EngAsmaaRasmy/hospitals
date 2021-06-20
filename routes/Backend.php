<?php
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        require __DIR__.'/auth.php';


       // Route::get('/Dashboard_Admin', [DashboardController::class, 'index']);


//################################# Dashboard User ################################
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth'])->name('dashboard.user');
//################################# End Dashboard User ################################


//################################# Dashboard Admin ################################
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');
 //################################ End Dashboard AAdmin ################################


//################################# Dashboard Lab ################################
      Route::get('/dashboard/lab', function () {
        return view('Dashboard.Lab.dashboard');
       })->middleware(['auth:lab'])->name('dashboard.lab');
 //################################# End Dashboard Lab ################################

 //----------------------------------------------------------------------------------------------------------------
      Route::middleware(['auth:admin'])->group(function (){
//################################# Sections route ##################################
          Route::resource('Sections',SectionController::class);
//################################# End Sections route ################################


          //############################# Doctors route ##########################################

          Route::resource('Doctors', DoctorController::class);
          Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
          Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');

          //############################# end Doctors route ######################################



          //############################# sections route ##########################################

          Route::resource('Service', SingleServiceController::class);

          //############################# end sections route ######################################



          //############################# GroupServices route ##########################################

          Route::view('Add_GroupServices','livewire.GroupServices.index')->name('Add_GroupServices12');

          //############################# end GroupServices route ######################################


      });


    });



