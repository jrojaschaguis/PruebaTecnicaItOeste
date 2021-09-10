<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('descripcion');
            $table->text('body');
            $table->timestamps();
        });

        Schema::create('users_config', function (Blueprint $table) {
            $table->double('tolerancia_amonestar',6,2)->default(10);  // Sí tolerancia_papelera o tolerancia_delete >= 10% tolerancia_amonestar
            $table->double('tolerancia_suspender',6,2)->default(20);  // Sí tolerancia_papelera o tolerancia_delete >= 20% tolerancia_suspender
            $table->BigInteger('cant_visitas')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_register')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_login')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_click')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_create')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_update')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_papelera')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_recuperar')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_delete')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_megustan')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_comentarios')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_notas')->default(0); // 0=Sin Peticiones
            $table->BigInteger('cant_chats')->default(0); // 0=Sin Peticiones
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); // Si tiene fecha fue Reciclado
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('posts');

        Schema::dropIfExists('users_config');
        Schema::dropIfExists('users');
    }
}
