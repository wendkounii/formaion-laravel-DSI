<?php

use App\Models\User;
use App\Models\Produit;
use App\Mail\NouveauProduitAjouter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Notifications\nouveauProduitNotification;

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

Route::get('/', [MainController::class, 'afficheAccueil']) ->name('accueil');
Route::get('procedure/{param}',           [MainController::class, 'afficheProcedure'])->name('procedure');
Route::get('ajouter-produit',             [MainController::class, 'ajoutProduit'])->name('ajout.produit');
Route::get('ajouterencore-produit',       [MainController::class, 'ajoutProduitEncore'])->name('ajoutencore.produit');
Route::get('produit/liste',               [MainController::class, 'listeProduit'])->name('produits.liste');
Route::get('modifier-produit/{id}',       [MainController::class, 'modifierProduit'])->name('modifier.produit');
//Route::post('modifier-produit',         [MainController::class, 'modifierProduit'])->name('modifier.produit'); : lorsqu'on passe par un formulaire
Route::get('supprimer-produit/{id}',      [MainController::class, 'supprimerProduit'])->name('supprimer.produit'); 
Route::get('supprimer-commande/{id}',     [MainController::class, 'supprimerCommande'])->name('supprimer.commande'); 
Route::get('supprimerencore-produit/{id}',[MainController::class, 'supprimerEncoreProduit'])->name('supprimerencore.produit'); 
Route::get('ajouter-commande/{id}',       [MainController::class, 'ajouterCommande'])->name('ajouter.commande'); 
//Route::get('produits.liste',            [MainController::class, 'supprimerEncoreProduit'])->name('supprimerencore.produit'); 
Route::get('produit/ajouter',             [MainController::class, 'ajouterProduit'])->name('ajouter.produit');
Route::post('produit/enregistrer',        [MainController::class, 'enregistrerProduit'])->name('enregistrer.produit');
Route::get('produit/modifier/{produit}',  [ProduitController::class, 'edit'])->name('modifie.produit');
Route::put('produit/update/{id}',         [MainController::class, 'updateProduit'])->name('update.produit');
Route::resource('produits',               ProduitController::class);
Route::get('export-excel',                [MainController::class, 'excelExport'])->name('excel.export');
Route::get('send-mail',                   [MainController::class, 'sendMail'])->name('send.mail');
Route::get('test-mail', function (){
    //dd('ok');
   // $user = User::first();
    $produit = Produit::first();
   return new NouveauProduitAjouter($produit);
});
Route::get('test-notification', function(){
     $user =  User::first();
     $produit = Produit::first();
     $user->notify(new nouveauProduitNotification($produit));

});