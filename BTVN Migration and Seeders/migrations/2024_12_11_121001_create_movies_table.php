<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // id (primary key)
            $table->string('title');
            $table->string('director');
            $table->date('release_date');
            $table->integer('duration'); // Thời lượng tính bằng phút
            $table->unsignedBigInteger('cinema_id'); // Khóa ngoại

            // Thiết lập khóa ngoại
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
