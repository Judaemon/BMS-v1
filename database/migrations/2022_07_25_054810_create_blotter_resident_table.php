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
        Schema::create('blotter_resident', function (Blueprint $table) {
            $table->foreignId('blotter_id')->constrained()->onDelete('cascade');
            $table->foreignId('resident_id')->constrained();
            $table->string('role');
            $table->longText('narrative')->nullable();
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
        Schema::dropIfExists('blotter_resident');
    }
};
