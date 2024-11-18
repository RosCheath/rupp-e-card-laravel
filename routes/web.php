<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StaffController;

Route::get('/', [StaffController::class, 'index']); // Home route (index page)
Route::get('/staff/{encodedName}', [StaffController::class, 'showStaff'])->name('staff.show'); // Show staff data
Route::get('/staff-original/{originalID}', [StaffController::class, 'redirectToEncoded']); // Redirect to encoded ID

Route::get('/404', function () {
    return view('404');
});