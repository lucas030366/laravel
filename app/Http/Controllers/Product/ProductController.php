<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProducts;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	private $request;
	private $repo_product;
	
	public function __construct(Request $request, Product $product)
	{
		$this->request = $request;
		$this->repo_product = $product;
	}
	
	public function create()
	{
		return view("layouts.pages.products.create");
	}
	
	public function index()
	{
		$products = Product::orderBy("created_at", "desc")->paginate();
		return view("layouts.pages.products.product-list", ["products" => $products]);
	}
	
	public function show($id)
	{
		//$product = Product::where("id", $id)->first(); //get Retorna um array (precisa iterar)
		$product = Product::find($id);
		if (!$product) return redirect()->back();
		return view("layouts.pages.products.product", ["product" => $product]);
	}
	
	public function edit($id)
	{
		return view("layouts.pages.products.edit");
	}
	
	public function store(StoreUpdateProducts $request)
	{
		$data = $request->only(["name", "price", "description"]);
		$this->repo_product->create($data);
		
		/*
		$product = new Product;
		$product->name = $request->name;
		$product->save();	
		*/
		
		/*
		$request->all();
		$request->name;
		$request->file("photo") || $request->photo;
		$request->file("photo")->isValid() || extension() || getClientOriginalName();
		if($request->photo->isValid()) {
			$name_file = $request->name;
			$request->photo->store("produtos");
		}		
		*/
		return redirect()->route("produtos.index");
	}
	
	public function update(Request $request)
	{
		$all = $request->all();
		
		dd($all['name']);
		return "Atualizado produto";
	}
	
	public function destroy($id)
	{
		if($this->repo_product->find($id)){
			$this->repo_product->where("id", $id)->first()->delete();
		} 
		return redirect()->route("produtos.index");
	}
}
