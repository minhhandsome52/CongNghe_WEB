<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->id(); // Tự động tạo cột id với khóa chính
            $table->string('name');
            $table->string('address');
            $table->string('contact_number');
            $table->timestamps(); // Tạo created_at và updated_at
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('libraries');
    }
    
};
