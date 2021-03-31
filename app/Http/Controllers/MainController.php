<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProduitsExport;
use App\Mail\NouveauProduitAjouter;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\ProduitValidationRequest;
use App\Notifications\nouveauProduitNotification;

class MainController extends Controller
{
    //
    public function afficheAccueil()
    {
        return view('pages.front-office.welcome', 
        [ 'nomSite'        => 'Services en ligne', 
          'nomMinistere'   => 'Ministere de l\'Economie des Postes et la Transformation Digitale'
        ]);
    }
    public function afficheProcedure($param)
    {
        //fonction retournant une page des params recement entrés
        return view('pages.front-office.procedure',
    [
        'parametre' =>$param
    ]);
    }


    //fonction pour créer un nouveau produit 1ere approche
 public function ajoutProduit()
 {
    $produit = new Produit();

    $produit->uuid= Str::uuid();
    $produit->designation= 'Tomate';
    $produit->description= 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis deserunt exercitationem, fuga sapiente id vero repellendus cupiditate maxime neque fugit, ad rerum hic non quam alias ratione quisquam dignissimos perferendis.';
    $produit->prix= '1000';
    $produit->like= '21';
    $produit->pays_source= 'Burkina Faso';
    $produit->poids= '45.10';

    $produit->save();
 }


    //fonction pour créer un nouveau produit 2em approche
  public function ajoutProduitEncore()
  {
     $produit = Produit::create(
          [
              'uuid'        => Str::uuid(),
              'designation' => 'Mangue',
              'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis deserunt exercitationem, fuga sapiente id vero repellendus cupiditate maxime neque fugit, ad rerum hic non quam alias ratione quisquam dignissimos perferendis.',
              'prix'        => 1500,
              'like'        => 63,
              'pays_source' => 'Togo',
              'poids'       => 89.5              

          ]
          );
          
          $user = User::first();
          Mail::to($user)->send(new NouveauProduitAjouter($produit));

  }



    // fonction pour lister les produits
  public function listeProduit()
  {
      $listeproduit = Produit::all();
      $produit = Produit::first();
      $user = User::first();
          
      $produit->users()->attach($user->id);  // lier un produit à un utilisateur
     /* $produit->users()->attach($user); // lier un produit à un utilisateur 2em manière*/


      $users = $produit->users;    // retourne une collection des utilisateurs d'un produit
     /* $users = $produit->users();    // retourne un objet*/


     $produits = $user->produits;    // retourne une collection des produits d'un utilisateur
     /* $produits = $user->produits();    // retourne un objet*/

      //dd($produit, $users, $produits);

      return view("pages.front-office.listeproduit", 
      
       [
         // 'produit' => $listeproduit
         'produit'           =>  Produit::paginate(10),
         'lescommandes'      => Commande::paginate(10),
         'lesutilisateurs'   => User::paginate(10),
         
       ]
       
  );
     
      // dd($listeproduit);
     // echo "hello";
  }


   // fonction pour modifier un produit
  public function modifierProduit($id)
  {
      $produitmodifier = Produit::where("id", $id)->update([
          "designation" => "Tangelo",
          "description" => "Vitamine C"
      ]);
  }


    // fonction pour supprimer un produit 1ere approche
  public function supprimerProduit($id)
  {
      $produitsupprimer = Produit::find($id);
      $produitsupprimer->delete();
      return redirect()->back()->with('produit','supprimé avec succès');
  }


  
    // fonction pour supprimer un produit 2em approche
  public function supprimerEncoreProduit($id)
  {
      Produit::destroy($id);
      
  }


/********************************************************* COMMANDES ********************* */



 // fonction pour ajouter une commande

 public function ajouterCommande($id)
 {
    
   $produit= Produit::find($id); 

    $commandes = new Commande();

    $commandes->uuid= Str::uuid();
    $commandes->id_produit= $id;
    $commandes->uuid_produit= $produit->uuid;
    
    $commandes->save();
    return redirect()->back()->with('ajoutcommande','ajoutée avec succès');
    //return back();
 }


     // fonction pour supprimer un produit 2em approche
  public function supprimerCommande($id)
  {
      Commande::destroy($id);
      return redirect()->back()->with('commande','supprimée avec succès');
  }

  public function ajouterProduit()
  {
    return view("pages.front-office.ajouter-produit");
  }

  public function enregistrerProduit(ProduitValidationRequest $request)
  {
    //dd($request);
   // dd($request->all());
  /* $request->validate([
       "designation"     => "required|min:5|max:255",
       "description"     => "required|min:5",
       "prix"            => "required|digits_between:2,5",
       "like"            => "required|digits_between:1,2",
       "pays_source"     => "required|min:3|max:255",
       "poids"           => "required|digits_between:2,5"
   ]);*/

    $produit = Produit::create([
      "uuid"            => str::uuid(),
      "designation"     => $request->designation,
      "description"     => $request->description,
      "prix"            => $request->prix,
      "like"            => $request->like,
      "pays_source"     =>$request->pays_source,
      "poids"           => $request->poids
    ]);

    // $user = User::first();
    // Mail::to($user)->send(new NouveauProduitAjouter($produit));

    $user =  User::first();
   

    $user->notify(new nouveauProduitNotification($produit));
    //$users = User::all();
    //$produits = Produit::first();
    //Notification::send($users, new nouveauProduitNotification($produits));
    return redirect()->back()->with('enregistrerproduit','enregistrer avec succès'); 
  }



 // public function modifierEncoreProduit($id) ***** 1er manière ****
  public function modifierEncoreProduit( Produit $produit)
  {
    
    //$produit = Produit::find($id); ***** 1er manière ****
    dd($produit);
    return view("pages.front-office.modifier-produit", [

      'produit' => $produit,
    ]);
  }

  public function updateProduit(ProduitValidationRequest $request, $id )
  {
   // $produit = Produit::find($request->id);
   //dd($request->pays_source);
   // $produit->update(['designation'=>$request->designation, 'description'=>$request->description, 'prix'=>$request->prix, 'like'=>$request->like, 'pays_source'=>$request->pays_source, 'poids'=>$request->poids]);
   // return redirect()->back()->with('modifierrerproduit','modifier avec succès');  
    Produit::where('id',$id)->update([
      'designation'=>$request->designation, 
      'description'=>$request->description, 
      'prix'=>$request->prix, 
      'like'=>$request->like, 
      'pays_source'=>$request->pays_source, 
      'poids'=>$request->poids]);
       return redirect()->route("produits.liste")->with('modifierproduit', 'modifier avec succès');
  }

  public function excelExport()
  {
    //dd('ok');
    return Excel::download(new ProduitsExport, "Produits.xls");
  }

 /* public function sendMail(){
    //dd('ok');
    $user = User::first();
    Mail::to($user)->send(new NouveauProduitAjouter());
    dd('le mail a bien été cenvoyé');
  // return new NouveauProduitAjouter();
}*/
}
 