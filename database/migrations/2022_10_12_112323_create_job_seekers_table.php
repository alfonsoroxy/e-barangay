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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('jobSeekerFname');
            $table->string('jobSeekerLname');
            $table->string('jobSeekerMname')->nullable();
            $table->string('jobSeekerSuffix')->nullable();
            $table->string('jobSeekerHousenumber');
            $table->enum('jobSeekerStreetname', [
                'Bambang Cor Masangkay St', 'G. Masangkay St', 'Mayhaligue St'
            ]);

            $table->string('jobSeekerImage')->nullable();

            $table->string('jobSeekerNationality');
            $table->enum('jobSeekerGender', ['Female', 'Male']);
            $table->enum('jobSeekerMaritalstatus', ['Single', 'Married', 'Divorced', 'Separated', 'Widowed']);
            $table->date('jobSeekerAge');
            $table->date('jobSeekerResidentstayyears');

            $table->enum('jobSeekerStatus', [
                'pending', 'approved', 'denied', 'processed', 'claimed', 'canceled'
            ])->default('pending');
            $table->date('jobSeekerApproveddate')->nullable();
            $table->date('jobSeekerDenieddate')->nullable();
            $table->date('jobSeekerProcesseddate')->nullable();
            $table->date('jobSeekerClaimdate')->nullable();
            $table->date('jobSeekerCanceleddate')->nullable();

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
        Schema::dropIfExists('job_seekers');
    }
};
