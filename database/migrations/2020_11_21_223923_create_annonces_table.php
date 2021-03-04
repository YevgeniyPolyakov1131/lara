<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->text("description");
            $table->unsignedInteger("prix");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("ville_id");
            $table->unsignedBigInteger("image_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("ville_id")->references("id")->on("villes");
            $table->foreign("image_id")->references("id")->on("images");
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
        Schema::dropIfExists('annonces');
    }
}
