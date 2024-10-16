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
            $table->string('EmployeeName', 25)->nullable();
            $table->string('EmployeeAddress', 100)->nullable();
            $table->timestamp('EmployeeCreatedAt', 6)->nullable();
            $table->timestamp('EmployeeUpdatedAt')->nullable();
            $table->timestamp('EmployeeDeletedAt', 6)->nullable();
            $table->bigInteger('EmployeeCreatedBy')->nullable();
            $table->bigInteger('EmployeeUpdatedBy')->nullable();
            $table->bigInteger('EmployeeDeletedBy')->nullable();
            $table->bigInteger('EmployeePositionId')->nullable();
            $table->integer('EmployeeNumber')->nullable();
            $table->string('EmployeeEmail', 30)->nullable();
            $table->text('EmployeePhone')->nullable();
            $table->smallInteger('EmployeeGender')->nullable()->comment('1. MALE; 2. FEMALE');
            $table->text('EmployeeImagePath')->nullable();
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
