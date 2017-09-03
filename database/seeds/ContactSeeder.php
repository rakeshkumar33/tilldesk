<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use the factory to create a Faker\Generator instance

        $org = \App\Entities\Organization::find(1);

        $faker = Faker\Factory::create();

        foreach ((range(1, 20)) as $index) {
            $contact = $org->contacts()->create([
                'contactable_id'   => $org->id,
                'contactable_type' => \App\Entities\Organization::class,
                'category' => 'organisation',
                'name' => $faker->unique()->name,
                'memo' => $faker->paragraph
            ]);
        }

//        foreach ((range(1, 20)) as $index) {
//            DB::table('taggables')->insert(
//                [
//                    'tag_id' => rand(1, 20),
//                    'taggable_id' => rand(1, 20),
//                    'taggable_type' => rand(0, 1) == 1 ? 'App\Post' : 'App\Video'
//                ]
//            );
//
//        }
    }
}
