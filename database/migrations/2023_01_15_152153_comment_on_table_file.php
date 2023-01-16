<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE file IS 'Таблица для хранения файлов'");
            DB::statement("COMMENT ON COLUMN public.file.id IS 'Индефикатор таблицы файлов'");
            DB::statement("COMMENT ON COLUMN public.file.lesson_id IS 'Индефикатор урока'");
            DB::statement("COMMENT ON COLUMN public.file.file IS 'Название файла'");
            DB::statement("COMMENT ON COLUMN public.file.type IS 'Тип файла'");
            DB::statement("COMMENT ON COLUMN public.file.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.file.updated_at IS 'Дата и время обновления записи'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE file IS NULL");
            DB::statement("COMMENT ON COLUMN public.file.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.file.lesson_id IS NULL");
            DB::statement("COMMENT ON COLUMN public.file.file IS NULL");
            DB::statement("COMMENT ON COLUMN public.file.type IS NULL");
            DB::statement("COMMENT ON COLUMN public.file.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.file.updated_at IS NULL");
        });
    }
}
