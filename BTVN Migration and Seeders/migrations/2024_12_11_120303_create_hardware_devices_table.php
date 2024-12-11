<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // id (primary key)
            $table->string('device_name');
            $table->string('type');
            $table->boolean('status')->default(true); // true = Đang hoạt động, false = Hỏng
            $table->unsignedBigInteger('center_id'); // khóa ngoại

            // Thiết lập khóa ngoại
            $table->foreign('center_id')->references('id')->on('it_centers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hardware_devices');
    }
};
