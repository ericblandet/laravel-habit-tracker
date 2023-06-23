<?php

use App\Models\SportLevel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sport_levels', function (Blueprint $table) {
            $table->id();
            $table->string('id_for_human')->unique();
            $table->string('tk_name');
            $table->timestamps();
        });

        SportLevel::create([
            'id_for_human' => 'none', 'tk_name' => 'none'
        ]);
        SportLevel::create([
            'id_for_human' => 'minimal', 'tk_name' => 'minimal'
        ]);
        SportLevel::create([
            'id_for_human' => 'moderate', 'tk_name' => 'moderate'
        ]);
        SportLevel::create([
            'id_for_human' => 'intense', 'tk_name' => 'intense'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sport_levels');
    }
};
