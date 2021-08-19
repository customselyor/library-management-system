<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_authors', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
        });

        Schema::create('m_authors_translations', function (Blueprint $table) {
            // mandatory fields
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('m_author_id');
            $table->foreign('m_author_id')
                ->references('id')->on('m_authors')
                ->onDelete('cascade');
            // Actual fields you want to translate
            $table->string('title');
            $table->string('slug');
            $table->longText('body')->nullable();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_authors');
        Schema::dropIfExists('m_authors_translations');
    }
}
