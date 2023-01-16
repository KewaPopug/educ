<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableAcademicPerformance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academic_performance', function (Blueprint $table) {
            DB::statement('ALTER TABLE academic_performance RENAME COLUMN data to date ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('academic_performance', function (Blueprint $table) {
//            $table->renameColumn('date', 'data');
            DB::statement('ALTER TABLE academic_performance RENAME COLUMN date to data ');
        });
    }
}
