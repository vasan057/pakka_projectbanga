<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderSequencesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'order_sequences';

    /**
     * Run the migrations.
     * @table order_sequences
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('order_sequence')->nullable()->default(null);
            $table->bigInteger('next_order_sequence')->nullable()->default(null);
            $table->bigInteger('offer_sequence')->nullable()->default(null);
            $table->bigInteger('next_offer_sequence')->nullable()->default(null);
            $table->bigInteger('offerorder_sequence')->nullable()->default(null);
            $table->bigInteger('next_offerorder_sequence')->nullable()->default(null);
            $table->nullableTimestamps();
            $table->softDeletes();
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
