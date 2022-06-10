<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('partner_type_id')->nullable();
            $table->bigInteger('identification_number')->unique();
            $table->bigInteger('phone_number')->nullable()->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
        Schema::table('partners', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
