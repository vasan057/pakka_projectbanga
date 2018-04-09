<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgmarknetTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'agmarknet';

    /**
     * Run the migrations.
     * @table agmarknet
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('mandi_id')->nullable()->default(null);
            $table->integer('agmark_master_id')->nullable()->default(null);
            $table->string('state_name', 100)->nullable()->default(null);
            $table->string('district_name', 100)->nullable()->default(null);
            $table->string('market_center_name', 100)->nullable()->default(null);
            $table->string('variety', 100)->nullable()->default(null);
            $table->string('group_name', 100)->nullable()->default(null);
            $table->string('arrival', 100)->nullable()->default(null);
            $table->float('ag_min')->nullable()->default(null);
            $table->float('ag_max')->nullable()->default(null);
            $table->string('modal', 100)->nullable()->default(null);
            $table->date('date_arrival')->nullable()->default(null);
            $table->string('commodity')->nullable()->default(null);
            $table->string('grade', 20)->nullable()->default(null);
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
