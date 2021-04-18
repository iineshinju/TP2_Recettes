<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    function index() {
        // Renvoie à la vue d'accueil de contact
        return view('contact');
    }

    function create() {
        // Renvoie à la vue pour créer les contact par un formulaire
        return view('contact');
    }

    function store(Request $request) {
        // Permet de vérifier les données donné en paramètre
         $validated = $request->validate([
             'name' => 'required|max:100',
             'email' => 'required|email',
             'message' => 'required',
         ]);

         // Permet l'ajout des données dans le tableau contact
         DB::table('contact')->insert([
             'name' => $validated['name'],
             'email' => $validated['email'],
             'message' => $validated['message']
         ]);
         
          // Redirige vers la vue contact.all
         return redirect('/contact/all');
    }

      public function show(){
           $contacts = DB::table('contact')->get();
        //    return $contacts;
           return view('contact.all', compact('contacts')) ;
      }
}
