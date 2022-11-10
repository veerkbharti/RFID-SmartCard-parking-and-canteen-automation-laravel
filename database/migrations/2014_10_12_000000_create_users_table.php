<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('first_name');
            $table->text('last_name');
            $table->text('mobile');
            $table->text('email')->unique();
            $table->enum('gender', ['male','female','other']);
            $table->text('dob');
            $table->text('address');
            $table->text('city');
            $table->text('company');
            $table->text('job_title');
            $table->bigInteger('rfid')->unique();
            $table->enum('role', ['admin','employee','handler']);
            $table->boolean('status')->default(true);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
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
};
