<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Buat User Admin
        $admin = User::create([
            'name' => 'MeilaaTrimeyy',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        //Jadikan User tersebut menjadi Admin

        //Membuat Role Admin
        //Semisal role sudah dibuat tinggal assign idnya
        //contoh seperti kode paling bawah $user->assignRole('Admin');
        //atau $user->assignRole(['1' => 'Member']);
        $roleAdmin = Role::create(['name' => 'Admin']);

        //Mengassign role admin ke user
        $admin->assignRole([$roleAdmin->id]);

        //_________________________________________________________________//

        //Role Petugas
        $petugas = User::create([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        $rolePetugas = Role::create(['name' => 'Petugas']);
        $petugas->assignRole([$rolePetugas->id]);
    }
}
