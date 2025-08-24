<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AvatarController;

// Frontend routes
Route::get('/', [GeneralController::class, 'index']);
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

// Backend routes
Route::prefix('back')->group(function () {
    Route::get('/', [GeneralController::class, 'nav_back'])->name('back.dashboard');
    
    // About (modify only)
    Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/{about}', [AboutController::class, 'update'])->name('about.update');
    
    // Avatar (modify only)
    Route::put('/avatar/{avatar}', [AvatarController::class, 'update'])->name('avatar.update');
    
    // Contact (modify only)
    Route::get('/contact', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact/{contact}', [ContactController::class, 'update'])->name('contact.update');
    
    // Skills (full CRUD)
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
    Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');
    
    // Portfolio (full CRUD)
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    
    // Services (full CRUD)
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    
    // Testimonials (full CRUD)
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    
    // Messages (read/delete only)
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});