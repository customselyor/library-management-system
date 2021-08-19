<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionsGrowthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('conditions_growths', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
        });
        Schema::create('conditions_growth_translations', function (Blueprint $table) {
            // mandatory fields
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('conditions_growth_id');
            $table->foreign('conditions_growth_id', 'fk_conditions_growths')
                ->references('id')->on('conditions_growths')
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
        Schema::dropIfExists('conditions_growths');
        Schema::dropIfExists('conditions_growths_translations');
    }
}
