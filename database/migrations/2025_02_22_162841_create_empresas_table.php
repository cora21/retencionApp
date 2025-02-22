<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
    Schema::create('empresas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla users
        $table->string('nombre_comercial');
        $table->string('direccionEmpresa');
        $table->string('telefonoEmpresa');
        $table->text('descripcionEmpresa')->nullable();
        $table->string('rif_cedulaEmpresa');
        $table->string('correoEmpresa');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
