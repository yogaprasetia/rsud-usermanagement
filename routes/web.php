<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\NotesController;
  
  
// Route::get('/', function () {
//     return view('login');
// });
  
Auth::routes();
  
Route::get('/', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth','verified']], function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/users/status/{user_id}/{status_code}', [UserController::class, 'updateStatus'])->name('users.status.update');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('notes', NotesController::class);
});


Route::get('/status', [UserController::class, 'show']);

Route::get('markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');

Route::get('delete',function(){
    auth()->user()->notifications()->delete();
    return redirect()->back();
})->name('delete');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google URL
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

// Facebook Login URL
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});

// Twitter Login URL
Route::prefix('twitter')->name('twitter.')->group( function(){
    Route::get('auth', [TwitterController::class, 'loginUsingTwitter'])->name('login');
    Route::get('callback', [TwitterController::class, 'callbackFromTwitter'])->name('callback');
});