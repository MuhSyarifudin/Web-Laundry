<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [[
            'id' => Str::uuid()->toString(),
            'username' => 'Syarifudin',
            'name' => 'Muhamad Syarifudin Abdul Jalal',
            'email' => 'suicideudin@gmail.com',
            'password' => Hash::make('123.Brilian'),
            'is_actived' => '1',
            'hak_akses' => 'Owner',
            'avatar' => 'foto syarifudin.png'
            
        ],[
            'id' => Str::uuid()->toString(),
            'username' => 'Eko',
            'name' => 'Mohammad Eko Nur Fauzi',
            'email' => 'mohammadoeko@gmail.com',
            'password' => Hash::make('12345678'),
            'is_actived' => '1',
            'hak_akses' => 'Owner',
            'avatar' => 'foto moh eko.png'
        ]];

        foreach($users as $user){
            User::create($user);
        }
    }
}
