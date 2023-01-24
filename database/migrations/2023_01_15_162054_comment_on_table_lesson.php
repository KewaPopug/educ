<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableLesson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lesson', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE lesson IS 'Таблица уроков'");
            DB::statement("COMMENT ON COLUMN public.lesson.id IS 'Индефикатор урока'");
            DB::statement("COMMENT ON COLUMN public.lesson.date IS 'Дата проведения урока'");
            DB::statement("COMMENT ON COLUMN public.lesson.time IS 'Время проведения урока'");
            DB::statement("COMMENT ON COLUMN public.lesson.description IS 'Описание урока'");
            DB::statement("COMMENT ON COLUMN public.lesson.text IS 'Текст урока'");
            DB::statement("COMMENT ON COLUMN public.lesson.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.lesson.updated_at IS 'Дата и время обновления записи'");
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lesson', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE lesson IS NULL");
            DB::statement("COMMENT ON COLUMN public.lesson.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.lesson.date IS NULL");
            DB::statement("COMMENT ON COLUMN public.lesson.time IS NULL");
            DB::statement("COMMENT ON COLUMN public.lesson.description IS NULL");
            DB::statement("COMMENT ON COLUMN public.lesson.text IS NULL");
            DB::statement("COMMENT ON COLUMN public.lesson.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.lesson.updated_at IS NULL");
        });
    }
}
