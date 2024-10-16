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
        Schema::table('Booking', function (Blueprint $table) {
            $table->foreign(['BookingAsetId'], 'Booking_BookingAsetId_fkey')->references(['MasterAsetId'])->on('MasterAset');
            $table->foreign(['BookingEmployeeId'], 'Booking_BookingEmployeeId_fkey')->references(['EmployeeId'])->on('Employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Booking', function (Blueprint $table) {
            $table->dropForeign('Booking_BookingAsetId_fkey');
            $table->dropForeign('Booking_BookingEmployeeId_fkey');
        });
    }
};
