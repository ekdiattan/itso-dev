<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        $sqlFile = base_path('database/sql/Module.sql');
        $sql = File::get($sqlFile);
        DB::unprepared($sql);
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        try {
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new \RuntimeException($e->getMessage());
        }
    }
};
