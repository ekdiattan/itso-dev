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
        Schema::create('Permission', function (Blueprint $table) {
            $table->bigIncrements('PermissionId');
            $table->bigInteger('PermissionModuleId')->nullable();
            $table->bigInteger('PermissionRoleId')->nullable();
            $table->timestamp('PermissionCreatedAt')->nullable();
            $table->timestamp('PermissionUpdatedAt')->nullable();
            $table->timestamp('PermissionDeletedAt')->nullable();
            $table->bigInteger('PermissionCreatedBy')->nullable();
            $table->bigInteger('PermissionUpdatedBy')->nullable();
            $table->bigInteger('PermissionDeletedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Permission');
    }
};
