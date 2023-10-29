<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Profiler\Profile;


class AdminController extends Controller
{
    public function index(): View
    {
        $contas = User::all();
        return view('contas.index')->with('contas', $contas);
    }
    public function edit(string $id)
    {
        $conta = User::find($id);
        $id2 = Auth::id();
        if ($conta) {
            return view('contas.edit')->with('conta', $conta)->with('id', $id2);
        } else {
            $contas = User::all();
            return view('contas.index')->with('contas', $contas)
                ->with('msg', 'Conta não encontrada!');
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, string $id)
    {
        $conta = User::find($id);
        $conta->name = $request->input('name');
        $conta->type = $request->input('type');
        $conta->email = $request->input('email');
        $conta->save();
        $contas = User::all();
        return view('contas.index')->with('contas', $contas)
            ->with('msg', 'Conta atualizada!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(string $id)
    {
        $conta = User::find($id);
        $conta->delete();
        $contas = User::all();
        return view('contas.index')->with('contas', $contas)
            ->with('msg', "Conta foi excluída!");
    }
}
