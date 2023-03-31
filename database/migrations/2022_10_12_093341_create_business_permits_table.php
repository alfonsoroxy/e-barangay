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
        Schema::create('business_permits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('businessPermitFname');
            $table->string('businessPermitLname');
            $table->string('businessPermitMname')->nullable();
            $table->string('businessPermitSuffix')->nullable();

            $table->string('businessPermitHousenumber');
            $table->enum('businessPermitStreetname', [
                'Bambang Cor Masangkay St', 'G Masangkay St', 'Mayhaligue St'
            ]);

            $table->string('businessPermitBusinessname');
            $table->date('businessPermitBusinessYearEstablish')->format('Y');

            $table->string('businessPermitImage')->nullable();

            $table->enum('businessPermitStatus', [
                'pending', 'approved', 'denied', 'processed', 'claimed', 'canceled'
            ])->default('pending');
            $table->date('businessPermitApproveddate')->nullable();
            $table->date('businessPermitDenieddate')->nullable();
            $table->date('businessPermitProcesseddate')->nullable();
            $table->date('businessPermitClaimdate')->nullable();
            $table->date('businessPermitCanceleddate')->nullable();

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
        Schema::dropIfExists('business_permits');
    }
};
