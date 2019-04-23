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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('mobile')->unique();
            $table->string('uid');
            $table->string('email')->unique()->nullable();
            $table->integer('profession_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->string('education')->nullable();
            $table->enum('account_status', ["Approved","Rejected","Pending"])->default("Pending");
            $table->enum('profile_status', ["Updated","Pending"])->default("Pending");
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
