<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Updates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bagtags', function (Blueprint $table) {
            $table->integer('year')->default(2021);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('paid_2022')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bagtags', function (Blueprint $table) {
            $table->dropColumn('year');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('paid_2022');
        });
    }
}
