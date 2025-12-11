<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ========================
// AREA PRIVADA
// ========================
Route::middleware('auth')->group(function () {

    // ========================
    // ADMIN
    // ========================
    Route::group(['middleware' => 'admin'], function () {

        // CRUD
        Route::resources([
            'users' => UserController::class,
            'pets'  => PetController::class,
        ]);

        // ADOPTIONS
        Route::get('adoptions', [AdoptionController::class, 'index'])->name('adoptions.index');
        Route::get('adoptions/{id}', [AdoptionController::class, 'show'])->name('adoptions.show');

        // SEARCH
        Route::post('search/adoptions', [AdoptionController::class, 'search'])->name('adoptions.search');

        // EXPORTS - Solo PDF y Excel
        Route::get('export/adoptions/pdf', [AdoptionController::class, 'exportPdf'])->name('adoptions.pdf');
        Route::get('export/adoptions/excel', [AdoptionController::class, 'exportExcel'])->name('adoptions.excel');

        // USERS SEARCH
        Route::post('search/users', [UserController::class, 'search'])->name('users.search');

        // USERS EXPORT
        Route::get('export/users/pdf', [UserController::class, 'pdf'])->name('users.pdf');
        Route::get('export/users/excel', [UserController::class, 'excel'])->name('users.excel');

        // USERS IMPORT
        Route::post('import/users/excel', [UserController::class, 'import'])->name('users.import');

        // PETS SEARCH
        Route::post('search/pets', [PetController::class, 'search'])->name('pets.search');

        // PETS EXPORT
        Route::get('export/pets/pdf', [PetController::class, 'pdf'])->name('pets.pdf');
        Route::get('export/pets/excel', [PetController::class, 'excel'])->name('pets.excel');

        // PETS IMPORT
        Route::post('import/pets/excel', [PetController::class, 'import'])->name('pets.import');
    });

    // ========================
    // CUSTOMER
    // ========================

    // PROFILE
    Route::get('myprofile', [CustomerController::class, 'myprofile'])->name('customer.profile');
    Route::put('myprofile/{id}', [CustomerController::class, 'updateprofile'])->name('customer.profile.update');

    // MY ADOPTIONS
    Route::get('myadoptions', [CustomerController::class, 'myadoptions'])->name('customer.adoptions');
    Route::get('myadoptions/{id}', [CustomerController::class, 'showadoption'])->name('customer.adoptions.show');

    // MAKE ADOPTION (LIST PETS)
    Route::get('makeadoption', [CustomerController::class, 'listpets'])->name('customer.makeadoption');

    // SEARCH PETS TO ADOPT
    Route::post('search/makeadoption', [CustomerController::class, 'search'])->name('customer.makeadoption.search');

    // VIEW PET DETAILS
    Route::get('pet/{id}', [CustomerController::class, 'showPet'])->name('customer.pet.show');

    // CONFIRM ADOPTION
    Route::post('pet/{id}/adopt', [CustomerController::class, 'adoptPet'])->name('customer.pet.adopt');
});

require __DIR__ . '/auth.php';
