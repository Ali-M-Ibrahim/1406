<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status1 = new OrderStatus();
        $status1->name = 'Created';
        $status1->save();

        $status2 = new OrderStatus();
        $status2->name = 'Canceled';
        $status2->save();


    }
}
