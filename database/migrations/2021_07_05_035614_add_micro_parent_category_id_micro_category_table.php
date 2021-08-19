<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMicroParentCategoryIdMicroCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('micro_categories', function (Blueprint $table) {
            // Foreign key to the main model
            $table->unsignedBigInteger('micro_parent_category_id');
            $table->foreign('micro_parent_category_id','fk_parnt_cat')
                ->references('id')->on('micro_parent_category')
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
        Schema::table('micro_categories', function (Blueprint $table) {
            //
        });
    }
}
