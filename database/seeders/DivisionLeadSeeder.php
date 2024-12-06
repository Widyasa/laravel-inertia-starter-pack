<?php

namespace Database\Seeders;

use App\Models\DivisionLead;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class DivisionLeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DivisionLead::insert([
            'id' => Uuid::uuid4(),
            'name' => 'Lead 1',
            'username' => 'lead1',
            'email' => 'lead1@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '08123456789',
            'address' => 'dalung',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
