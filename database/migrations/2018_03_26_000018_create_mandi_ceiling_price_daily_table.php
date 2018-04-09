<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMandiCeilingPriceDailyTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'mandi_ceiling_price_daily';

    /**
     * Run the migrations.
     * @table mandi_ceiling_price_daily
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
            $table->decimal('ceiling_price',10,2)->nullable();
            $table->integer('mandi_daily_price_id')->nullable()->default(null);
            $table->tinyInteger('notified')->default('0');
            $table->dateTime('notified_time')->nullable()->default(null);
            $table->date('date_key')->nullable();
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
