<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Criar um usuário de exemplo
        User::create([
            'name' => 'Exemplo Usuário',
            'email' => 'admin@usuario.com',
            'password' => Hash::make('admin'),
        ]);

        // Criar mais usuários de exemplo...
    }
}
