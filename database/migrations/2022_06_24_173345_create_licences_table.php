<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->uuid('LicenseKey')->nullable();
            $table->string('ProductID');
            $table->foreignId('product_id')->nullable();
            $table->integer('Status')->default(1);
            $table->string('PartnerID');
            $table->foreignId('partner_id')->nullable();
            $table->string('MasterCode')->nullable();
            $table->string('UserID')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamp('ExpirationDate')->nullable();
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
        Schema::dropIfExists('licences');
    }
}
