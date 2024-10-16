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
        Schema::table('Permission', function (Blueprint $table) {
            $table->foreign(['PermissionModuleId'], 'Permission_PermissionModuleId_fkey')->references(['MasterModuleId'])->on('MasterModule');
            $table->foreign(['PermissionRoleId'], 'Permission_PermissionRoleId_fkey')->references(['MasterRoleId'])->on('MasterRole');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Permission', function (Blueprint $table) {
            $table->dropForeign('Permission_PermissionModuleId_fkey');
            $table->dropForeign('Permission_PermissionRoleId_fkey');
        });
    }
};
