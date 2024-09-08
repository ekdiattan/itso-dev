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
        Schema::create('MasterRole', function (Blueprint $table) {
            $table->bigIncrements('MasterRoleId');
            $table->text('MasterRoleName')->nullable();
            $table->text('MasterRoleCode')->nullable();
            $table->timestamp('MasterRoleCreatedAt', 6)->nullable();
            $table->timestamp('MasterRoleUpdatedAt')->nullable();
            $table->timestamp('MasterRoleDeletedAt', 6)->nullable();
            $table->bigInteger('MasterRoleCreatedBy')->nullable();
            $table->bigInteger('MasterRoleUpdatedBy')->nullable();
            $table->bigInteger('MasterRoleDeletedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MasterRole');
    }
};
