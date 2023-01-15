<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//All listings
Route::get('/', [ListingController::class,'index']);

//SHOW CREATE FORM
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

//Store listing data
Route::post('/listings', [ListingController::class , 'store'])->middleware('auth');

//SHOW EDIT FORM
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//UPDATE LISTING
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//DELETE LISTING
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//MANAGE LISTINGS
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');;

//SINGLE LISTING
Route::get('/listings/{listing}', [ListingController::class , 'show']);

//SHOW REGISTER CREATE FORM
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//CREATE NEW USERS
Route::post('/users', [UserController::class, 'store']);

//LOG USER OUT
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//USER LOGIN FORM
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//LOGIN USER
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


