<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationeventTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'notificationevent';

    /**
     * Run the migrations.
     * @table notificationevent
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('event_id')->nullable()->default(null);
            $table->string('description', 100)->nullable()->default(null);
            $table->string('template_email')->nullable()->default(null);
            $table->string('template_sms', 100)->nullable()->default(null);
            $table->string('template_push', 100)->nullable()->default(null);
            $table->tinyInteger('active')->nullable()->default(null);
            $table->string('created_by', 45)->nullable()->default(null);
            $table->string('modified_by', 45)->nullable()->default(null);
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
