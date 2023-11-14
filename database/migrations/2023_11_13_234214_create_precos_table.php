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
        Schema::create('precos', function (Blueprint $table) {
            $table->unsignedBigInteger('fornecedor_id');
            $table->unsignedBigInteger('material_id');
            $table->float('preco_m3');
            $table->primary(['fornecedor_id', 'material_id']);
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precos');
    }
};
