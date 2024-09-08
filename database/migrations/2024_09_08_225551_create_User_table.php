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
        Schema::create('User', function (Blueprint $table) {
            $table->bigIncrements('UserId');
            $table->text('name')->nullable();
            $table->text('password')->nullable();
            $table->timestamp('UserCreatedAt')->nullable();
            $table->timestamp('UserUpdatedAt')->nullable();
            $table->timestamp('UserDeletedAt')->nullable();
            $table->bigInteger('UserCreatedBy')->nullable();
            $table->bigInteger('UserUpdatedBy')->nullable();
            $table->bigInteger('UserDeletedBy')->nullable();
            $table->bigInteger('UserEmployeeId')->nullable();
            $table->bigInteger('UserRoleId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User');
    }
};
