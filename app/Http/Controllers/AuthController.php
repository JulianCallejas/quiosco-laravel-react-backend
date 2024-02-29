<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
  
    //Se usa el request personalizado RegistroRequest
    public function register(RegistroRequest $request){

        //Vaqlidar Registro
        $data = $request->validated();  //Corre la comprobacion de reglas del RegistroRequest

        //Crear Usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];

    
    }

    public function login(LoginRequest $request){
        $data = $request->validated(); //Corre la comprobacion de reglas del LoginRequest

        //Compobar Contraseña
        if(!Auth::attempt($data)) {
            return response([
                'errors' => ['Credenciales incorrectas']
            ], 422);  //422 es el codigo del status de la respuesta ejemplo 200 es ok

        }

        //Autenticar usuario
        $user = Auth::user();
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];

    }

    public function logout(Request $request){

        $user = $request->user();
        $user->currentAccessToken()->delete();

        return ['user' => null];

    }
}
