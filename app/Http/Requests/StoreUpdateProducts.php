<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProducts extends FormRequest
{

	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->segment(2);
		return [
			"name" => ["unique:products,name,{$id},id","required", "min:3", "max:255"],
			"description" => ["nullable", "min:3", "max:10000"],
			"price" => ["required", "regex:/^\d+(\.\d{1,2})?$/"],
			"image" => ["nullable", "image"]
		];
	}

	public function messages(){
		return [
			"name.required" 	=> "Campo nome é obrigatório",
			"name.min" 				=> "Caracteres mínimo: 3",
			"name.max"				=> "Caracteres maximo: 255",
			"description.min"	=> "Caracteres mínimo: 3",
			"description.max"	=> "Caracteres maximo: 10000",
			"price.required"	=> "Campo preço é obrigatório"

		];
	}
}
