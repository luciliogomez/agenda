<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposPessoas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_pessoas', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("id_pessoa");
            $table->unsignedBigInteger("id_grupo");
            $table->foreign("id_pessoa","fk_grupo_pessoas_pessoa")->references("id")->on("pessoas")->onDelete("cascade");
            $table->foreign("id_grupo","fk_grupo_pessoas_grupo")->references("id")->on("grupos")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_pessoas');
    }
}
