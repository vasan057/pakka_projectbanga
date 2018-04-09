<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMandiCeilingPriceDailyHistoryTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'mandi_ceiling_price_daily_history';

    /**
     * Run the migrations.
     * @table mandi_ceiling_price_daily_history
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('mandi_name')->nullable();
            $table->decimal('ceiling_price',10,2)->nullable();
            $table->string('avg_buying',10,2)->nullable();
            $table->string('modal',10,2)->nullable();
            $table->string('suggest',10,2)->nullable();
            $table->string('min_price',10,2)->nullable();
            $table->string('max_price',10,2)->nullable();
            $table->string('quantity',10,2)->nullable();
            $table->integer('mandi_daily_price_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
