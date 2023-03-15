<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {	
        $validator = Validator::make($request->all(), [
			'name' => ['required', 'string', 'max:50'],
            //'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
			/*Para un desarrollo real se definirian las politicas de usuario para 
			actualizacion de credenciales, sabemos email es campo unico
			deberia hacerlos el propietario de la cuenta, no un administrador*/
            'telephone' => ['required', 'string'],
		]);
		
		if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::find($id);
        $user->name = $request->name;
        //*****$user->email = $request->email;****
        $user->telephone = $request->telephone;
        $user->user_type = $request->user_type;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
		
		//Por tratarse de una prueba realizare eliminacion fisica
		//en proyectos formales se definen las eliminaciones, pudiendo set fisicas o logicas
        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully',
            'category' => $user,
        ]);
    }
}
