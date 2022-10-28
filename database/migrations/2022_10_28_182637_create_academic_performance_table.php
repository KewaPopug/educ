<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicPerformanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_performance', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->bigInteger('user_id');
            $table->integer('mark');
            $table->date('data');
            $table->integer('type_mark');
            $table->bigInteger('discipline_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_performance');
    }
}
