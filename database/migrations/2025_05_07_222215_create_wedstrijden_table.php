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
        Schema::create('wedstrijden', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thuis_team_id')->nullable()->constrained('teams')->onDelete('cascade');
            $table->foreignId('uit_team_id')->nullable()->constrained('teams')->onDelete('cascade');
            $table->dateTime('datum');
            $table->string('locatie')->nullable();
            $table->string('status')->default('Gepland');
            $table->unsignedTinyInteger('thuis_score')->nullable();
            $table->unsignedTinyInteger('uit_score')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedstrijden');
    }
};
