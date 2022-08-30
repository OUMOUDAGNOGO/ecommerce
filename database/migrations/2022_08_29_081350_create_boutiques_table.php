<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoutiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutiques', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet');
            $table->string('nom_boutique');
            $table->string('adresse_boutique');
            $table->string('telephone_boutique');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('type_boutiqueId');
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('type_boutiqueId')->references('id')->on('type_boutiques');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boutiques');
    }
}
