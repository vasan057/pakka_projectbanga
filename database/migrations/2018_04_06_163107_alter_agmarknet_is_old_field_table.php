<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAgmarknetIsOldFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agmarknet', function (Blueprint $table) {
            $table->boolean('is_old')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agmarknet', function (Blueprint $table) {
            $table->dropColumn('is_old');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
    }
}

