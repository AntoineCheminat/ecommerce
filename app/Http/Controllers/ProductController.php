<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagesRequest;
use App\Repositories\ProductsRepository;
use App\Product;

class ProductController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::paginate(5);
        return view('produits.produit',['products'=>$products]);
    }

    public function create()
    {
        return view('forms.product');
    }

    // ImagesRequest $imgrequest, Request $request, ProductsRepository $productsRepository
    public function store(ImagesRequest $request, ProductsRepository $productsRepository)
    {
        try{
            if(isset($request->id))
            {
                $this->validate($request, [
                    'name' => 'required|between:4,200',
                    'price' => 'required|numeric|',
                    'image' => 'image'
                ]);
            } else {
                $this->validate($request, [
                    'name' => 'required|between:4,200',
                    'price' => 'required|numeric|',
                    'image' => 'required|image'
                ]);
            }

            if(!isset($request->id))
            {
                $product = new Product();
            } else {
                $product = Product::find($request->id);
            }

            $product->name = strip_tags($request->name);
            $product->price = $request->price;

            if(isset($request->image))
            {
                $image = $productsRepository->save($request->image); /* return array ['file' => '', 'path' => ''] */
                $product->image = strip_tags($image['file']); /* return name */
                $product->path = $image['path']; /* return path */
            }
            $product->save();

        } catch(Exception $e) {
            echo $e-getMessage();
        }
        $products = Product::paginate(5);
        return view('produits.produit',['products'=>$products]);
    }

    public function update($id)
    {
        $product = Product::find($id);
        // echo $product;
        return view('forms.product', ['product' => $product]);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        $products = Product::paginate(5);
        return redirect()->route('produit', ['products' => $products]);
    }
}
