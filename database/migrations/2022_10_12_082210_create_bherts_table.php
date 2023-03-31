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
        Schema::create('bherts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('bhertFname');
            $table->string('bhertLname');
            $table->string('bhertMname')->nullable();
            $table->string('bhertSuffix')->nullable();

            $table->string('bhertHousenumber');
            $table->enum('bhertStreetname', [
                'Bambang Cor Masangkay St', 'G Masangkay St', 'Mayhaligue St'
            ]);

            $table->string('bhertAge');
            $table->string('bhertPurpose');
            $table->string('bhertImage')->nullable();

            $table->enum('bhertStatus', [
                'pending', 'approved', 'denied', 'processed', 'claimed', 'canceled'
            ])->default('pending');
            $table->date('bhertApproveddate')->nullable();
            $table->date('bhertDenieddate')->nullable();
            $table->date('bhertProcesseddate')->nullable();
            $table->date('bhertClaimdate')->nullable();
            $table->date('bhertCanceleddate')->nullable();

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
        Schema::dropIfExists('bherts');
    }
};
