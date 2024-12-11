<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id(); // Tự động tạo cột id với khóa chính
        $table->string('title');
        $table->string('author');
        $table->integer('publication_year');
        $table->string('genre');
        $table->foreignId('library_id')->constrained('libraries')->onDelete('cascade');
        $table->timestamps(); // Tạo created_at và updated_at
    });
}

public function down()
{
    Schema::dropIfExists('books');
}

};
