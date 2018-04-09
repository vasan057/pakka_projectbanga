<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'destinations';

    /**
     * Run the migrations.
     * @table destinations
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('delivery_type', 45)->nullable();
            $table->string('delivery_name', 200)->nullable();
            $table->string('short_name', 100)->nullable();
            $table->string('address_1', 455)->nullable();
            $table->string('address_2', 455)->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('district', 200)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('mobile_1', 45)->nullable();
            $table->string('mobile_2', 45)->nullable();
            $table->string('email_1', 45)->nullable();
            $table->string('email_2', 45)->nullable();
            $table->string('gstin', 45)->nullable();
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
