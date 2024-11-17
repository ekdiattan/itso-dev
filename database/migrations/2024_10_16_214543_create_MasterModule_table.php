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
        Schema::create('MasterModule', function (Blueprint $table) {
            $table->bigIncrements('MasterModuleId');
            $table->string('MasterModuleCode')->nullable();
            $table->string('MasterModuleName')->nullable();
            $table->timestamp('MasterModuleCreatedAt')->nullable();
            $table->timestamp('MasterModuleUpdatedAt')->nullable();
            $table->timestamp('MasterModuleDeletedAt')->nullable();
            $table->bigInteger('MasterModuleCreatedBy')->nullable();
            $table->bigInteger('MasterModuleUpdatedBy')->nullable();
            $table->bigInteger('MasterModuleDeletedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MasterModule');
    }
};
