<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     /**
     * User register
     */
    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login and token creation
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }

    /**
     * Logout and nullify token
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    
    public function edit($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }    

    public function update(Request $request, $id)
    {

        
        /*$campos=[                    
            // DATOS PERSONALES DE LA PERSONA DE CONTACTO
            'name'=>'required|string',
            'last_name'=>'required|string',
            'rfc' => 'required|unique:employees,rfc,'.$employee_id.',id,provider_id,' . $request['provider_id'],
            'provider_id' => 'required|unique:employees,provider_id,'.$employee_id.',id,rfc, ' . $request['rfc'],
            'last_modification_by'=>'required|integer',
        ];
        
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'name.required'=>'El nombre del empleado es un campo requerido',
            'last_name.required'=>'Los apellidos del empleado es un campo requerido',
            'rfc.required'=>'El RFC es un campo requerido',
            'rfc.unique'=>'Este RFC ya ha sido dado de alta anteriormente',
            'is_active.required'=>'Seleccione si el empleado aún se encuentra activo dentro de la empresa',
            'provider_id.required'=>'Hubo un problema al momento de comprobar la identidad del proveedor, favor de intentar más tarde.',            
            'last_modification_by.required'=>'Hubo un problema al comprobar la autenticidad del usuario, favor de intentar más tarde',
        ];*/

        $user = User::find($id);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);        
    }

    public function users()
    {
        $users = User::all();
        
        return response()->json($users);
    }
    

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

}
