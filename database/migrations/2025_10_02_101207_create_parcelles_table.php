<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('parcelles', function (Blueprint $table) {
            $table->id();
            $table->string('numero_police')->unique(); // Numéro Police/SU
            $table->decimal('superficie', 10, 2)->nullable(); // en m² ou ha
            $table->string('ville')->nullable();
            $table->string('lotissement')->nullable();
            $table->string('coordonnees_xy')->nullable(); // stocker comme texte (JSON ou WKT)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parcelles');
    }
};
