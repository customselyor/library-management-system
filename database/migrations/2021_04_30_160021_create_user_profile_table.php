<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('pnf_code')->nullable();
            $table->string('passport_seria_number')->nullable();
            $table->string('passport_copy')->nullable();
            $table->string('image')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('kursi')->nullable();
            $table->string('klassi')->nullable();
            $table->string('raqami')->nullable();
            $table->string('qr_code');
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->foreign('faculty_id')
                ->references('id')->on('faculties')
                ->onDelete('set null');
            $table->unsignedBigInteger('direction_id')->nullable();
            $table->foreign('direction_id')
                ->references('id')->on('directions')
                ->onDelete('set null');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id')
                ->references('id')->on('gender')
                ->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->unsignedBigInteger('user_type_id')->nullable();
            $table->foreign('user_type_id')
                ->references('id')->on('user_types')
                ->onDelete('set null');
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
        Schema::dropIfExists('user_profile');
    }
}
