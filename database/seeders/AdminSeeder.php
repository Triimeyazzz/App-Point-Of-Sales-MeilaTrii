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
        //Buat User
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        //Jadikan User tersebut menjadi Admin

        //Membuat Role Admin
        //Semisal role sudah dibuat tinggal assign idnya
        //contoh seperti kode paling bawah $user->assignRole(['0' => 'Admin']);
        //atau $user->assignRole(['1' => 'Member']);
        $role = Role::create(['name' => 'Admin']);

        //Sebenernya permission ini tidak perlu karena cuma membutuhkan role
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        //Mengassign role admin ke user
        $user->assignRole([$role->id]);
    }
}
