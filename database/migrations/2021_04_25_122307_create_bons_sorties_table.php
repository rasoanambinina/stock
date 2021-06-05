<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonsSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorties', function (Blueprint $table) {
            $table->id();
            $table->string('numeroBS');
            $table->unsignedBigInteger('materielsId');
            $table->foreign('materielsId')
                ->references('id')
                ->on('materiels')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('personnelsId');
            $table->foreign('personnelsId')
                ->references('id')
                ->on('personnels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('quantiteSortie');
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
        Schema::dropIfExists('bonSorties');
    }
}
