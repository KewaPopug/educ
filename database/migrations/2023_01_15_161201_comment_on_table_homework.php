<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableHomework extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homework', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE homework IS 'Таблица записей домашних заданий'");
            DB::statement("COMMENT ON COLUMN public.homework.id IS 'Индефикатор записи домашнего задания'");
            DB::statement("COMMENT ON COLUMN public.homework.lesson_id IS 'Индефикатор урока'");
            DB::statement("COMMENT ON COLUMN public.homework.description IS 'Описание домашнего задания'");
            DB::statement("COMMENT ON COLUMN public.homework.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.homework.updated_at IS 'Дата и время обновления записи'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homework', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE homework IS NULL");
            DB::statement("COMMENT ON COLUMN public.homework.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.homework.lesson_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.homework.description IS NULL");
            DB::statement("COMMENT ON COLUMN public.homework.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.homework.updated_at IS NULL");
        });
    }
}
