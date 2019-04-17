<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // TABLE LEVELS
        DB::table('levels')->insert(
            ['description' => 'High',
              'created_at' => now(),
              'updated_at' => now(),
            ]
        );
        
        DB::table('levels')->insert(
            ['description' => 'Medium',
              'created_at' => now(),
              'updated_at' => now(),
            ]
        );
        
        DB::table('levels')->insert(
            ['description' => 'Low',
              'created_at' => now(),
              'updated_at' => now(),
            ]
            );
        
        // TABLE USER
        
        DB::table('users')->insert(
            [ 'name'       => 'Jose C.',
              'email'      => 'jclavotafur@gmail.com',
              'password'   => bcrypt('clavo123'),
              'created_at' => now(),
              'updated_at' => now(),
            ]
            );
        
        /*
         *  ['description' => 'Medium'],
            ['description' => 'Low'] 
         */
        
    }
}
