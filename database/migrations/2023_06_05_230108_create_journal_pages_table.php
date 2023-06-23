<?php

use App\Models\SportLevel;
use App\Models\User;
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
        Schema::create('journal_pages', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(SportLevel::class);
            $table->string('main_focus');
            $table->string('meal_1');
            $table->string('meal_2');
            $table->string('meal_3');
            $table->boolean('work_on_side_project');
            $table->boolean('video_games');
            $table->boolean('meditation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_pages');
    }
};
