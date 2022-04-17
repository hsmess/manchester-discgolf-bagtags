<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMWO2STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_w_o2_s', function (Blueprint $table) {
            $table->id();
            $table->integer('tournament_entry_id');
            $table->boolean('is_vip');
            $table->integer('total_price');
            $table->boolean('transport_needed');
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
        Schema::dropIfExists('m_w_o2_s');
    }
}
