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
        Schema::create('Employee', function (Blueprint $table) {
            $table->bigIncrements('EmployeeId');
            $table->bigInteger('EmployeePositionId')->nullable();
            $table->string('EmployeeName', 25)->nullable();
            $table->text('EmployeeAddress')->nullable();
            $table->integer('EmployeeNumber')->nullable();
            $table->smallInteger('EmployeeGender')->nullable()->comment('1. MALE; 2. FEMALE');
            $table->string('EmployeePhone', 20)->nullable();
            $table->string('EmployeeEmail', 30)->nullable();
            $table->smallInteger('EmployeeStatus')->nullable();
            $table->text('EmployeeImagePath')->nullable();
            $table->timestamp('EmployeeCreatedAt')->nullable();
            $table->timestamp('EmployeeUpdatedAt')->nullable();
            $table->timestamp('EmployeeDeletedAt')->nullable();
            $table->bigInteger('EmployeeCreatedBy')->nullable();
            $table->bigInteger('EmployeeUpdatedBy')->nullable();
            $table->bigInteger('EmployeeDeletedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Employee');
    }
};
