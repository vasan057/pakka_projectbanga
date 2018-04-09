<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleMappingsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'role_mappings';

    /**
     * Run the migrations.
     * @table role_mappings
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('role_id')->nullable()->default(null);
            $table->string('menu', 100)->nullable()->default(null);
            $table->enum('device_type', ['M', 'W'])->default('W');
            $table->string('parent_menu', 100)->nullable()->default(null);
            $table->string('links')->nullable()->default(null);
            $table->string('views', 100)->nullable()->default(null);
            $table->string('middleware', 100)->nullable()->default(null);
            $table->tinyInteger('is_active')->default('1');
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
