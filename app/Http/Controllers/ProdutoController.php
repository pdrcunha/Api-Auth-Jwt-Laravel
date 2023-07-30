<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\ProdutcStoreRequest;
use App\Models\Products;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function store(ProdutcStoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['fk_user'] = auth()->user()['id'];

            $produtc = Products::create($validated);

            return response()->json(['message' => 'Produto criado com sucesso', 'produtc' => $produtc], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    public function show(string $id)
    {
        $produtc = Products::find($id);

        if (!$produtc) return response()->json(['message' => 'Produto nao encontrado'], 404);
        return response()->json($produtc);
    }

    public function update(ProdutcStoreRequest $request, string $id)
    {
        $produtc = User::find($id);
        $produtc->name = $request->input('name');
        $produtc->email = $request->input('email');
        $produtc->password = $request->input('password');

        $produtc->save();

        return response()->json(['message' => 'Produto editado com sucesso', 'produtc' => $produtc], 201);
    }


    public function destroy(string $id)
    {
        $produtc = Products::find($id);

        if (!$produtc) return response()->json(['message' => 'Produto não encontrado'], 404);
        $produtc->delete();
        return response()->json(['message' => 'Produto deletado com sucesso'], 201);
    }
}
