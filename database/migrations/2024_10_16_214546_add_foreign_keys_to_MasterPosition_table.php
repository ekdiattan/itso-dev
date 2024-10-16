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
        Schema::table('MasterPosition', function (Blueprint $table) {
            $table->foreign(['MasterPositionUnitId'], 'MasterPosition_MasterPositionUnitId_fkey')->references(['MasterUnitId'])->on('MasterUnit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('MasterPosition', function (Blueprint $table) {
            $table->dropForeign('MasterPosition_MasterPositionUnitId_fkey');
        });
    }
};
