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
            $table->string('mobile')->nullable()->unique();
            $table->string('uid')->nullable()->unique();
            
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->string('dob')->default("01-01-1990");
            $table->enum('gender', ["Male", "Female"])->default("Male");

            $table->integer("school_id")->default(1);

            $table->string('avatar')->default("users/default.png");
            $table->string('education')->nullable();
            $table->enum('account_status', ["Approved","Rejected","Pending"])->default("Pending");
            $table->boolean('status')->default(false);
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
