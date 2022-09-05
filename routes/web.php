<?php

use App\Models\commande;
use App\Models\livraison;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('logout','App\Http\Controllers\Auth\LoginController@Logout');
// admin
Route::get('/Admin-Register',[\App\Http\Controllers\AdminController::class, 'ViewForm'])->name('admin.formview');
Route::post('/admin-create',[\App\Http\Controllers\AdminController::class, 'registerAdmin'])->name('admin.create');
// typeboutique
Route::get('/Typeboutique-Register', [App\Http\Controllers\Type_boutiqeController::class, 'ViewForm'])->name('typeboutique.formview');
Route::post('/Typeboutique-create', [App\Http\Controllers\Type_boutiqeController::class, 'registertypeboutique'])->name('typeboutique.create');
// boutique
Route::resource('boutiques','BoutiqueController');
// Route::get('/Boutique-edit', [App\Http\Controllers\BoutiqueController::class, 'edit'])->name('boutique.edit');
// Route::get('/Boutique-index', [App\Http\Controllers\BoutiqueController::class, 'index'])->name('boutique.index');
Route::get('/Boutique-Register', [App\Http\Controllers\BoutiqueController::class, 'ViewForm'])->name('boutique.formview');
Route::post('/Boutique-create', [App\Http\Controllers\BoutiqueController::class, 'registerboutique'])->name('boutique.create');
// client
Route::resource('clients','ClientController');
Route::get('/clientboutique',[App\Http\Controllers\Type_boutiqeController::class,'Recuperation'])->name('clientboutique');
Route::get('/Client-Register', [App\Http\Controllers\ClientController::class, 'ViewForm'])->name('client.formview');
Route::post('/Client-create', [App\Http\Controllers\ClientController::class, 'registerclient'])->name('client.create');

// categorie
Route::resource('categories','CategoryController');
// produit
Route::resource('produits','ProduitController');
// commande
Route::resource('commandes','CommandeController');
// livraison
Route::resource('livraisons','LivraisonController');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
