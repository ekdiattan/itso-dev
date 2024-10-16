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
        Schema::create('Booking', function (Blueprint $table) {
            $table->increments('BookingId');
            $table->smallInteger('BookingStatus')->nullable();
            $table->bigInteger('BookingAsetId')->nullable();
            $table->text('BookingRemark')->nullable();
            $table->timestamp('BookingCreatedAt', 6)->nullable();
            $table->timestamp('BookingUpdatedAt')->nullable();
            $table->timestamp('BookingDeletedAt', 6)->nullable();
            $table->smallInteger('BookingCreatedBy')->nullable();
            $table->smallInteger('BookingDeletedBy')->nullable();
            $table->smallInteger('BookingUpdatedBy')->nullable();
            $table->string('BookingCode', 15)->nullable();
            $table->date('BookingStart')->nullable();
            $table->date('BookingEnd')->nullable();
            $table->smallInteger('BookingApprovalStatus')->nullable();
            $table->text('BookingApprovalRemark')->nullable();
            $table->timestamp('BookingExpired', 6)->nullable();
            $table->integer('BookingEmployeeId')->nullable();
            $table->smallInteger('BookingUsed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Booking');
    }
};
