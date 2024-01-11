<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InsertProviders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Provider::insert(
            ["name" => "DataProviderW"], 
            ["name" => "DataProvideX"], 
            ["name" => "DataProviderY"]
        );
    }
}
