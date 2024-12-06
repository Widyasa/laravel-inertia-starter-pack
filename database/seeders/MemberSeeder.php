<?php

namespace Database\Seeders;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::insert([
            'id' => Uuid::uuid4(),
            'name' => 'member 1',
            'username' => 'member1',
            'email' => 'member1@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '08123456789',
            'address' => 'dalung',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
