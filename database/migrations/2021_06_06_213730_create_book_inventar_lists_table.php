<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookInventarListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_inventar_lists', function (Blueprint $table) {
            $table->id();
            $table->string('invertar_number');
			$table->integer('is_deleted')->default(0);
			$table->text('comment')->nullable();
			$table->longText('qr_img')->nullable();
			$table->integer('status')->default(1);

            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')
                ->references('id')->on('books')
                ->onDelete('set null');
            
            $table->unsignedBigInteger('book_inventar_id')->nullable();
            $table->foreign('book_inventar_id')
                ->references('id')->on('book_inventars')
                ->onDelete('set null');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('set null');
            
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')
                ->references('id')->on('users')
                ->onDelete('set null');
            $table->text('extra1')->nullable();
            $table->text('extra2')->nullable();
            $table->text('extra3')->nullable();

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
        Schema::dropIfExists('book_inventar_lists');
    }
}
