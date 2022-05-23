<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title_offer')->nullable();
            $table->mediumText('description_offer')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('end_date_delai')->nullable();
            $table->unsignedBigInteger('type_contrat_id');
            $table->unsignedBigInteger('ville_id');
            $table->unsignedBigInteger('user_id');
            $table->string('total_experience')->nullable();
            $table->string('expected_salary')->nullable();
            $table->integer('vacancies')->nullable();
            $table->integer('is_active')->default(0);
            $table->longText('mission')->nullable();
            $table->longText('profile')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('secteur_activite_id');
            $table->unsignedBigInteger('job_type_id');
            $table->timestamps();

            $table->foreign('secteur_activite_id')->references('id')
                ->on('secteur_activites')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('job_type_id')->references('id')
                ->on('job_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('ville_id')->references('id')
                ->on('villes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type_contrat_id')->references('id')
                ->on('type_contrats')
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
        Schema::dropIfExists('offers');
    }
}
