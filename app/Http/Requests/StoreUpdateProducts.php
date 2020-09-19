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
		return [
			"name" => ["required", "min:3", "max:255"],
			"description" => ["nullable", "min:3", "max:10000"],
			"photo" => ["required", "image"]
		];
	}

	public function messages(){
		return [
			"name.required" => "Campo nome é obrigatório",
			"name.min" => "Caracteres mínimo: 3",
			"name.max" => "Caracteres maximo: 255",
			"photo.required" => "O arquivo precisa ser do tipo imagem"
		];
	}
}
