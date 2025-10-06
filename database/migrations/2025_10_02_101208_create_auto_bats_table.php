<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('auto_bats', function (Blueprint $table) {
            $table->id();
            $table->string('numero_batiment')->unique();
            $table->string('type')->nullable(); // maison, immeuble, bureau...
            $table->decimal('surface', 10, 2)->nullable(); // en m²
            $table->string('usage')->nullable(); // résidentiel, commercial, mixte...
            $table->string('adresse')->nullable();
            $table->string('coordonnees_xy')->
                nullable(); // stocker comme texte (JSON ou WKT)
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('auto_bats');
    }
};


