<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
        });
        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('eleve_id')->references('id')->on('eleves')->onDelete('cascade');
        });
        Schema::table('matieres', function (Blueprint $table) {
            $table->foreign('groupe-matiere_id')->references('id')->on('groupe_matieres')->onDelete('cascade');
        });
        Schema::table('bulletins', function (Blueprint $table) {
            $table->foreign('eleve_id')->references('id')->on('eleves')->onDelete('cascade');
        });
        Schema::table('eleves', function (Blueprint $table) {
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
