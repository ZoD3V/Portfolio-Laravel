<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PortfolioController;


use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\AboutController as BackendAboutController;
use App\Http\Controllers\Backend\ContactController as BackendContactController;
use App\Http\Controllers\Backend\CVController as BackendCVController;
use App\Http\Controllers\Backend\PortfolioController as BackendPortfolioController;
use App\Http\Controllers\Backend\FooterController as BackendFooterController;
use App\Http\Controllers\Backend\ProfileController as BackendProfileController;




Route::get('/', [HomeController::class, 'index'])->name("frontend.home.index");
Route::get('/portfolio', [PortfolioController::class, 'index'])->name("frontend.porfolio.index");
Route::get('/about', [AboutController::class, 'index'])->name("frontend.about.index");
Route::get('/download/cv', [AboutController::class, 'download_cv'])->name("frontend.about.download.my.cv");
Route::get('/contact', [ContactController::class, 'index'])->name("frontend.contact.index");
Route::post('/contact/process', [ContactController::class, 'process'])->name("frontend.contact.process");

Route::get('/backend/manage/home', [BackendHomeController::class, 'index'])->name("backend.manage.home");

Route::get('/backend/manage/portfolio', [BackendPortfolioController::class, 'index'])->name("backend.manage.portfolio");
Route::get('/backend/create/portfolio', [BackendPortfolioController::class, 'create'])->name("backend.create.portfolio");
Route::post('/backend/create/process/portfolio', [BackendPortfolioController::class, 'create_process'])->name("backend.create.process.portfolio");
Route::get('/backend/edit/portfolio/{id?}', [BackendPortfolioController::class, 'edit'])->name("backend.edit.home");
Route::post('/backend/edit/portfolio/{id?}', [BackendPortfolioController::class, 'edit_process'])->name("backend.edit.process");
Route::get('/backend/process/portfolio/{id?}', [BackendPortfolioController::class, 'show'])->name("backend.show.home");
Route::delete('/backend/delete/portfolio/{id?}', [BackendPortfolioController::class, 'destroy'])->name("backend.delete.portfolio");


Route::get('/backend/manage/about', [BackendAboutController::class, 'index'])->name("backend.manage.about");
Route::post('/about/update', [BackendAboutController::class, 'process'])->name("frontend.about.update");

Route::get('/backend/manage/cv', [BackendCVController::class, 'index'])->name("backend.manage.cv");
Route::post('/backend/cv/process', [BackendCVController::class, 'process'])->name("backend.manage.cv.process");

Route::get('/backend/manage/contact', [BackendContactController::class, 'index'])->name("backend.manage.contact")->middleware('is_admin');
Route::get('/backend/manage/footer', [BackendFooterController::class, 'index'])->name("backend.manage.footer");
Route::get('/backend/edit/footer/{$id}', [BackendFooterController::class, 'edit'])->name("backend.edit.footer");
Route::get('/backend/edit/footer/process', [BackendFooterController::class, 'edit_process'])->name("backend.edit.process.footer");
Route::get('/backend/profile', [BackendProfileController::class, 'profile'])->name("backend.profile");
Route::post('/backend/profile/process', [BackendProfileController::class, 'profile_process'])->name("backend.profile.process");

Route::get('/error-access-admin', function () {
    return view('error-access-admin');
})->name('error.admin.access');


Auth::routes([
    'login ' => true,
    'register ' => false,
    'reset' => false,
    'verify' => false,
]);


Route::get('/register', function () {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
