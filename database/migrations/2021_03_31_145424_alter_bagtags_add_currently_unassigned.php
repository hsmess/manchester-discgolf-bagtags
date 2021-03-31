<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBagtagsAddCurrentlyUnassigned extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bagtags', function (Blueprint $table) {
            $table->boolean('currently_unassigned')->default(false);
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
            $table->dropColumn('curently_unassigned');
        });
    }
}
