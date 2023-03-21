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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('certificateFname');
            $table->string('certificateLname');
            $table->string('certificateMname')->nullable();
            $table->string('certificateSuffix')->nullable();

            $table->string('certificateHousenumber');
            $table->enum('certificateStreetname', [
                'Bambang Cor Masangkay St', 'G. Masangkay St', 'Mayhaligue St'
            ]);

            $table->enum('certificatePurpose', [
                'Application for Employment', 'Hospital Purpose', 'Transaction with a Bank', 'Postal ID Requirement', 'Organized Vending',
                'Travel / Transfer of Resident', 'School Admission/Requirement', 'Processing of Calamity Loan',
                'Processing of SSS Loan', 'For Livelihood Loan', 'ID for Senior Citizen', 'Other'
            ]);

            $table->string('certificateOtherPurpose')->nullable();
            $table->string('certificateImage')->nullable();

            $table->enum('certificateStatus', [
                'pending', 'approved', 'denied', 'processed', 'claimed', 'canceled'
            ])->default('pending');
            $table->date('certificateApproveddate')->nullable();
            $table->date('certificateDenieddate')->nullable();
            $table->date('certificateProcesseddate')->nullable();
            $table->date('certificateClaimdate')->nullable();
            $table->date('certificateCanceleddate')->nullable();

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
        Schema::dropIfExists('certificates');
    }
};
