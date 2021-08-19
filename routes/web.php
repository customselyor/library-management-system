<?php

use App\Http\Controllers\BiotechnologicalFeatureController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLanguageController;
 use App\Http\Controllers\BookTextController;
use App\Http\Controllers\BookTextTypeController;
use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\ConditionPreservationController;
use App\Http\Controllers\ConditionsGrowthController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GrowthController;
use App\Http\Controllers\LanguageSettingController;
use App\Http\Controllers\MAuthorController;
use App\Http\Controllers\MicroCategoryController;
use App\Http\Controllers\MicroParentCategoryController;
use App\Http\Controllers\MicroChildSubCategoryController;
use App\Http\Controllers\MicroorganismController;
use App\Http\Controllers\MicroSubCategoryController;
use App\Http\Controllers\MorganismController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SourceLocationIsolationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CkeditorController; 
use App\Models\Faculty;
use App\Models\Microorganism;
use Illuminate\Support\Facades\Route;


// Route::group('/{lang}', function ($lang) {
//     App::setlocale($lang);
//     Route::get('/{lang}', [App\Http\Controllers\SiteController::class, 'index'])->name('/');
// });
// Route::get('/{lang}', [App\Http\Controllers\SiteController::class, 'index'])->name('/');
Route::get('/register', function() {
    return redirect('/login');
});
//
//Route::post('/register', function() {
//    return redirect('/login');
//});
//mikrobiologiya
//Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('/');
//Route::get('/parent/{id}',[App\Http\Controllers\SiteController::class, 'parent'])->name('parent');
//Route::get('/parent/{id}/{cat}',[App\Http\Controllers\SiteController::class, 'cat'])->name('parent.cat');
//Route::get('/parent/{id}/{cat}/{sub}',[App\Http\Controllers\SiteController::class, 'sub'])->name('parent.sub');
//Route::get('/parent/{id}/{cat}/{sub}/{child}',[App\Http\Controllers\SiteController::class, 'child'])->name('parent.child');



//library app
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/')->middleware(['auth']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

Auth::routes();
Route::get('findSubCategoryId/{id}','App\Http\Controllers\MicroSubCategoryController@findSubCategoryId');
Route::get('findChildSubCategoryId/{id}','App\Http\Controllers\MicroChildSubCategoryController@findChildSubCategoryId');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('/admin');
Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('roles', RoleController::class);
        Route::resource('directions', \App\Http\Controllers\DirectionController::class);
        Route::resource('genders', \App\Http\Controllers\GenderController::class);
        Route::resource('book-types', BookTypeController::class);
        Route::resource('book-languages', BookLanguageController::class);
        Route::resource('book-texts', BookTextController::class);
        Route::resource('book-text-types', BookTextTypeController::class);
        Route::get('books/inventars','App\Http\Controllers\BookController@inventars')->name('books.inventars');
        Route::get('books/exportInventarAllByFromTo','App\Http\Controllers\BookController@exportInventarAllByFromTo')->name('books.exportInventarAllByFromTo');

        Route::resource('books', BookController::class);
        Route::get('books/addInvertar/{id}','App\Http\Controllers\BookController@addInvertar')->name('books.addInvertar');

        Route::post('books/deleteInventar','App\Http\Controllers\BookController@deleteInventar')->name('books.deleteInventar');

        Route::post('books/StoreInvertar','App\Http\Controllers\BookController@StoreInvertar')->name('books.StoreInvertar');

        Route::get('books/exportInventar/{id}','App\Http\Controllers\BookController@exportInventar')->name('books.exportInventar');
        Route::get('books/exportInventarAll/{id}','App\Http\Controllers\BookController@exportInventarAll')->name('books.exportInventarAll');


        Route::resource('faculties', FacultyController::class);
        Route::resource('language-settings', LanguageSettingController::class);
        Route::resource('micro-parent-categories', MicroParentCategoryController::class);
        Route::resource('micro-categories', MicroCategoryController::class);
        Route::resource('micro-sub-categories', MicroSubCategoryController::class);
        Route::resource('micro-child-sub-categories', MicroChildSubCategoryController::class);
        Route::resource('m-authors', MAuthorController::class);
        Route::resource('source-location-isolations', SourceLocationIsolationController::class);
        Route::resource('condition-preservations', ConditionPreservationController::class);
        Route::resource('conditions-growths', ConditionsGrowthController::class);
        Route::resource('growths', GrowthController::class);
        Route::resource('biotechnological-features', BiotechnologicalFeatureController::class);
        Route::resource('morganisms', MorganismController::class);

        Route::resource('users', UserController::class);
        Route::resource('user-types', \App\Http\Controllers\UserTypeController::class);
//        Route::get('qr-code', function ()
//        {
//            return view('qr_code');
//        });

         Route::get('qrcode', \App\Http\Livewire\Admin\QrcodeComponent::class)->name('qrcode.index');
        // Route::get('books', BooksComponent::class)->name('books.index');
        // Route::get('users', ListUsers::class)->name('users.index');
        // Route::get('faculties', \App\Http\Livewire\Admin\FacultiesComponent::class)->name('faculties.index');
        // Route::get('languagesettings', \App\Http\Livewire\Admin\LanguageSettingsComponent::class)->name('languagesettings.index');
        // Route::get('micro-categories', MicroCategoryComponent::class)->name('micro-categories.index');
        Route::post('upload_image', [CkeditorController::class, 'uploadImage'])->name('upload');

});
