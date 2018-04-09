<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForLineItemsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'for_line_items';

    /**
     * Run the migrations.
     * @table for_line_items
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('parameter', 50);
            $table->string('group', 10);
            $table->string('data_type', 45);
            $table->integer('sequence');
            $table->string('base_type', 100)->nullable()->default(null);
            $table->string('base', 45);
            $table->decimal('value', 10, 2);
            $table->dateTime('valid_from');
            $table->dateTime('valid_to');
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
