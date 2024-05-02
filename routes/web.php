<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SpaceEventTypeController;
use App\Http\Controllers\AnnualEventController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AssignedEmployeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

//Login
Route::get('/',[AuthController::class, "login"]);
Route::post('/login',[AuthController::class, "AuthLogin"]);
Route::get('/logout',[AuthController::class, "logout"]);
// Route::get('/forgot-password',[AuthController::class, "forgotpassword"]);
// Route::post('/forgot-password',[AdminController::class, "PostForgotPassword"]);

//admin
Route::get('admin/dashboard',[AnnualEventController::class, 'upcomingEvents'])->name('space_event.dashboard');
Route::get('admin/profile',[ProfileController::class, 'profile'])->name('user_profile.profile');
Route::get('admin/settings',[SettingsController::class, 'settings'])->name('user_profile.settings');

Route::get('admin/dashboard/view',[AnnualEventController::class, 'upcomingEventsView'])->name('upcoming_event.view');


//Annaul Events

// Route::get('/space_events',[AnnualEventController::class,'index'])->name('space_event.index');
// View Events by feedback version <---->
Route::get('/space_events',[AnnualEventController::class,'index1'])->name('space_event.index1');
Route::get('/space_event/create', [AnnualEventController::class, 'createEvent'])->name('space_event.create');
Route::get('/space_event/view', [AnnualEventController::class, 'viewEvent'])->name('space_event.view');
Route::get('/space_event/view/{id}', [AnnualEventController::class, 'viewEventById']);

// create->form change into a modal
// Route::get('/space_events/create',[AnnualEventController::class,'create'])->name('space_event.create');
Route::post('/space_events/assignemployee', [AnnualEventController::class, 'assignEmployee'])->name('assign.employee');
Route::post('/space_events/store',[AnnualEventController::class,'store'])->name('space_event.store');



//Pass data and tasks list to creating an event
Route::post('/space_events/insertEventData',[AnnualEventController::class,'insertEventData'])->name('space_event.insertEventData');

//View Reports list
Route::get('/space_events/{event_id}',[AnnualEventController::class,'show'])->name('space_event.show');

// View Created event report
Route::get('/space_events/{eventTypeId}/Report', [AnnualEventController::class, 'Report'])->name('space_event.editReport');

//Route::get('/space_events/{space_event}/edit',[AnnualEventController::class,'edit'])->name('space_event.edit');
Route::put('/space_events/{space_event}/update',[AnnualEventController::class,'update'])->name('space_event.update');
Route::delete('/space_events/{employee}/delete',[AnnualEventController::class,'delete'])->name('space_event.delete');

Route::get('/space_events/get_employees', [AnnualEventController::class, 'getEmployees'])->name('get.employees');


//Space Event Type List
Route::prefix('event_type')->group(function (){
    Route::get('/',[SpaceEventTypeController::class,'index'])->name('event_type.index');
    Route::post('/store',[SpaceEventTypeController::class,'store'])->name('event_type.store');
    Route::get('/fetch_all',[SpaceEventTypeController::class,'fetchAll'])->name('event_type.fetchAll');
    Route::delete('/delete',[SpaceEventTypeController::class,'delete'])->name('event_type.delete');
    Route::get('/edit',[SpaceEventTypeController::class,'edit'])->name('event_type.edit');
    Route::post('/update',[SpaceEventTypeController::class,'update'])->name('event_type.update');
});

//Employees
Route::get('/employees',[EmployeeController::class,'index'])->name('employee.index');
Route::get('/employees/create',[EmployeeController::class,'create'])->name('employee.create');
Route::post('/employees/store',[EmployeeController::class,'store'])->name('employee.store');
Route::get('/employees/fetch_all',[EmployeeController::class,'fetchAll'])->name('employee.fetchAll');
Route::get('/employees/edit',[EmployeeController::class,'edit'])->name('employee.edit');
Route::post('/employees/update',[EmployeeController::class,'update'])->name('employee.update');
Route::delete('/employees/delete',[EmployeeController::class,'delete'])->name('employee.delete');


//Assigned Employee
Route::get('/assgn_employees',[AssignedEmployeeController::class,'index'])->name('assgn_employee.index');

//Tasks
Route::prefix('task')->group(function (){
    Route::get('/',[TaskController::class,'index'])->name('task.index');
    Route::post('/store',[TaskController::class,'store'])->name('task.store');
    Route::get('/fetch_all',[TaskController::class,'fetchAll'])->name('task.fetchAll');
    Route::get('/view',[TaskController::class,'view_attachment'])->name('task.view');
    Route::get('/download/{id}',[TaskController::class,'download_attachment'])->name('task.download');
    Route::get('/edit',[TaskController::class,'edit'])->name('task.edit');
    Route::post('/update',[TaskController::class,'update'])->name('task.update');
    Route::delete('/delete',[TaskController::class,'delete'])->name('task.delete');
});



Route::prefix('reports')->group(function(){
    Route::get('/registeredlist', [EventController::class, 'showRegisteredList'])->name('reports.showRegisteredList');
    Route::post('/form-data', [EventController::class, 'store'])->name('reports.store');
    Route::post('/import', [EventController::class, 'import'])->name('reports.import');
    Route::delete('/delete',[EventController::class,'delete'])->name('reports.delete');
    Route::get('/fetch_all',[EventController::class,'fetchAll'])->name('reports.fetchAll');

});
