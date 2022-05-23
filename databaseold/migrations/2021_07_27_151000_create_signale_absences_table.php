<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignaleAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signale_absences', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('type_absence_id');
            $table->date('date_demande')->nullable();
            $table->string('hour_start_time')->nullable();
            $table->date('date_effet')->nullable();
            $table->date('date_reprise')->nullable();
            $table->string('motif_demande')->nullable();
            $table->boolean('is_valide')->nullable()->default(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('contrat_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('contrat_id')->references('id')
                ->on('contrats')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type_absence_id')->references('id')
                ->on('type_absences')
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
        Schema::dropIfExists('signale_absences');
    }
}
