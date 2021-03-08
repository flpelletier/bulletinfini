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
            $table->string("matiere");
            $table->integer("coefficient");
            $table->enum('type', array ('entreprise', 'scolaire'))->default('scolaire');
            $table->integer("note")->nullable();
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
