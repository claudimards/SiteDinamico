<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $dados = $request->all();
        
        if(Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['password']])){
            Session::flash('mensagem', [
                'msg'=>'Login realizado com sucesso!',
                'class'=>'green white-text'
            ]);
            return redirect(route('admin.principal'));
        }

        Session::flash('mensagem', [
            'msg'=>'Erro! Confira seus dados!',
            'class'=>'red white-text'
        ]);
        return redirect(route('admin.login'));
    }

    public function sair()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function adicionar()
    {
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $usuario = new User();
        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];
        $usuario->password = Hash::make($dados['password']);
        $usuario->save();

        Session::flash('mensagem', [
            'msg'=>'Usuário cadastrado com sucesso!',
            'class'=>'green white-text'
        ]);

        return redirect(route('admin.usuarios'));
    }

    public function editar($id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request, $id)
    {
        $usuario = User::find($id);
        $dados = $request->all();

        if(isset($dados['password']) && strlen($dados['password']) > 5){
            $dados['password'] = Hash::make($dados['password']);
        }else{
            unset($dados['password']);
        }

        $usuario->update($dados);
        Session::flash('mensagem', [
            'msg'=>'Usuário atualizado com sucesso!',
            'class'=>'green white-text'
        ]);
        return redirect(route('admin.usuarios'));
    }
}