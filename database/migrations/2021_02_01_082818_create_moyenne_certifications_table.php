<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoyenneCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyenne_certifications', function (Blueprint $table) {
            $table->id();
            $table->string("note");
            $table->string("exam")->nullable();;
            $table->string("continue")->nullable();
            $table->string("remarque")->nullable();
            $table->bigInteger("eleve_id")->unsigned();
            $table->bigInteger("matiere_id")->unsigned();
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
        Schema::dropIfExists('moyenne_certifications');
    }
}
