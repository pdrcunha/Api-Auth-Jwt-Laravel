<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $user = User::create($request->all());

            return response()->json(['message' => 'Usuário criado com sucesso', 'user' => $user], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' =>$th->getMessage()], 401);
        }

    }

   
    public function show(string $id)
    {
        
    }


    public function update(Request $request, string $id)
    {
        
    }


    public function destroy(string $id)
    {
        
    }
}
