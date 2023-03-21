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
        Schema::create('clearances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('clearanceFname');
            $table->string('clearanceLname');
            $table->string('clearanceMname')->nullable();
            $table->string('clearanceSuffix')->nullable();

            $table->string('clearanceHousenumber');
            $table->enum('clearanceStreetname', [
                'Bambang Cor Masangkay St', 'G. Masangkay St', 'Mayhaligue St'
            ]);

            $table->string('clearanceImage')->nullable();

            $table->enum('clearanceGender', ['Female', 'Male']);
            $table->enum('clearanceMaritalstatus', ['Single', 'Married', 'Divorced', 'Separated', 'Widowed']);
            $table->string('clearanceNationality');

            $table->enum('clearanceStatus', [
                'pending', 'approved', 'denied', 'processed', 'claimed', 'canceled'
            ])->default('pending');
            $table->date('clearanceApproveddate')->nullable();
            $table->date('clearanceDenieddate')->nullable();
            $table->date('clearanceProcesseddate')->nullable();
            $table->date('clearanceClaimdate')->nullable();
            $table->date('clearanceCanceleddate')->nullable();

            $table->timestamps();

            //Get the Scheme ForeignID of 'table_name' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clearances');
    }
};
