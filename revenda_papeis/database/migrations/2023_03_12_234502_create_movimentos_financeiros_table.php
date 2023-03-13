<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimentos_financeiros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->decimal('valor', 10, 2);
            $table->string('tipo');
            $table->bigInteger('empresa_id')->unsigned();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentos_financeiros');
    }
};
