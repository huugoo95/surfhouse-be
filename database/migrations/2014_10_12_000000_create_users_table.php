<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('wetsuit_size')->nullable();
            $table->unsignedBigInteger('surfboard_id')->nullable();
            $table->unsignedBigInteger('surfing_level_id')->nullable();       
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('rol_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('rol_id')->references('id')->on('rols');
            $table->foreign('surfing_level_id')->references('id')->on('surfing_levels');
            $table->foreign('surfboard_id')->references('id')->on('surfboards');
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
