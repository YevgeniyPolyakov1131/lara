<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnonceSousCategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce_sous_categorie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("annonce_id");
            $table->unsignedBigInteger("sous_categorie_id");
            $table->foreign("annonce_id")->references("id")->on("annonces");
            $table->foreign("sous_categorie_id")->references("id")->on("sous_categories");
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
        Schema::dropIfExists('annonce_sous_categorie');
    }
}
