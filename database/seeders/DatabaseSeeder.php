<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role; // Pastikan model Role sudah dibuat atau diimpor dengan benar
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus atau komentari pembuatan pengguna pabrik jika tidak diperlukan lagi
        // \App\Models\User::factory(10)->create();

        // Buat peran jika belum ada
        $supervisorRole = Role::firstOrCreate(['name' => 'supervisor']);
        // $adminRole = Role::firstOrCreate(['name' => 'admin']); // Contoh jika ada peran admin

        // Buat pengguna supervisor
        User::factory()->create([
            'name' => 'Supervisor User',
            'email' => 'supervisor@example.com',
            'password' => Hash::make('password'), // Ganti dengan password yang aman
            // 'role_id' => $supervisorRole->id, // Jika Anda menambahkan kolom role_id di tabel users
        ]);

        // Jika Anda menggunakan tabel pivot untuk user_roles, Anda perlu melampirkan peran:
        // $supervisorUser = User::where('email', 'supervisor@example.com')->first();
        // if ($supervisorUser) {
        //     $supervisorUser->roles()->attach($supervisorRole);
        // }

        // Hapus pengguna contoh 'Test User' jika tidak diperlukan
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
