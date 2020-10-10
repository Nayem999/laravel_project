<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name',40)->nullable();
            $table->string('last_name',40)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('twitter',100)->nullable();
            $table->string('li',100)->nullable();
            $table->string('ig',100)->nullable();
            $table->string('upwork',100)->nullable();
            $table->string('fiverr',100)->nullable();
            $table->string('cover',100)->nullable();
            $table->string('image',100)->nullable();
            $table->string('birth',100)->nullable();
            $table->text('hobby')->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
