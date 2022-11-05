<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSpecializationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specialization', function (Blueprint $table) {
            $table->foreign('group_specialization_id')
                ->references('id')->on('group_specialization')
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
        Schema::table('specialization', function (Blueprint $table) {
            $table->dropForeign('specialization_group_specialization_id_foreign');
        });
    }
}
