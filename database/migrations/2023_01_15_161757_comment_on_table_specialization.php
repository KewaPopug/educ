
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableSpecialization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specialization', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE lesson IS 'Таблица записей уроков'");
            DB::statement("COMMENT ON COLUMN public.specialization.id IS 'Индефикатор специализации'");
            DB::statement("COMMENT ON COLUMN public.specialization.group_specialization_id IS 'Индефикатор группы специализации'");
            DB::statement("COMMENT ON COLUMN public.specialization.specialization_reduction IS 'Сокращение специализации'");
            DB::statement("COMMENT ON COLUMN public.specialization.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.specialization.updated_at IS 'Дата и время обновления записи'");
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
            DB::statement("COMMENT ON TABLE lesson IS NULL");
            DB::statement("COMMENT ON COLUMN public.specialization.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.specialization.group_specialization_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.specialization.specialization_reduction IS NULL");
            DB::statement("COMMENT ON COLUMN public.specialization.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.specialization.updated_at IS NULL");
        });
    }
}

