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
            $table->bigIncrements('BookingId');
            $table->bigInteger('BookingAsetId')->nullable();
            $table->integer('BookingEmployeeId')->nullable();
            $table->string('BookingCode', 15)->nullable();
            $table->smallInteger('BookingUsed')->nullable();
            $table->timestamp('BookingStart')->nullable();
            $table->timestamp('BookingEnd')->nullable();
            $table->smallInteger('BookingStatus')->nullable();
            $table->text('BookingRemark')->nullable();
            $table->text('BookingReasonReject')->nullable();
            $table->timestamp('BookingExpiredAt')->nullable();
            $table->timestamp('BookingCreatedAt')->nullable();
            $table->timestamp('BookingUpdatedAt')->nullable();
            $table->timestamp('BookingDeletedAt')->nullable();
            $table->bigInteger('BookingCreatedBy')->nullable();
            $table->bigInteger('BookingDeletedBy')->nullable();
            $table->bigInteger('BookingUpdatedBy')->nullable();
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
