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
        Schema::table('users', function (Blueprint $table) {
            $table->string('mname')->nullable();
            $table->string('suffix')->nullable();

            $table->integer('houseNumber');
            $table->enum('streetName', [
                'Bambang Cor Masangkay St', 'G. Masangkay St', 'Mayhaligue St'
            ]);

            $table->date('birthday');
            $table->string('nationality');
            $table->enum('gender', ['Female', 'Male']);
            $table->enum('maritalStatus', ['Single', 'Married', 'Divorced', 'Separated', 'Widowed']);

            // $table->enum('isVoter', ['Voter', 'Not Registered'])->default('Not Registered');
            $table->string('contact')->nullable();

            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('users');
        });
    }
};
