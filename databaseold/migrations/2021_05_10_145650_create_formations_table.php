<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('title_formation')->nullable();
            $table->mediumText('description_formation')->nullable();
            $table->date('date_formation')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->float('cout_formation')->nullable();
            $table->unsignedBigInteger('type_formation_id');
            $table->string('document_formation')->nullable();
            $table->boolean('status_formation')->default(false);
            $table->timestamps();

            $table->foreign('type_formation_id')->references('id')
                ->on('type_formations')
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
        Schema::dropIfExists('formations');
    }
}
