<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('parcelles', function (Blueprint $table) {
            // Ajout clé étrangère vers personnes
            $table->unsignedBigInteger('personne_id')->nullable()->after('coordonnees_xy');
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
        });

        Schema::table('auto_bats', function (Blueprint $table) {
            // Ajout clé étrangère vers parcelles
            $table->unsignedBigInteger('parcelle_id')->nullable()->after('coordonnees_xy');
            $table->foreign('parcelle_id')->references('id')->on('parcelles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('parcelles', function (Blueprint $table) {
            $table->dropForeign(['personne_id']);
            $table->dropColumn('personne_id');
        });

        Schema::table('auto_bats', function (Blueprint $table) {
            $table->dropForeign(['parcelle_id']);
            $table->dropColumn('parcelle_id');
        });
    }
};
