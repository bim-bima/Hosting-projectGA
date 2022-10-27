<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
     public function edit()
        {
          $name = Auth::user()->name;
          $email = Auth::user()->email;
          return view('app.profile.edit', compact(['name','email']));
        }

    public function update(Request $request)
        {
          $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          ]);
          auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
          ]);
          Alert::success('Berhasil', 'Data Berhasil Diedit');
          $name = Auth::user()->name;
          $email = Auth::user()->email;
          return view('app.profile.edit', compact(['name','email']));

        }
}
