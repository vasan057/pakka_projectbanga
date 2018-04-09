<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMandisTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'mandis';

    /**
     * Run the migrations.
     * @table mandis
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('mandi_name', 100);
            $table->integer('agmark_market_id')->nullable()->default(null);
            $table->integer('location_id')->nullable();
            $table->integer('destination_id')->nullable();
            $table->string('short_name', 45);
            $table->string('address_1', 200);
            $table->string('address_2', 200)->nullable();
            $table->integer('pincode');
            $table->string('city', 50);
            $table->string('district', 50);
            $table->string('state', 50);
            $table->integer('user_id')->nullable()->default(null);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
