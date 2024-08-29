<?php

namespace Database\Seeders;

use App\Models\System\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Admin::factory()->create();
    }
}
