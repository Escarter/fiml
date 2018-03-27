<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(VideoCategorySeeder::class);

        $users = factory(App\Models\User::class, 10)->create();

        foreach ($users as $user) {
            $user->assign('user');
        }
        $trainingContent = factory(App\Models\TrainingContent::class, 100)->create();
    }
}
