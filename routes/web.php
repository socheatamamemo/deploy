<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CrimeController;
use Illuminate\Support\Facades\Route;

Route::get('/debug', function () {
    return App\Http\Controllers\HomePageController::class;
});

// Public routes
Route::get('/', [HomePageController::class, 'homepage'])->name('guest.homepage');
Route::get('/aboutUs', [HomePageController::class, 'aboutUs'])->name('guest.aboutUs');
Route::get('/contact-us', [ContactController::class, 'createGuest'])->name('contact.guestCreate');
Route::post('/contact-us', [ContactController::class, 'storeGuest'])->name('contact.guestSubmit');
Route::get('/termPolicy', [HomePageController::class, 'termPolicy'])->name('guest.termPolicy');
Route::get('/getalert', [HomePageController::class, 'getalert'])->name('guest.getalert');
Route::get('/mappage', [HomeController::class, 'mappage'])->name('guest.mappage');

// Routes that require authentication
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
    Route::get('/aboutUspage', [HomeController::class, 'aboutUspage'])->name('user.aboutUspage');
    Route::get('/term_policy', [HomeController::class, 'term_policy'])->name('user.term_policy');
    Route::get('/search', [HomeController::class, 'search'])->name('search');
    Route::get('/map', [HomeController::class, 'map'])->name('map');
    Route::get('/user.report', [CrimeController::class, 'displayCrimereport'])->name('user.displayCrimereport');
    Route::post('/report-crime', [CrimeController::class, 'reportCrime'])->name('user.reportCrime');
    Route::get('/user.contactUsAuth', [ContactController::class, 'createAuth'])->name('user.contactUsAuth');
    Route::post('/contact-us-auth', [ContactController::class, 'storeAuth'])->name('contact.authSubmit');
    Route::get('/overview', [HomeController::class, 'overview'])->name('user.overview');
    Route::get('/activity', [HomeController::class, 'activity'])->name('user.activity');

    // Profile routes
    // Route::get('/userprofile', [ProfileController::class, 'show'])->name('userprofile.show');
    // Route::get('/userprofile/edit', [ProfileController::class, 'edit'])->name('userprofile.edit');
    // Route::put('/userprofile', [ProfileController::class, 'update'])->name('userprofile.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/userprofile', [ProfileController::class, 'show'])->name('userprofile.show');
    Route::get('/userprofile/edit', [ProfileController::class, 'edit'])->name('userprofile.edit');
    Route::put('/userprofile', [ProfileController::class, 'update'])->name('userprofile.update');
    Route::delete('/userprofile', [ProfileController::class, 'destroy'])->name('userprofile.destroy');
});


require __DIR__.'/auth.php';
