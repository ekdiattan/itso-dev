<?php

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        (new UserSeeder())->run();
    }

};

