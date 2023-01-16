<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableDisciplineTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discipline_teacher', function (Blueprint $table) {
                DB::statement("COMMENT ON TABLE academic_performance IS 'Таблица дисциплин и привязанных к ней учителей'");
                DB::statement("COMMENT ON COLUMN public.discipline_teacher.id IS 'Индефикатор дисциплин'");
                DB::statement("COMMENT ON COLUMN public.discipline_teacher.user_id IS 'Индефикатор пользователя'");
                DB::statement("COMMENT ON COLUMN public.discipline_teacher.discipline_id IS 'Индификатор дисциплины'");
                DB::statement("COMMENT ON COLUMN public.discipline_teacher.discipline IS 'Название дисциплины'");
                DB::statement("COMMENT ON COLUMN public.discipline_teacher.created_at IS 'Дата и время создания записи'");
                DB::statement("COMMENT ON COLUMN public.discipline_teacher.updated_at IS 'Дата и время обновления записи'");
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
            DB::statement("COMMENT ON TABLE discipline_teacher IS NULL");
            DB::statement("COMMENT ON COLUMN public.discipline_teacher.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.discipline_teacher.user_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.discipline_teacher.discipline_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.discipline_teacher.discipline IS NULL");
            DB::statement("COMMENT ON COLUMN public.discipline_teacher.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.discipline_teacher.updated_at IS NULL");
        });
    }
}
