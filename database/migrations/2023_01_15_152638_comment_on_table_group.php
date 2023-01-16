<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group', function (Blueprint $table) {
//            DB::statement("COMMENT ON TABLE group IS 'Таблица групп'");
            DB::statement("COMMENT ON COLUMN public.group.id IS 'Индефикатор группы'");
            DB::statement("COMMENT ON COLUMN public.group.specialization_id IS 'Индефикатор специализации'");
            DB::statement("COMMENT ON COLUMN public.group.group_id IS 'Индефикатор группы'");
            DB::statement("COMMENT ON COLUMN public.group.language IS 'Язык обучения'");
            DB::statement("COMMENT ON COLUMN public.group.year_of_admission IS 'Год поступления'");
            DB::statement("COMMENT ON COLUMN public.group.year_of_issue IS 'Год выпуска'");
            DB::statement("COMMENT ON COLUMN public.group.name_group IS 'Название группы'");
            DB::statement("COMMENT ON COLUMN public.group.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.group.updated_at IS 'Дата и время обновления записи'");
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
//            DB::statement("COMMENT ON TABLE group IS NULL");
            DB::statement("COMMENT ON COLUMN public.group.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.group.specialization_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.group.group_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.group.language IS NULL");
            DB::statement("COMMENT ON COLUMN public.group.year_of_admission IS NULL");
            DB::statement("COMMENT ON COLUMN public.group.year_of_issue IS NULL");
            DB::statement("COMMENT ON COLUMN public.group.name_group IS NULL");
            DB::statement("COMMENT ON COLUMN public.group.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.group.updated_at IS NULL");
        });
    }
}
