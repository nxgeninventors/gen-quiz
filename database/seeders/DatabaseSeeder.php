<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Seeder;
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

        tap(User::create([
            'name' => 'Muni',
            'email' => 'muni@gmail.com',
            'password' => Hash::make('password'),
        ]), function (User $user) {
            $this->createTeam($user);
        });

        tap(User::create([
            'name' => 'Krishna',
            'email' => 'krishna@gmail.com',
            'password' => Hash::make('password'),
        ]), function (User $user) {
            $this->createTeam($user);
        });

        $this->call([
            QuizCategorySeeder::class,
            QuestionTypeSeeder::class,
            SampleQuizSeeder::class,
        ]);
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
