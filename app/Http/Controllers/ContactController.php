<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function create()
  {
      return view('contact');
  }

  public function store(ContactRequest $request)
    {
        Mail::to('administrateur@chezmoi.com')
            ->send(new Contact($request->except('_token')));

        return view('confirm');
    }

  /**
  * Avec validation dans le controlleur
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'bail|required|between:5,20|alpha',
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:250'
        ]);

        return view('confirm');
    }
   */

   /**
   * Avec validation dans le controlleur et personnalisation des messages
   public function store(Request $request)
   {
    $this->validate($request, [
            ‘nom’ => ‘bail|required|between:5,20|alpha’,
            ’email’ => ‘bail|required|email’,
            ‘message’ => ‘bail|required|max:250’
        ],[
            ‘required’ => ‘message pour le champ obligatoire’,
            ‘alpha’ => ‘message pour alpha’
    ]);

    return view('confirm');
  }
    */

}
