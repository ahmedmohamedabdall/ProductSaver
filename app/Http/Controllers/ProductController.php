<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function store(productRequest $request)
    {
        $validated = $request->validated();

        product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'user_id' => auth()->id()


        ]);


        return redirect()->back()->with('succes', 'product created');
    }
    public function show(product $product)
    {


        return view('share.product-show', compact('product'));
    }
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('home')->with('succes', 'product deleted');
    }



    public function update(productRequest  $request, product $product)
    {

        $validated = $request->validated();

        $product->update($validated);

        return redirect()->route('product.show', $product->id);
    }



}
/**
 * 
 *         $search_target=request('search');
    *  $product = product::when($search_target, function ($query)use($search_target) {
       *    $query->where('name', 'like', '%' .$search_target . '%')->get();
       * });
      *  return redirect()->route('product.show')->with('product',$product->id);
 */