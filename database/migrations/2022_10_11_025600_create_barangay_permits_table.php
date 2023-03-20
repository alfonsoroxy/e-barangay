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
        Schema::create('barangay_permits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('barangayPermitName');

            $table->string('barangayPermitHousenumber');
            $table->enum('barangayPermitStreetname', [
                'Bambang Cor Masangkay St', 'G Masangkay St', 'Mayhaligue St'
            ]);

            $table->string('barangayPermitImage')->nullable();

            $table->enum('barangayPermitStatus', [
                'pending', 'approved', 'denied', 'processed', 'claimed', 'canceled'
            ])->default('pending');
            $table->date('barangayPermitApproveddate')->nullable();
            $table->date('barangayPermitDenieddate')->nullable();
            $table->date('barangayPermitProcesseddate')->nullable();
            $table->date('barangayPermitClaimdate')->nullable();
            $table->date('barangayPermitCanceleddate')->nullable();

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
        Schema::dropIfExists('barangay_permits');
    }
};
