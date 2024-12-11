<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // id (primary key)
            $table->string('brand');
            $table->string('model');
            $table->string('specifications');
            $table->boolean('rental_status')->default(false); // false = chưa cho thuê
            $table->unsignedBigInteger('renter_id')->nullable(); // khóa ngoại

            // Thiết lập khóa ngoại
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
