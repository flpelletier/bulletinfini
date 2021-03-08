<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres_certifications', function (Blueprint $table) {
            $table->id();
            $table->string("matiere");
            $table->integer("coefficient");
            $table->enum('type', array ('entreprise', 'scolaire'))->default('scolaire');
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
        Schema::dropIfExists('matieres_certifications');
    }
}
