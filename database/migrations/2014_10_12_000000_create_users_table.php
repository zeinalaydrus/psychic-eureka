<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 25);
            $table->text('foto')->nullable();
            $table->char('nis', 20)->nullable();
            $table->string('fullname', 125);
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('kelas', 50)->nullable();
            $table->string('alamat', 225)->nullable();
            $table->enum('verif', ['terverifikasi', 'belum terverif']);
            $table->enum('role', ['user', 'admin']);
            $table->date('join_date')->nullable();
            $table->date('terakhir_login')->nullable();
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
