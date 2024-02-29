<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaCollection;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        //Forma manual de enviar la respuesta        
        //return response()->json(['categorias' =>Categoria::all()]);

        //Forma usando el recurso creado
        return new CategoriaCollection(Categoria::all());
    }
}
