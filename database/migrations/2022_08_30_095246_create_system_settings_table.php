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
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('barangay')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            
            // Depending on the situation there is "only one or the other" or "both" 
            // for province municipality
            // di ko sure hehe 
            // need toknow  for printing certificate
            $table->boolean('isprovince'); 
            $table->string('province_municipality')->nullable();
            $table->string('province_municipality_logo')->nullable();

            $table->string('city')->nullable();

            // contact information
            $table->string('barangay_phone')->nullable();
            $table->string('barangay_email')->nullable();

            // Socials
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();

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
        Schema::dropIfExists('system_settings');
    }
};
