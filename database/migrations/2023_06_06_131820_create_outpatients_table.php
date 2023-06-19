<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('outpatients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->integer('number_MC');
            $table->date('observationDate');
            $table->date('deragistrationDate')->nullable();
            $table->string('reasonforWuthDrawal');
            $table->string('newAddress')->nullable();
            $table->date('dateOfchangeAddress')->nullable();
            $table->date('dateOftheApplication');
            $table->string('finalDiagnosis');
            $table->string('firstTimeDiagnosis');
            $table->unsignedBigInteger('idResident');
            $table->foreign('idResident')->references('id')->on('residents')->onDelete('cascade');
            $table->string('doctor');
            $table->string('patient_complaints');
            $table->string('appointmet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outpatients');
    }
};
