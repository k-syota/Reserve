<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            [
                "user_id" => "1",
                "event_id" => "1",
                "number_of_people" => "3",
                "canceled_date" => "2022-11-1 09:00:00"
            ],
            [
                "user_id" => "1",
                "event_id" => "3",
                "number_of_people" => "15",
                "canceled_date" => null
            ],
            [
                "user_id" => "1",
                "event_id" => "3",
                "number_of_people" => "3",
                "canceled_date" => "2022-11-1 09:00:00"
            ],
            [
                "user_id" => "2",
                "event_id" => "1",
                "number_of_people" => "10",
                "canceled_date" => "2022-11-1 09:00:00"
            ],
            [
                "user_id" => "2",
                "event_id" => "10",
                "number_of_people" => "5",
                "canceled_date" => null
            ]
        ]);
    }
}
