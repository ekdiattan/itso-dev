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
        Schema::create('MasterPosition', function (Blueprint $table) {
            $table->bigIncrements('MasterPositionId');
            $table->bigInteger('MasterPositionUnitId')->nullable();
            $table->string('MasterPositionName', 50)->nullable();
            $table->string('MasterPositionCode', 3)->nullable();
            $table->timestamp('MasterPositionCreatedAt')->nullable();
            $table->timestamp('MasterPositionUpdatedAt')->nullable();
            $table->timestamp('MasterPositionDeletedAt')->nullable();
            $table->bigInteger('MasterPositionCreatedBy')->nullable();
            $table->bigInteger('MasterPositionUpdatedBy')->nullable();
            $table->bigInteger('MasterPositionDeletedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MasterPosition');
    }
};
