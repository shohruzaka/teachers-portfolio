<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Rollarni yaratamiz
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'Teacher']);

        // Ruxsatlarni (permissions) ham shu yerda qo'shish mumkin
        // Hozircha faqat rollarni o'zini ishlatamiz.

        // 2. Tizimdagi mavjud foydalanuvchilarga ro'llarni tarqatamiz
        // (Baza buzilmasligi uchun, is_admin = 1 bo'lganlarni topib Admin roli beramiz)
        $users = User::all();

        foreach ($users as $user) {
            // Agar foydalanuvchida eski tizim bo'yicha is_admin == 1 bo'lsa
            if ($user->is_admin) {
                $user->assignRole('Admin');
            } else {
                $user->assignRole('Teacher');
            }
        }
    }
}
