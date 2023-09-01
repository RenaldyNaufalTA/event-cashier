<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\User;
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
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), // password
            'isAdmin' => true
        ]);

        Member::create([
            'id_member' => 1000,
            'name' => 'Ren',
        ]);

        Member::create([
            'id_member' => 1001,
            'name' => 'Dimas',
        ]);

        Event::create([
            'title' => 'Ice Age',
            'slug' => 'ice-age',
            'image' => 'konser-1.png',
            'place' => 'Cinema Malang',
            'address' => 'Jl Malang no.15',
            'price' => 15000,
            'start_date' => '2023-08-30T19:00',
            'end_date' => '2023-08-30T20:00'
        ]);

        Event::create([
            'title' => 'Bloody Vampire',
            'slug' => 'bloody-vampire',
            'image' => 'konser-2.png',
            'place' => 'Cinema Surabaya',
            'address' => 'Jl Soekarno-hatta no.43',
            'price' => 25000,
            'start_date' => '2023-08-29T11:00',
            'end_date' => '2023-08-29T12:00'
        ]);

        Transaction::create([
            'member_id' => 1000,
            'event_id' => 1,
            'pay_method' => 'tunai',
            'pay' => 15000,
            'unique_number' => 15001

        ]);
        Transaction::create([
            'member_id' => 1001,
            'event_id' => 2,
            'pay_method' => 'non-tunai',
            'pay' => 25000,
            'unique_number' => 25002
        ]);
    }
}
