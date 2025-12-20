<?php

use Illuminate\Support\Facades\Route;

// Static asset routes for production
Route::get('/css/{file}', function ($file) {
    $path = public_path("css/{$file}");
    if (file_exists($path)) {
        return response()->file($path);
    }
    abort(404);
})->where('file', '.*');

Route::get('/js/{file}', function ($file) {
    $path = public_path("js/{$file}");
    if (file_exists($path)) {
        return response()->file($path);
    }
    abort(404);
})->where('file', '.*');

Route::get('/lib/{path}', function ($path) {
    $filePath = public_path("lib/{$path}");
    if (file_exists($filePath)) {
        return response()->file($filePath);
    }
    abort(404);
})->where('path', '.*');

Route::get('/img/{path}', function ($path) {
    $filePath = public_path("img/{$path}");
    if (file_exists($filePath)) {
        return response()->file($filePath);
    }
    abort(404);
})->where('path', '.*');

// Home page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// About page
Route::get('/about', function () {
    return view('about');
})->name('about');


// Fees Structure page
Route::get('/fees-structure', function () {
    $tuitionFees = \App\Models\FeeStructure::getTuitionFees();
    $uniformFees = \App\Models\FeeStructure::getUniformFees();
    return view('fees_structure', compact('tuitionFees', 'uniformFees'));
})->name('fees-structure');

// Contact page
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

// Facilities page
Route::get('/facilities', function () {
    return view('facilities');
})->name('facilities');

// Team page
Route::get('/team', function () {
    $staff = \App\Models\Staff::active()->ordered()->get();
    return view('team', compact('staff'));
})->name('team');

// Latest News page
Route::get('/latest-news', [App\Http\Controllers\LatestNewsController::class, 'index'])->name('latest-news');

// Photo Gallery page
Route::get('/photo-gallery', [App\Http\Controllers\PhotoGalleryController::class, 'index'])->name('photo-gallery');

// Appointment page
Route::get('/appointment', function () {
    return view('appointment');
})->name('appointment');

// Testimonial page
Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

// 404 page
Route::get('/404', function () {
    return view('404');
})->name('404');

// Authentication routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
Route::get('/admin', [App\Http\Controllers\AuthController::class, 'admin'])->name('admin');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Admin routes (protected)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('carousel', App\Http\Controllers\Admin\CarouselController::class);
    Route::get('about-section/edit', [App\Http\Controllers\Admin\AboutSectionController::class, 'edit'])->name('about-section.edit');
    Route::put('about-section/update', [App\Http\Controllers\Admin\AboutSectionController::class, 'update'])->name('about-section.update');
    Route::resource('core-pillar', App\Http\Controllers\Admin\CorePillarController::class);
    Route::get('fee-structure', [App\Http\Controllers\Admin\FeeStructureController::class, 'index'])->name('fee-structure.index');
    Route::get('fee-structure/{type}/edit', [App\Http\Controllers\Admin\FeeStructureController::class, 'edit'])->name('fee-structure.edit');
    Route::put('fee-structure/{type}', [App\Http\Controllers\Admin\FeeStructureController::class, 'update'])->name('fee-structure.update');
    Route::delete('fee-structure/{type}', [App\Http\Controllers\Admin\FeeStructureController::class, 'destroy'])->name('fee-structure.destroy');
    Route::resource('staff', App\Http\Controllers\Admin\StaffController::class);
    Route::resource('latest-news', App\Http\Controllers\Admin\LatestNewsController::class);
    Route::resource('contact-info', App\Http\Controllers\Admin\ContactInfoController::class);
    Route::get('site-setting/edit', [App\Http\Controllers\Admin\SiteSettingController::class, 'edit'])->name('site-setting.edit');
    Route::put('site-setting/update', [App\Http\Controllers\Admin\SiteSettingController::class, 'update'])->name('site-setting.update');
    Route::resource('photo-gallery', App\Http\Controllers\Admin\PhotoGalleryController::class);
});
