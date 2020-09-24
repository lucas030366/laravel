<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProducts;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
		$products = Product::orderBy("updated_at", "desc")->paginate(10);
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
		$product = $this->repo_product->find($id);
		return view("layouts.pages.products.edit", ["product" => $product]);
	}

	public function store(StoreUpdateProducts $request)
	{
		$data = $request->only(["name", "price", "description"]);

		if ($request->hasFile("image") && $request->image->isValid()) {
			$extensao = $request->image->extension();
			$new_name_image = "produto-$request->name.$extensao";
			$image_path = $request->image->storeAs("produtos", $new_name_image);
			$data["image"] = $image_path;
		}

		$this->repo_product->create($data);
		return redirect()->route("produtos.index");
	}

	public function update(StoreUpdateProducts $request, $id)
	{
		$product = $this->repo_product->find($id);
		$data = $request->all();

		if ($product->image && Storage::exists($product->image)) {
			Storage::delete([$product->image]);
		}

		if ($request->hasFile("image") && $request->image->isValid()) {
			$extensao = $request->image->extension();
			$new_name_image = "produto-$request->name.$extensao";
			$image_path = $request->image->storeAs("produtos", $new_name_image);
			$data["image"] = $image_path;
		}

		$product->update($data);
		return redirect()->route("produtos.index");
	}

	public function destroy($id)
	{
		$product = $this->repo_product->find($id);

		if ($product) {
			
			if ($product->image && Storage::exists($product->image)) {
				Storage::delete([$product->image]);
			}

			$this->repo_product->where("id", $id)->first()->delete();
		}
		return redirect()->route("produtos.index");
	}

	public function search(Request $request)
	{
		$filters = $request->except("_token");
		$products = $this->repo_product->search($request->search);
		return view("layouts.pages.products.product-list", [
			"products" => $products,
			"filters" => $filters
		]);
	}
}
