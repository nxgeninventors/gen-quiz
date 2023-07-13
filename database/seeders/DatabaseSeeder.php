<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Muni',
        //     'email' => 'muni@gmail.com',
        //     'password' => bcrypt('password')
        // ]);


        $roles = [
            'super-admin', 'teacher',
            'student', 'guest'
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $this->call([
            PermissionSeeder::class,
            QuizCategorySeeder::class,
            QuestionTypeSeeder::class,
            SampleQuizSeeder::class,
        ]);

        tap(User::create([
            'name' => 'Muni',
            'email' => 'muni@gmail.com',
            'password' => Hash::make('password'),
        ]), function (User $user) {
            $this->createTeam($user);
            $user->assignRole(\SUPER_ADMIN);
        });

        tap(User::create([
            'name' => 'Krishna',
            'email' => 'krishna@gmail.com',
            'password' => Hash::make('password'),
        ]), function (User $user) {
            $this->createTeam($user);
            $user->assignRole(\SUPER_ADMIN);
        });

        tap(User::create([
            'name' => 'Guest',
            'email' => 'guest@gmail.com',
            'password' => Hash::make('password'),
        ]), function (User $user) {
            $this->createTeam($user);
            $user->assignRole(\GUEST);
        });

        tap(User::create([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('password'),
        ]), function (User $user) {
            $this->createTeam($user);
            $user->assignRole(\TEACHER);
        });
        tap(User::create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('password'),
        ]), function (User $user) {
            $this->createTeam($user);
            $user->assignRole(\STUDENT);
        });


        $guest_role = Role::findByName(GUEST);

        $guest_role->givePermissionTo('quiz show_quizzes');
        $guest_role->givePermissionTo('quiz start');
        // $guest_role->givePermissionTo('quiz list');

        $student_role = Role::findByName(STUDENT);
        $student_role->givePermissionTo('quiz show_quizzes');
        $student_role->givePermissionTo('quiz start');
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
