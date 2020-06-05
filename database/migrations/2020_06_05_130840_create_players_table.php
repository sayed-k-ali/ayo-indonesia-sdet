<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('player_id');
            $table->string('player_name');
            $table->decimal('player_tall');
            $table->decimal('player_weight');
            $table->enum('player_role', 
                array(
                    'penyerang',
                    'gelandang',
                    'bertahan',
                    'penjaga gawang'
                )
            );
            $table->integer('player_back_num');
            $table->bigInteger('player_team_id');
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
        Schema::dropIfExists('players');
    }
}
