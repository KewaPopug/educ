<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableGroupSpecialization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_specialization', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE group_specialization IS 'Таблица специализаций'");
            DB::statement("COMMENT ON COLUMN public.group_specialization.id IS 'Индефикатор группы специализации'");
            DB::statement("COMMENT ON COLUMN public.group_specialization.faculty_id IS 'Индефикатор факультета'");
            DB::statement("COMMENT ON COLUMN public.group_specialization.name_group_specialization IS 'Имя специализации'");
            DB::statement("COMMENT ON COLUMN public.group_specialization.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.group_specialization.updated_at IS 'Дата и время обновления записи'");
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
            DB::statement("COMMENT ON TABLE group_specialization IS NULL");
            DB::statement("COMMENT ON COLUMN public.group_specialization.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.group_specialization.faculty_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.group_specialization.name_group_specialization IS NULL");
            DB::statement("COMMENT ON COLUMN public.group_specialization.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.group_specialization.updated_at IS NULL");
        });
    }
}
