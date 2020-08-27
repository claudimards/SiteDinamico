<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::where('email', '=', 'admin@mail.com')->count()){
            $usuario = User::where('email', '=', 'admin@mail.com')->first();
            $usuario->name = "Claudimar Bezerra";
            $usuario->email = "admin@mail.com";
            $usuario->password = Hash::make('123456');
            $usuario->save();
        }else{
            $usuario = new User();
            $usuario->name = "Claudimar Bezerra";
            $usuario->email = "admin@mail.com";
            $usuario->password = Hash::make('123456');
            $usuario->save();
        }
    }
}
