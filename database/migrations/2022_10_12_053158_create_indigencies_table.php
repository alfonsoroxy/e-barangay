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
        Schema::create('indigencies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('indigencyFname');
            $table->string('indigencyLname');
            $table->string('indigencyMname')->nullable();
            $table->string('indigencySuffix')->nullable();

            $table->string('indigencyHousenumber');
            $table->enum('indigencyStreetname', [
                'Bambang Cor Masangkay St', 'G. Masangkay St', 'Mayhaligue St'
            ]);

            $table->string('indigencyPurpose');
            $table->string('indigencyImage')->nullable();

            $table->enum('indigencyStatus', [
                'pending', 'approved', 'denied', 'processed', 'claimed', 'canceled'
            ])->default('pending');
            $table->date('indigencyApproveddate')->nullable();
            $table->date('indigencyDenieddate')->nullable();
            $table->date('indigencyProcesseddate')->nullable();
            $table->date('indigencyClaimdate')->nullable();
            $table->date('indigencyCanceleddate')->nullable();

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
        Schema::dropIfExists('indigencies');
    }
};
