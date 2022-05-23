<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id')->nullable();
            $table->mediumText('message')->nullable();
            $table->string('cv_file')->nullable();
            $table->string('cover_letter_file')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('treat_by')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('is_favorable')->default(false);
            $table->mediumText('decision')->nullable();
            $table->integer('is_active')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('offer_id')->references('id')
                ->on('offers')
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
        Schema::dropIfExists('applies');
    }
}
