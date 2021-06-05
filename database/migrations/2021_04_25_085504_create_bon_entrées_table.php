<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonEntréesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrees', function (Blueprint $table) {
            $table->id();
            $table->string('numeroBE');
            $table->unsignedBigInteger('materielsId');
            $table->foreign('materielsId')
                ->references('id')
                ->on('Materiels')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('quantiteEntrer');
            $table->integer('prixUnitaire');

            $table->unsignedBigInteger('fournisseursId');
            $table->foreign('fournisseursId')
                ->references('id')
                ->on('Fournisseurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('bonEntrées');
    }
}
