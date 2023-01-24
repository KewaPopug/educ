
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableStudentGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_group', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE student_group IS 'Таблица записей уроков'");
            DB::statement("COMMENT ON COLUMN public.student_group.id IS 'Индефикатор специализации'");
            DB::statement("COMMENT ON COLUMN public.student_group.user_id IS 'Индефикатор пользователя'");
            DB::statement("COMMENT ON COLUMN public.student_group.group_id IS 'Индефикатор группы'");
            DB::statement("COMMENT ON COLUMN public.student_group.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.student_group.updated_at IS 'Дата и время обновления записи'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_group', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE student_group IS NULL");
            DB::statement("COMMENT ON COLUMN public.student_group.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.student_group.user_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.student_group.group_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.student_group.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.student_group.updated_at IS NULL");
        });
    }
}
