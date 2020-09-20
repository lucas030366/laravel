<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProducts;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
	private $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function create(){
		//dd($this->request);
		$teste = [1,2,3];
		return view("layouts.pages.products.create", compact("teste"));
	}

	public function index()
	{
		$products = Product::paginate();
		return view("layouts.pages.products.product-list", ["products" => $products]);
	}

	public function show($id){
		//$product = Product::where("id", $id)->first(); //get Retorna um array (precisa iterar)
		$product = Product::find($id);
		if(!$product) return redirect()->back();
		return view("layouts.pages.products.product", ["product" => $product]);
	}

	public function edit($id){
		return view("layouts.pages.products.edit");
	}

	public function store(StoreUpdateProducts $request){

		dd("ok");
		//$request->all();
		//$request->name;
		//$request->file("photo") || $request->photo;
		//$request->file("photo")->isValid() || extension() || getClientOriginalName();
		if($request->photo->isValid()) {
			$name_file = $request->name;
			$request->photo->store("produtos");
		}
		return "Cadastrando produto";
	}

	public function update(Request $request){
		$all = $request->all();
	
		dd($all['name']);
		return "Atualizado produto";
	}

	public function destroy(){
		return "Excluindo produto";
	}
}
