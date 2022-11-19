<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    //Добавить null ко всем полям ...->nullable(false)
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->enum('role', ['student', 'teacher', 'admin', 'superadmin']);
            $table->string('secondname')->nullable(true);
            $table->string('firstname')->nullable(true);
            $table->string('middlename')->nullable(true);
            $table->string('email')->unique();
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
