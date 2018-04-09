<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersBasicTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'users_basic';

    /**
     * Run the migrations.
     * @table users_basic
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('user_id', 45);
            $table->string('password', 200)->nullable()->default(null);
            $table->string('mobile_1', 45);
            $table->string('mobile_2', 45)->nullable()->default(null);
            $table->string('address_1', 45)->nullable()->default(null);
            $table->string('address_2', 45)->nullable()->default(null);
            $table->string('pincode', 45)->nullable()->default(null);
            $table->string('fcm_token')->nullable()->default(null);
            $table->string('gstin', 45)->nullable()->default(null);
            $table->integer('roles_id')->nullable()->default(null);
            $table->string('email_1', 45)->nullable()->default(null);
            $table->string('email_2', 45)->nullable()->default(null);
            $table->string('active', 10)->nullable()->default(null);
            $table->integer('created_by')->nullable()->default(null);
            $table->integer('updated_by')->nullable()->default(null);
            $table->string('remember_token', 200)->nullable()->default(null);
            $table->string('roles', 50)->nullable()->default(null);
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
