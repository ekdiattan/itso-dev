<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('User', function (Blueprint $table) {
            $table->foreign(['UserEmployeeId'], 'User_UserEmployeeId_fkey')->references(['EmployeeId'])->on('Employee');
            $table->foreign(['UserRoleId'], 'User_UserRoleId_fkey')->references(['MasterRoleId'])->on('MasterRole');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('User', function (Blueprint $table) {
            $table->dropForeign('User_UserEmployeeId_fkey');
            $table->dropForeign('User_UserRoleId_fkey');
        });
    }
};
