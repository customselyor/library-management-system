<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookInventarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_inventars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faculty_id')->nullable();
            $table->foreign('faculty_id')
                ->references('id')->on('faculties')
                ->onDelete('set null');

            $table->unsignedBigInteger('direction_id')->nullable();
            $table->foreign('direction_id')
                ->references('id')->on('directions')
                ->onDelete('set null');
				
			$table->integer('arrived_year')->default(0);
            $table->integer('summarka_number')->nullable();
            $table->string('faculty_code')->nullable();
            $table->integer('copies')->default(0);
            $table->integer('inventar_number_begin');
            $table->integer('inventar_number_end');
			$table->json('qr_code_lists')->nullable();
            $table->json('inventar_number_removed')->nullable();
				
			$table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')
                ->references('id')->on('books')
                ->onDelete('set null');

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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_inventars');
    }
}
