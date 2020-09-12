<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

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
		return view("layouts.pages.products.product-list", compact("teste"));
	}

	public function index()
	{
		$products = ["Produto 1", "Produto 2"];
		return view("layouts.pages.products.product-list", compact("products"));
	}

	public function show($id){
		return view("layouts.pages.products.product", compact("id"));
	}

	public function edit($id){
		return "Editando produto de id {$id}";
	}

	public function store(){
		return "Cadastrando produto";
	}

	public function update(){
		return "Atualizando produto";
	}

	public function destroy(){
		return "Excluindo produto";
	}
}
