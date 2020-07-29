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
        $usuario = new User();
        $usuario->name = "Claudimar Bezerra";
        $usuario->email = "admin@mail.com";
        $usuario->password = Hash::make('123456');
        $usuario->save();
    }
}
