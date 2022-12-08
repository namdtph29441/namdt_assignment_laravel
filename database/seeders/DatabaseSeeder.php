<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//         $user = [];
//         for ($i = 0; $i <50 ;$i++){
//             $user[] = [
//                 "name"=>"Dang trung nam".($i+1),
//                 "email"=>"namdt".($i+1)."@gmail.com",
//                 "phone"=>"09639267".rand(10,99),
//                 "role_id"=>1,
//                 "address"=>rand(1,99)." đường trịnh văn bô nam từ liêm hà nội",
//                 "password"=>Hash::make('123456'),
//                 "created_at"=>date('Y-m-d H-i-s'),
//                 "updated_at"=>date('Y-m-d H-i-s'),
//             ];
//         }
//         DB::table('users')->insert(
//             $user
//         );
//        $product = [];
//        for ($i = 0; $i <1 ;$i++){
//            $product[] = [
//                "name"=>"Iphone 14",
//
//                "created_at"=>date('Y-m-d H-i-s'),
//                "updated_at"=>date('Y-m-d H-i-s'),
//            ];
//        }
//        DB::table('categories')->insert(
//            $product
//        );

    }
}
