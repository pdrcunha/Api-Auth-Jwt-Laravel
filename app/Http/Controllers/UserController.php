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
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user)  return response()->json(['message' => 'Usuário não encontrado'], 404);
        return response()->json($user);
    }

    public function update(UserStoreRequest $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return response()->json(['message' => 'Usuário editado com sucesso', 'user' => $user], 201);
    }


    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user)  return response()->json(['message' => 'Usuário não encontrado'], 404);
        $user->delete();
        return response()->json(['message' => 'Usuário deletado com sucesso'], 201);
    }
}
