<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model ;

class dashBoardController extends Controller
{
      public function index(){
    //     $product = product::orderBy('created_at', 'asc')->paginate(3);
    //-----------------------------------------------------------------
  //  $product = product::when(request()->has('search'), function ($query) {
      //$query->search(request('search', ''));
    //})->orderBy('created_at', 'DESC')->paginate(3);
    $search_target=request('search');
$product=product::when($search_target,function($query)use($search_target){
  $query->where('name','like','%'.$search_target.'%');
})->orderBy('created_at', 'DESC')->paginate(3);
       $user=User::find(auth()->id());

    return view('main', compact(['product','user']));

    }
}
