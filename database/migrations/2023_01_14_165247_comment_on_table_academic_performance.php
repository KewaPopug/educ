<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableAcademicPerformance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academic_performance', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE academic_performance IS 'Таблица для записи успеваемости учеников'");
            DB::statement("COMMENT ON COLUMN public.academic_performance.id IS 'Индефикатор урока'");
            DB::statement("COMMENT ON COLUMN public.academic_performance.user_id IS 'Индефикатор пользователя'");
            DB::statement("COMMENT ON COLUMN public.academic_performance.mark IS 'Оценка по предмету'");
            DB::statement("COMMENT ON COLUMN public.academic_performance.data IS 'Дата проведения урока'");
            DB::statement("COMMENT ON COLUMN public.academic_performance.type_mark IS 'Тип оценки'");
            DB::statement("COMMENT ON COLUMN public.academic_performance.discipline_id IS 'Индификатор дисциплины'");
            DB::statement("COMMENT ON COLUMN public.academic_performance.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.academic_performance.updated_at IS 'Дата и время обновления записи'");
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
            DB::statement("COMMENT ON TABLE academic_performance IS NULL");
            DB::statement("COMMENT ON COLUMN public.academic_performance.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.academic_performance.user_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.academic_performance.mark IS NULL");
            DB::statement("COMMENT ON COLUMN public.academic_performance.data IS NULL");
            DB::statement("COMMENT ON COLUMN public.academic_performance.type_mark IS NULL");
            DB::statement("COMMENT ON COLUMN public.academic_performance.discipline_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.academic_performance.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.academic_performance.updated_at IS NULL");
        });
    }
}
