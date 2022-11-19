<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group', function (Blueprint $table) {
            $table->foreign('specialization_id')->references('id')->on('specialization')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('group_id')->references('group_id')->on('student_group')
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
        Schema::table('group', function (Blueprint $table) {
            $table->dropForeign('group_group_id_foreign');
            $table->dropForeign('group_specialization_id_foreign');
        });
    }
}
