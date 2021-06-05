<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personnelsId');
            $table->foreign('personnelsId')
                ->references('id')
                ->on('personnels')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('materielsId');
            $table->foreign('materielsId')
                ->references('id')
                ->on('materiels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('validation');
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
        Schema::dropIfExists('demandes');
    }
}
