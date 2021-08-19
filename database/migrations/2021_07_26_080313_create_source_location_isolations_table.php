<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceLocationIsolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_location_isolations', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
        });
        Schema::create('source_location_isolation_translations', function (Blueprint $table) {
            // mandatory fields
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('source_location_isolation_id');
            $table->foreign('source_location_isolation_id','fk_source_location_isolations')
                ->references('id')->on('source_location_isolations')
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
        Schema::dropIfExists('source_location_isolations');
    }
}
