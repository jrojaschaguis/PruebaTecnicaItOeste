<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidades_paises', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('cod_pai');
            $table->string('name_pais',100);
            $table->string('sigla_pais',2);
            $table->BigInteger('user_create_id')->default(0); // 0=Ninguno
            $table->BigInteger('user_update_id')->default(0); // 0=Ninguno
            $table->BigInteger('user_delete_id')->default(0); // 0=Ninguno
            $table->BigInteger('user_recuperar_id')->default(0); // 0=Ninguno
            $table->timestamps();
            $table->softDeletes(); // Si tiene fecha fue Eliminado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidades_paises');
    }
}
