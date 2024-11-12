<?php

use App\Models\User;
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
        User::create([
            'name' => 'tfuprpifqj',
            'password' => bcrypt('123456'),
            'UserEmployeeId' => 1,
            'UserRoleId' => 1,
            'UserCreatedBy' => 1,
            'UserUpdatedBy' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
