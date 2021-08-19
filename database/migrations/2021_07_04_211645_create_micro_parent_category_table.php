<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicroParentCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('micro_parent_category', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('image')->nullable();
            
            $table->integer('is_favorite')->nullable()->default(1);
            $table->integer('status')->nullable()->default(1);
            $table->integer('hits_count')->nullable()->default(1);
       
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('set null');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')
                ->references('id')->on('users')
                ->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('micro_parent_category_translations', function (Blueprint $table) {
            // mandatory fields
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();
     
            // Foreign key to the main model
            $table->unsignedBigInteger('micro_parent_category_id');
            $table->foreign('micro_parent_category_id','fk_pr_cat')
                ->references('id')->on('micro_parent_category')
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
        Schema::dropIfExists('micro_parent_category');
    }
}
