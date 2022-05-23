<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->unique();
            $table->mediumText('address')->nullable();
            $table->string('profile_picture')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_activated')->default(false);
            $table->string('type_users')->nullable();
            $table->string('personne_type')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('profession')->nullable();
            $table->mediumText('biography')->nullable();
            $table->string('num_impot')->nullable();
            $table->string('nif')->nullable();
            $table->date('date_creation')->nullable();
            $table->string('contact_name')->nullable();
            $table->unsignedBigInteger('ville_id')->nullable();
            $table->unsignedBigInteger('secteur_activite_id')->nullable();
            $table->integer('total_experience')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('cni_num')->nullable();
            $table->string('cni_file')->nullable();
            $table->string('passport_num')->nullable();
            $table->string('passport_file')->nullable();
            $table->string('voter_card_num')->nullable();
            $table->string('voter_card_file')->nullable();
            $table->string('email_token')->nullable();
            $table->string('verification_code')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('secteur_activite_id')->references('id')
                ->on('secteur_activites')
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
        Schema::dropIfExists('users');
    }
}
