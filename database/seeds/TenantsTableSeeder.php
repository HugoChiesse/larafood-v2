<?php

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '12325452000196', 
            'name' => 'H&Y Consultoria em TI', 
            'url' => 'h&y-consultoria-em-ti', 
            'email' => 'hugochiesse@gmail.com', 
        ]);
    }
}
