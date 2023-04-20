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
        Schema::create('barangay_officials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('brgyOfficialFname');
            $table->string('brgyOfficialLname');
            $table->string('brgyOfficialMname')->nullable();
            $table->string('brgyOfficialSuffix')->nullable();

            $table->string('brgyOfficialHousenumber');
            $table->enum('brgyOfficialStreetname', [
                'Bambang Cor Masangkay St', 'G Masangkay St', 'Mayhaligue St'
            ]);

            $table->string('brgyOfficialEmail')->unique()->nullable();
            $table->string('brgyOfficialContact')->nullable();
            $table->string('brgyImage')->nullable();
            $table->enum(
                'brgyOfficialPosition',
                [
                    'Punong Barangay', 'Secretary', 'Treasurer', 'Kagawad',
                    'SK Chairman', 'SK Kagawad'
                ]
            );
            $table->timestamps();

            //Syntax For Declaring Foreign Key
            // $table->foreign('table_name'_'column')->references('column')->on('table_name')->onDelete('cascade');
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
        Schema::dropIfExists('barangay_officials');
    }
};
