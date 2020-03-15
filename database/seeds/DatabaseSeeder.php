<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //$this->call(UsersTableSeeder::class);

        App\User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('12345678'),
            'role'=>'admin',
            'address'=>'المطرية',
            'gender' =>'male',
            'phone_number' =>'012'.rand(00000000,99999999),
             'date_of_birth'=>'2001-10-10',
        ]);
        for ($i=2; $i <= 11 ; $i++) {
        App\User::create([
            'id'=>$i,
            'name'=>'teacher'.$i,
            'email'=>$i.'teacher@teacher.com',
            'password'=>bcrypt('12345678'),
            'role'=>'teacher',
            'address'=>'المطرية',
            'gender' =>'male',
            'phone_number' =>'012'.rand(00000000,99999999),
            'date_of_birth'=>'2001-10-10',
        ]);
        App\restuser::create([
            'user_id'=>$i,
        ]);

        }
        for ($i=12; $i <= 32 ; $i++) {
            App\User::create([
                'name'=>'teachera'.$i,
                'email'=>$i.'teachera@teachera.com',
                'password'=>bcrypt('12345678'),
                'role'=>'teacherassistant',
                'address'=>'المطرية',
                'gender' =>'male',
                'phone_number' =>'012'.rand(00000000,99999999),
                'date_of_birth'=>'2001-10-10',
            ]);
         }

         App\parentgroup::create([
            'name'=>'public',
         ]);
         App\parentgroup::create([
            'name'=>'it',
         ]);
         App\parentgroup::create([
            'name'=>'is',
         ]);
         App\parentgroup::create([
            'name'=>'cs',
         ]);
         App\group::create([
            'name'=>'p11',
            'parentgroup_id'=>1,
            'countofsection'=>13,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>1,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>1,
         ]);
         for ($i=1; $i <=13 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'p11',
                'group_id'=>1,
             ]);
         }
         App\group::create([
            'name'=>'p12',
            'parentgroup_id'=>1,
            'countofsection'=>13,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>2,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>2,
         ]);
         for ($i=1; $i <=13 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'p12',
                'group_id'=>2,
             ]);
         }
         App\group::create([
            'name'=>'p21',
            'parentgroup_id'=>1,
            'countofsection'=>13,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>3,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>3,
         ]);
         for ($i=1; $i <=13 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'p21',
                'group_id'=>3,
             ]);
         }
         App\group::create([
            'name'=>'p22',
            'parentgroup_id'=>1,
            'countofsection'=>13,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>4,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>4,
         ]);
         for ($i=1; $i <=13 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'p22',
                'group_id'=>4,
             ]);
         }
         App\group::create([
            'name'=>'it3',
            'parentgroup_id'=>2,
            'countofsection'=>6,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>5,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>5,
         ]);
         for ($i=1; $i <=6 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'it3',
                'group_id'=>5,
             ]);
         }
         App\group::create([
            'name'=>'it4',
            'parentgroup_id'=>2,
            'countofsection'=>6,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>6,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>6,
         ]);
         for ($i=1; $i <=6 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'it4',
                'group_id'=>6,
             ]);
         }
         App\group::create([
            'name'=>'is3',
            'parentgroup_id'=>3,
            'countofsection'=>6,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>7,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>7,
         ]);
         for ($i=1; $i <=6 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'is3',
                'group_id'=>7,
             ]);
         }
         App\group::create([
            'name'=>'is4',
            'parentgroup_id'=>3,
            'countofsection'=>6,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>8,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>8,
         ]);
         for ($i=1; $i <=6 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'is4',
                'group_id'=>8,
             ]);
         }
         App\group::create([
            'name'=>'cs3',
            'parentgroup_id'=>4,
            'countofsection'=>6,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>9,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>9,
         ]);
         for ($i=1; $i <=6 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'cs3',
                'group_id'=>9,
             ]);
         }
         App\group::create([
            'name'=>'cs4',
            'parentgroup_id'=>4,
            'countofsection'=>6,
         ]);
         App\groupsize::create([
            'table'=>'["1"]',
            'group_id'=>10,
         ]);
         App\restgroup::create([
            'days'=>'["0"]',
            'time'=>'["0"]',
            'group_id'=>10,
         ]);
         for ($i=1; $i <=6 ; $i++) {
            App\sectiongroup::create([
                'name'=>'sec'.$i.'cs4',
                'group_id'=>10,
             ]);
         }
         for ($i=33; $i <= 599 ; $i++) {
            App\User::create([
                'name'=>'student'.$i,
                'email'=>$i.'student@student.com',
                'password'=>bcrypt('12345678'),
                'role'=>'student',
                'address'=>'المطرية',
                'gender' =>'male',
                'phone_number' =>'012'.rand(00000000,99999999),
                'date_of_birth'=>'2001-10-10',
                'group_id'=>App\group::all()->random()->id,
            ]);
         }
        // factory(App\User::class, 10)->create();
        // factory(App\parentgroup::class, 5)->create();
        // factory(App\group::class, 25)->create();
        // factory(App\teacher_details::class, 10)->create();
        // factory(App\student_details::class, 50)->create();
        // factory(App\teacherassistant_details::class, 20)->create();
        // factory(App\subject::class,25)->create();
    }
}
