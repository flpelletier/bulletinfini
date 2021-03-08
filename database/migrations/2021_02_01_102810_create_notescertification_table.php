<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotescertificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes_certifications', function (Blueprint $table) {
            $table->id();
            $table->string("descritpion");
            $table->integer("note");
            $table->integer("coefficient");
            $table->bigInteger("matiere_id")->unsigned();
            $table->bigInteger("eleve_id")->unsigned();
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
        Schema::dropIfExists('notescertification');
    }
}
