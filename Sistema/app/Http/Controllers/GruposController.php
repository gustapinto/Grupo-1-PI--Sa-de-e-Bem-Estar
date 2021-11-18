<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\Grupo as GrupoModel;

class GruposController extends Controller
{
    public function index(): View
    {
        $grupos = GrupoModel::obtemGruposParaUsuario(\Auth::user());

        return view('grupos.listar', ['grupos' => $grupos]);
    }

    public function criar(Request $request): string
    {
        $dados = $request->all();

        $dados['criado_por'] = \Auth::user()->id;

        GrupoModel::create($dados);

        return redirect()->route('grupos-listar');
    }

    public function apagar(GrupoModel $grupo): void
    {
        $grupo->delete();
    }

    public function entrar(GrupoModel $grupo): string|JsonResponse
    {
        if (! $grupo->cheio()) {
            $grupo->membros_atual += 1;
            $grupo->save();

            return $grupo->link;
        }

        return response()->json(['mensagem' => 'Esse grupo já está cheio!'], 500);
    }
}
