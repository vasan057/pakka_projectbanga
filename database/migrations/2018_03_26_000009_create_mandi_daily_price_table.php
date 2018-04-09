<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMandiDailyPriceTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'mandi_daily_price';

    /**
     * Run the migrations.
     * @table mandi_daily_price
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('mandi_id')->nullable();
            $table->integer('save_min')->nullable();
            $table->float('save_max')->nullable();
            $table->float('save_qty')->nullable();
            $table->float('min')->nullable();
            $table->float('max')->nullable();
            $table->tinyInteger('isFrozen')->nullable();
            $table->string('Status', 10)->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('created_by')->nullable();
            $table->date('date')->nullable();
            $table->float('quantity')->nullable();
            $table->tinyInteger('isSubmit')->default('0');
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
       Schema::dropIfExists($this->set_schema_table);
     }
}
