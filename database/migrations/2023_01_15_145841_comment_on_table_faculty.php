<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableFaculty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faculty', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE faculty IS 'Таблица факультетов'");
            DB::statement("COMMENT ON COLUMN public.faculty.id IS 'Индефикатор дисциплин'");
            DB::statement("COMMENT ON COLUMN public.faculty.name_faculty IS 'Название факультета'");
            DB::statement("COMMENT ON COLUMN public.faculty.faculty_reduction IS 'Сокращение факультета'");
            DB::statement("COMMENT ON COLUMN public.faculty.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.faculty.updated_at IS 'Дата и время обновления записи'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faculty', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE faculty IS NULL");
            DB::statement("COMMENT ON COLUMN public.faculty.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.faculty.name_faculty IS NULL");
            DB::statement("COMMENT ON COLUMN public.faculty.faculty_reduction IS NULL");
            DB::statement("COMMENT ON COLUMN public.faculty.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.faculty.updated_at IS NULL");
        });
    }
}
