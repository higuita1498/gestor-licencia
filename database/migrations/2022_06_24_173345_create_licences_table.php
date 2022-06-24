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
            $table->timestamps();
            $table->string('LicenseKey');
            $table->integer('ProductID');
            $table->integer('product_id');
            $table->integer('Status');
            $table->string('PartnerID');
            $table->integer('partner_id');
            $table->string('MasterCode');
            $table->string('UserID');
            $table->integer('user_id');
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
