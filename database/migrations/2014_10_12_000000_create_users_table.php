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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar',500)->default('avatar.jpg');
            $table->string('phone',20);
            $table->boolean('status')->default(true);
            $table->integer('id_school')->unsigned()->nullable();
            $table->foreign('id_school')->references('id')->on('schools')->onDelete('set null');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->text('about')->nullable();
            $table->string('activation_code')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
