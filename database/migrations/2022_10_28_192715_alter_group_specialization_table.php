<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGroupSpecializationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_specialization', function (Blueprint $table) {
            $table->foreign('faculty_id')->references('id')->on('faculties')
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
        Schema::table('group_specialization', function (Blueprint $table) {
            $table->dropForeign('group_specialization_faculty_id_foreign');
        });
    }
}
