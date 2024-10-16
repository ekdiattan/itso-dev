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
            $table->increments('PermissionId');
            $table->integer('PermissionModuleId')->nullable();
            $table->integer('PermissionRoleId')->nullable();
            $table->timestamp('PermissionCreatedAt')->nullable();
            $table->timestamp('PermissionUpdatedAt')->nullable();
            $table->timestamp('PermissionDeletedAt')->nullable();
            $table->integer('PermissionCreatedBy')->nullable();
            $table->integer('PermissionUpdatedBy')->nullable();
            $table->integer('PermissionDeletedBy')->nullable();
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
