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
        Schema::create('MasterAset', function (Blueprint $table) {
            $table->bigInteger('MasterAsetId')->default(0)->primary();
            $table->string('MasterAsetName')->nullable();
            $table->string('MasterAsetCode')->nullable();
            $table->smallInteger('MasterAsetType')->nullable()->comment('1.Vehicle;2.Asset;Room');
            $table->date('MasterAsetBoughtDate')->nullable();
            $table->timestamp('MasterAsetCreatedAt', 6)->nullable();
            $table->timestamp('MasterAsetUpdatedAt')->nullable();
            $table->timestamp('MasterAsetDeletedAt', 6)->nullable();
            $table->bigInteger('MasterAsetCreatedBy')->nullable();
            $table->bigInteger('MasterAsetUpdatedBy')->nullable();
            $table->bigInteger('MasterAsetDeletedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MasterAset');
    }
};
