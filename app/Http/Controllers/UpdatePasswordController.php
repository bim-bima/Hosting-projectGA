<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;


class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return view('app.password.edit');
    }
    public function update(Request $request)
    {
         $request->validate([
        'current_password'     => 'required',
        'password'    => 'required|min:8|confirmed',
        ]);

         if(Hash::check($request->current_password, auth()->user()->password))
         {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            Alert::success('Berhasil', 'Data Berhasil Diupdate');
            return back()->with('message', 'Your Password Has Been Updated');
         }
            throw ValidationException::withMessages([
                'current_password' => 'Your Currennt Password Not Match With Our Record',
            ]);
            
    }
}
