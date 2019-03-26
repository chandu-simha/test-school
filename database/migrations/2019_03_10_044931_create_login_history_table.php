<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('login_history')) {
            Schema::create('login_history', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('fkuserid', 50)->index();
                $table->foreign('fkuserid')->references('userid')->on('users');
                $table->string('session_id', 100)->nullable();
                $table->string('source')->nullable();
                $table->string('host')->nullable();
                $table->ipAddress('ip')->nullable();
                $table->text('agent')->nullable();
                $table->tinyInteger('status')->nullable();
                $table->integer('created')->unsigned();
                $table->integer('modified')->unsigned();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_history');
    }
}
