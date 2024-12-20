<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('it_centers', function (Blueprint $table) {
            $table->id(); // id (primary key)
            $table->string('name');
            $table->string('location');
            $table->string('contact_email')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('it_centers');
    }
};
