<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsQueueTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'notifications_queue';

    /**
     * Run the migrations.
     * @table notifications_queue
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('notification_id');
            $table->integer('user_id')->nullable()->default(null);
            $table->integer('mode')->nullable()->default(null);
            $table->string('actual_message')->nullable()->default(null);
            $table->string('sent_date_time', 45)->nullable()->default(null);
            $table->tinyInteger('processed')->nullable()->default(null);
            $table->dateTime('received_read')->nullable()->default(null);
            $table->tinyInteger('read')->nullable()->default(null);
            $table->string('mobile', 15)->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('status', 200)->nullable()->default(null);
            $table->string('fcm_token')->nullable()->default(null);
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
