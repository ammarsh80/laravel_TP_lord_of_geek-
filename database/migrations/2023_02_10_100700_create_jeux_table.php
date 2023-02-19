<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeux', function (Blueprint $table) {
            $table->id();
            $table->string('titre'); //Add this line
            $table->unique('titre');
            $table->string('description')->default('ici la description');
            $table->unsignedBigInteger('categorie_id')->default(1);
            $table->foreign('categorie_id')->references('id')->on('categories');           
             // $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jeux');
    }
};
