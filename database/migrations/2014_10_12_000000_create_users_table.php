<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->string('userid', 50);
                $table->primary('userid');
                //$table->integer('fk_school_id')->nullable();
                //$table->smallInteger('fk_role_id')->nullable()->comment('1:Admin, 2:School admin, 3:Teacher, 4:Student, 5:Parent');
                //$table->foreign('fk_role_id')->references('id')->on('roles');
                $table->string('username', 100)->unique();
                $table->string('password');
                $table->string('email')->unique();
                $table->bigInteger('mobile')->nullable();
                $table->string('first_name', 100)->nullable();
                $table->string('last_name', 100)->nullable();
                $table->string('usno', 100)->nullable();
                $table->char('gender', 1)->nullable();
                $table->date('dob')->nullable();
                $table->ipAddress('ip')->nullable();
                $table->string('profile_image')->nullable();
                $table->string('parent_mail')->nullable();
                $table->tinyInteger('status')->default(0);
                $table->timestamp('email_verified_at')->nullable();
                $table->rememberToken();
                $table->unsignedInteger('created')->nullable();
                $table->unsignedInteger('modified')->nullable();
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
        Schema::dropIfExists('users');
    }
}
