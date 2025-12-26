<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/services', function () {
    return Inertia::render('Services');
})->name('services');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Portal Routes (Mockups)
Route::prefix('portal')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Portal/Dashboard', [
            'user' => ['name' => 'Maria'],
            'nextAppointment' => [
                'date' => '25 Oct',
                'time' => '10:00 AM',
                'link' => 'https://zoom.us/j/123456789',
                'type' => 'Terapia Individual'
            ]
        ]);
    })->name('portal.dashboard');

    Route::get('/appointments', function () {
        return Inertia::render('Portal/Appointments/Index', [
            'appointments' => [
                ['id' => 1, 'date' => '25 Oct', 'time' => '10:00 AM', 'type' => 'Terapia Individual', 'status' => 'scheduled', 'mode' => 'virtual'],
                ['id' => 2, 'date' => '18 Oct', 'time' => '10:00 AM', 'type' => 'Terapia Individual', 'status' => 'completed', 'mode' => 'virtual'],
                ['id' => 3, 'date' => '11 Oct', 'time' => '10:00 AM', 'type' => 'Terapia Individual', 'status' => 'cancelled', 'mode' => 'presencial'],
            ]
        ]);
    })->name('portal.appointments');
    
    // Add create route for button
    Route::get('/appointments/new', function () {
         return Inertia::render('Portal/Appointments/Index'); // Just redirect to index for mockup
    });

    Route::get('/calendar', function () {
        return Inertia::render('Portal/Calendar/Index');
    })->name('portal.calendar');

    Route::get('/chat', function () {
        return Inertia::render('Portal/Chat/Index');
    })->name('portal.chat');
});

// Admin Routes (Mockups)
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    Route::get('/appointments/pending', function () {
        return Inertia::render('Admin/Appointments/Pending');
    })->name('admin.appointments.pending');

    Route::get('/users', function () {
        return Inertia::render('Admin/Users/Index');
    })->name('admin.users');

    Route::get('/roles', function () {
        return Inertia::render('Admin/Roles/Index');
    })->name('admin.roles');
});

require __DIR__.'/settings.php';
