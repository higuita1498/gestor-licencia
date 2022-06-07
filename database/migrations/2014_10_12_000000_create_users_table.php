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
            $table->string('lastname')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->bigInteger('identification_number')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->bigInteger('postal_code')->nullable();
            $table->longText('biography')->nullable();
            $table->foreignId('role_id')->nullable();
            $table->foreignId('partner_id')->nullable();
            $table->foreignId('city_id')->nullable();
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
