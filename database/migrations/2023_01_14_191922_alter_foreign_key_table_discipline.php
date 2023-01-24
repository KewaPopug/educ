<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterForeignKeyTableDiscipline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discipline_teacher', function (Blueprint $table) {
            $table->foreign('discipline_id')->references('id')->on('discipline')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discipline_teacher', function (Blueprint $table) {
            $table->dropForeign('discipline_teacher_discipline_id_foreign');
        });
    }
}
