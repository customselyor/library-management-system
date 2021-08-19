<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('subject')->nullable();
            $table->text('author_lists')->nullable();
            $table->string('date')->nullable();
            $table->text('description')->nullable();
            $table->text('contributor')->nullable();
            $table->string('rights')->nullable();
            $table->string('relation')->nullable();
            $table->string('publisher')->nullable();
            $table->string('format')->nullable();
            $table->string('source')->nullable();
            $table->string('identifier')->nullable();
            $table->text('coverage')->nullable();
            $table->string('city')->nullable();
            $table->integer('published_year')->default(0);
            $table->string('image')->nullable();
            $table->text('full_text')->nullable(); //to'liq matni agar bor bo'lsa
            $table->text('UDK')->nullable(); //UDK raqami
            $table->string('BBK')->nullable(); //BBK raqami
            $table->string('K')->nullable(); //K raqami
            $table->integer('betlar_soni')->default(0);
            $table->integer('price')->default(0);
            $table->integer('status')->default(1);
			
			
            $table->unsignedBigInteger('book_text_type_id')->nullable();
            $table->foreign('book_text_type_id')
                ->references('id')->on('book_text_type')
                ->onDelete('set null');
            
            $table->unsignedBigInteger('book_type_id')->nullable();
            $table->foreign('book_type_id')
                ->references('id')->on('book_types')
                ->onDelete('set null');
                
            $table->unsignedBigInteger('book_language_id')->nullable();
            $table->foreign('book_language_id')
                ->references('id')->on('book_languages')
                ->onDelete('set null');
                
            $table->unsignedBigInteger('book_text_id')->nullable();
            $table->foreign('book_text_id')
                ->references('id')->on('book_texts')
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
        Schema::dropIfExists('books');
    }
}
