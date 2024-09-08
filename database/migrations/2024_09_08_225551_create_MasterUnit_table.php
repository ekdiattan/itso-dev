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
        Schema::create('MasterUnit', function (Blueprint $table) {
            $table->bigIncrements('MasterUnitId');
            $table->string('MasterUnitName', 50)->nullable();
            $table->string('MasterUnitCode', 4)->nullable();
            $table->timestamp('MasterUnitCreatedAt', 6)->nullable();
            $table->timestamp('MasterUnitUpdatedAt')->nullable();
            $table->timestamp('MasterUnitDeletedAt', 6)->nullable();
            $table->bigInteger('MasterUnitCreatedBy')->nullable();
            $table->bigInteger('MasterUnitUpdatedBy')->nullable();
            $table->bigInteger('MasterUnitDeletedBy')->nullable();
            $table->string('MasterUnitInitial', 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MasterUnit');
    }
};
