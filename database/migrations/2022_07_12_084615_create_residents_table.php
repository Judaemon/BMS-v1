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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('suffix')->nullable();
            $table->date('birthday')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('gender')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('isVoter')->nullable()->boolval();
            // $table->string('alias')->nullable();

            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('spouse')->nullable();

            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone_no')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('house_no')->nullable();
            $table->string('prk_area')->nullable();

            $table->string('pag_ibig')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('sss')->nullable();
            $table->string('tin')->nullable();

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
        Schema::dropIfExists('residents');
    }
};
