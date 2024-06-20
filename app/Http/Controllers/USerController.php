<?php

namespace App\Http\Controllers;

use App\Providers\AuthServiceProvider;

use App\Http\Requests\updateUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Policies\userPolicy;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class USerController extends Controller
{

   public function store(updateUser $request)
   {
      $validated = $request->validated();

      User::create([
         'name' => $validated['name'],
         'email' => $validated['email'],
         'bio' => $validated['bio'],
         'image' => $validated['image'],
         'password' => $validated['password']
      ]);


      return redirect()->route('home')->with('succes', 'account created');
   }


   public function show(User $user)
   {
      $product = $user->products()->paginate(4);
      return view('table', compact('user', 'product'));
   }


   public function edit(User $user)
   {

      return view('auth.update_user', compact('user'));
   }




   public function update(updateUser $request, User $user)
   {

      if ($user->id == auth()->id()) {
         $validated = $request->validated();

         if ($request->has('image')) {
            $imagpath = $request
               ->file('image')
               ->store('profile', 'public');
            $validated['image'] = $imagpath;
            Storage::disk('public')->delete($user->image ?? '');
         };
         /*   if ($request->has('image')) {
            # code...
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('app/public/images', $image_name);


            $validated['image'] = $path;
         }*/

         $user->update($validated);

         request()->session()->regenerate();


      }
      return redirect()->route('home')->with('succes', 'fuckkkkk');
   }
}
