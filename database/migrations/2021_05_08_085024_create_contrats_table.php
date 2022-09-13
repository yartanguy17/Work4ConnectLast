<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_contrat_id')->nullable();
            $table->date('date_effet')->nullable();
            $table->date('date_fin')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('prestataire_id')->nullable();
            $table->unsignedBigInteger('ville_id')->nullable();
            $table->float('pay_per_hour')->nullable();
            $table->float('salary')->nullable();
            $table->string('type_versement')->nullable();
            $table->integer('daily_hourly_rate')->nullable();
            $table->integer('working_day_week')->nullable();
            $table->mediumText('working_description')->nullable();
            $table->boolean('status')->default(false);
            $table->string('nbreheure')->nullable();
            $table->string('tarifhoraire')->nullable();
            $table->string('type_contrat')->nullable();
            $table->string('name_cnss')->nullable();
            $table->boolean('is_active')->default(false);
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('prestataire_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type_contrat_id')->references('id')
                ->on('type_contrats')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('admin_id')->references('id')
                ->on('admins')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('ville_id')->references('id')
                ->on('villes')
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
        Schema::dropIfExists('contrats');
    }
}
