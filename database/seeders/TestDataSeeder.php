<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;
use App\Models\Article;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Kafedralarni yaratamiz
        $departments = Department::factory()->count(5)->create();

        // 2. Admin foydalanuvchi yaratamiz
        $admin = User::firstOrCreate(
            ['email' => 'admin@teachport.test'],
            [
                'first_name' => 'Tizim',
                'last_name' => 'Administratori',
                'password' => bcrypt('password'),
            ]
        );
        $admin->assignRole('Admin');

        // 3. Maxsus bitta o'qituvchi yaratamiz
        $teacher = User::firstOrCreate(
            ['email' => 'teacher@teachport.test'],
            [
                'first_name' => 'Namuna',
                'last_name' => 'O\'qituvchi',
                'password' => bcrypt('password'),
                'department_id' => $departments->random()->id
            ]
        );
        $teacher->assignRole('Teacher');

        // 4. Tasodifiy 10 ta o'qituvchi yaratamiz
        $teachers = User::factory()->count(10)->create();
        foreach ($teachers as $t) {
            $t->assignRole('Teacher');
        }

        // 5. 30 ta tasodifiy maqola yaratamiz
        $allTeachers = User::role('Teacher')->get();
        Article::factory()->count(30)->create()->each(function ($article) use ($allTeachers) {
            // Har bir maqolaga 1-3 ta muallif biriktiramiz
            $authors = $allTeachers->random(rand(1, 3))->pluck('id')->toArray();
            $article->users()->attach($authors);
        });
    }
}
