<?php

    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\HdprimarycategoryController;
    use App\Http\Controllers\HdsecondarycategoryController;
    use App\Http\Controllers\AppcaptionController;
    use App\Http\Controllers\TherapyController;
    use App\Http\Controllers\TherapycategoryController;
    use App\Http\Controllers\PartnerController;
    use App\Http\Controllers\PartneruserController;

    use Illuminate\Support\Facades\Route;

    /* language */
    Route::get('/locale/{locale}', function ($locale) {
        if (in_array($locale, ['hu', 'en', 'de'])) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        }
        return redirect()->back();
    })->name('lang.switch');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::resource('users', UserController::class)->only(['index', 'show', 'edit', 'update']);
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('therapies', TherapyController::class);

        Route::resource('therapycategories', TherapycategoryController::class);

        Route::resource('hdprimarycategories', HdprimarycategoryController::class);

        Route::resource('hdsecondarycategories', HdsecondarycategoryController::class);

        Route::get('/appcaptions/exportlangfiles', [App\Http\Controllers\AppcaptionController::class, 'exportTranslationsToLangFiles'])
            ->name('appcaptions.exportlangfiles')
            ->middleware('auth');
        Route::get('/appcaptions/searchtranslations', [App\Http\Controllers\AppcaptionController::class, 'searchtranslations'])
            ->name('appcaptions.searchtranslations');

        Route::resource('appcaptions', AppcaptionController::class);
        
        Route::resource('partners', PartnerController::class);
        
        Route::resource('partnerusers', PartneruserController::class);
        
        Route::prefix('partners/{partner}')->group(function () {
            Route::get('partnerusers/create', [PartnerUserController::class, 'create'])
                ->name('partners.users.create');

        Route::post('partnerusers', [PartnerUserController::class, 'store'])
            ->name('partners.users.store');
});
        
    });

    require __DIR__.'/auth.php';
