<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("telefone")->nullable();
            $table->string("email")->unique()->nullable();
            $table->unsignedBigInteger("id_pessoa");
            $table->foreign("id_pessoa","fk_pessoa_contacto")->references("id")->on("pessoas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactos');
    }
}
