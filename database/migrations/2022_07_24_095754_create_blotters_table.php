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
        Schema::create('blotters', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable()->default('Ongoing');

            $table->string('incident_type')->nullable();
            $table->string('incident_location')->nullable();
            $table->dateTime('incident_date_time')->nullable();
            $table->dateTime('reported_date_time')->nullable();
            
            $table->dateTime('meeting_schedule_date_time')->nullable();            
            $table->longText('incident_narrative')->nullable();
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
        Schema::dropIfExists('blotters');
    }
};
