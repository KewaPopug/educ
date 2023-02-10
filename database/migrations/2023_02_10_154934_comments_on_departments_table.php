<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentsOnDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('department', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE department IS 'Таблица кафедр'");
            DB::statement("COMMENT ON COLUMN public.department.faculty_id IS 'Индефикатор факультета'");
            DB::statement("COMMENT ON COLUMN public.department.name_department IS 'Имя кафедры'");
            DB::statement("COMMENT ON COLUMN public.department.short_name IS 'Короткое имя кафедры'");
            DB::statement("COMMENT ON COLUMN public.department.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.department.updated_at IS 'Дата и время обновления записи'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE department IS NULL");
            DB::statement("COMMENT ON COLUMN public.department.faculty_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.department.name_department IS NULL");
            DB::statement("COMMENT ON COLUMN public.department.short_name IS NULL");
            DB::statement("COMMENT ON COLUMN public.department.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.department.updated_at IS NULL");
        });
    }
}
