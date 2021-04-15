<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    function index() {
        return view('contact');
    }

    function create() {
        return view('contact');
    }

    function store(Request $request) {
         $validated = $request->validate([
             'name' => 'required|max:100',
             'email' => 'required|email',
             'message' => 'required',
         ]);

         DB::table('contact')->insert([
             'name' => $validated['name'],
             'email' => $validated['email'],
             'message' => $validated['message']
         ]);
         
         return redirect('/contact/all');
    }

      public function show(){
           $contacts = DB::table('contact')->get();
        //    return $contacts;
           return view('contact.all', compact('contacts')) ;
      }
}
