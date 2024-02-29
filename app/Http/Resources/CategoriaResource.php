<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
                
        //Se filtran los campos que se quieren retornar
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'icono' => $this->icono
        ];

        
        //Devuelve todos los campos
        // return parent::toArray($request);
    }
}
