<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'orders';

    /**
     * Run the migrations.
     * @table orders
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('order_type', 10);
            $table->integer('order_number')->nullable()->default(null);
            $table->string('ref_num', 100);
            $table->integer('user_id');
            $table->integer('mandi_id');
            $table->integer('destination_id');
            $table->dateTime('order_date');
            $table->float('order_quantity');
            $table->float('order_price')->nullable()->default(null);
            $table->float('order_other_rate')->nullable()->default(null);
            $table->float('order_for_price')->nullable()->default(null);
            $table->float('order_total_price')->nullable()->default(null);
            $table->tinyInteger('status');
            $table->double('counter_price')->nullable()->default(null);
            $table->bigInteger('offer_number')->nullable()->default(null);
            $table->integer('approved_by')->nullable()->default(null);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable()->default(null);
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
