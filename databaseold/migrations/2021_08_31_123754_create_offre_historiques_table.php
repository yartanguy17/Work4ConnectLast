<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffreHistoriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offre_historiques', function (Blueprint $table) {
            $table->id();
            $table->string('titre_name')->nullable();
            $table->string('offre_name')->nullable();
            $table->unsignedInteger('client_id')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offre_historiques');
    }
}
