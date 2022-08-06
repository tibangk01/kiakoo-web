<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TaxonController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TaxonomyController;
use App\Http\Controllers\TermOfUseController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\TaxonChildController;
use App\Http\Controllers\PaymentSavedController;
use App\Http\Controllers\TaxonomySearchController;
use App\Http\Controllers\DeliveryAddressController;
use App\Http\Controllers\PaymentCallbackController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('test', [TestsController::class, 'index']);
Route::post('test', [TestsController::class, 'store']);

/** invokable page controller */
Route::get('job', JobController::class)->name('job');
Route::get('help', HelpController::class)->name('help');
Route::get('about', AboutController::class)->name('about');
Route::get('policy', PolicyController::class)->name('policy');
Route::get('contact', ContactController::class)->name('contact');
Route::get('delivery', DeliveryController::class)->name('delivery');
Route::get('terms-of-use', TermOfUseController::class)->name('terms-of-use');

Route::resource('taxonomy', TaxonomyController::class)->only(['show']);
Route::resource('taxon', TaxonController::class)->only(['show']);
Route::resource('taxon-child', TaxonChildController::class)->only(['show']);
Route::resource('variation', VariationController::class)->only(['index', 'show']);

/** cart */
Route::resource('cart', CartController::class);

/** search */
// Route::post('taxonomy-search', TaxonomySearchController::class)->name('taxonomy.search');

//TODO: restrict  search routes
Route::resource('search', SearchController::class)->only(['store']);

/** paygate */
Route::post('payment-callback', PaymentCallbackController::class)->name('payment.callback');

Route::group(['middleware' => 'auth'], function () {

    //TODO: refactor controller methods to delete unused
    Route::get('payment/{order}', [PaymentController::class, 'show'])->name('payment.show');

    /** paygate */
    Route::get('payment-saved', PaymentSavedController::class)->name('payment.saved');
    //Route::get('payment-cancelled', [PaymentStatusController::class, 'cancelled'])->name('payment.cancelled'); //TODO: corrrection with deepl

    Route::get('favorite', FavoriteController::class)->name('favorite');
    Route::post('avatar', AvatarController::class)->name('avatar.update');
    Route::resource('order', OrderController::class);

    Route::resource('account', AccountController::class);
    Route::resource('delivery-address', DeliveryAddressController::class)->middleware(['cart_empty']);
    Route::resource('payment', PaymentController::class)->except('show')->middleware(['cart_empty']);
});

require __DIR__.'/auth.php';
