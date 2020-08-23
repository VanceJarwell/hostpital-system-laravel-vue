<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('birthdate');
            $table->string('age');
            $table->string('gender');
            $table->string('weight');
            $table->string('height');
            $table->string('address');
            $table->bigInteger('phone');
            $table->string('contact_person');
            $table->string('cp_relationship');
            $table->integer('cp_phone');
            $table->string('cp_address');
            $table->timestamps();
            $table->time('delete_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
