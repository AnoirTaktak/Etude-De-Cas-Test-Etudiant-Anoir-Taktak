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
        Schema::create('spectacles', function (Blueprint $table) {
             // Colonne idpiece avec clé étrangère
             $table->foreignId('idpiece')->constrained('pieces')->onDelete('cascade');

             // Colonne datespectacle
             $table->date('datespectacle');

             // Colonne idsalle avec clé étrangère
             $table->foreignId('idsalle')->constrained('salles')->onDelete('cascade');

             // Ajout des horodatages
             $table->timestamps();

             // Définir la clé primaire composite
             $table->primary(['idpiece', 'datespectacle']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spectacles');
    }
};
