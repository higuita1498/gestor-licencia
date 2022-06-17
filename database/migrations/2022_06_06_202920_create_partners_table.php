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
            $table->string('PartnerName')->unique();
            $table->string('PartnerEmail')->nullable();
            $table->string('Photo')->nullable();
            $table->boolean('PartnerStatus')->default(true);
            $table->foreignId('partner_type_id')->nullable();
            $table->string('PartnerContactName')->nullable();
            $table->bigInteger('PartnerContactNumber')->nullable()->unique();
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
