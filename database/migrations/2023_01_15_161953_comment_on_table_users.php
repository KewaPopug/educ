
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentOnTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE users IS 'Таблица пользователей'");
            DB::statement("COMMENT ON COLUMN public.users.id IS 'Индефикатор пользователя'");
            DB::statement("COMMENT ON COLUMN public.users.role IS 'Роль пользователя'");
            DB::statement("COMMENT ON COLUMN public.users.secondname IS 'Фамилия пользователя'");
            DB::statement("COMMENT ON COLUMN public.users.firstname IS 'Имя пользователя'");
            DB::statement("COMMENT ON COLUMN public.users.middlename IS 'Отчество пользователя'");
            DB::statement("COMMENT ON COLUMN public.users.email IS 'email пользователя'");
            DB::statement("COMMENT ON COLUMN public.users.password IS 'пароль пользователя'");
            DB::statement("COMMENT ON COLUMN public.users.remember_token IS 'токен пользователя'");

            DB::statement("COMMENT ON COLUMN public.users.created_at IS 'Дата и время создания записи'");
            DB::statement("COMMENT ON COLUMN public.users.updated_at IS 'Дата и время обновления записи'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            DB::statement("COMMENT ON TABLE users IS NULL");
            DB::statement("COMMENT ON COLUMN public.users.id IS NULL");
            DB::statement("COMMENT ON COLUMN public.users.role IS NULL");
            DB::statement("COMMENT ON COLUMN public.users.secondname IS NULL");
            DB::statement("COMMENT ON COLUMN public.users.firstname IS NULL");
            DB::statement("COMMENT ON COLUMN public.users.middlename IS NULL");
            DB::statement("COMMENT ON COLUMN public.users.email IS NULL");
            DB::statement("COMMENT ON COLUMN public.users.password IS NULL");
            DB::statement("COMMENT ON COLUMN public.users.remember_token IS NULL");

            DB::statement("COMMENT ON COLUMN public.users.created_at IS NULL");
            DB::statement("COMMENT ON COLUMN public.users.updated_at IS NULL");
        });
    }
}
