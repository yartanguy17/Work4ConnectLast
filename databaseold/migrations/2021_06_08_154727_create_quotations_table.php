<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('range')->nullable();
            $table->date('quotation_date')->nullable();
            $table->date('treatment_date')->nullable();
            $table->unsignedBigInteger('secteur_activite_id');
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('secteur_activite_id')->references('id')
                ->on('secteur_activites')
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
        Schema::dropIfExists('quotations');
    }
}
