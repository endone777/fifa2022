<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_1')->constrained('users');
            $table->foreignId('team_2')->constrained('users');
            $table->integer('score_team_1')->nullable();
            $table->integer('score_team_2')->nullable();
            $table->float('elo_team_1')->nullable();
            $table->float('elo_team_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
