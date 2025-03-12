<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->enum('status', ['active', 'inactive', 'in_maintenance', 'in_route'])->default('active');
            $table->string('brand');
            $table->integer('year');
            $table->string('color');
            $table->decimal('price', 10, 2);
            $table->boolean('maintenance_last_6_months');
            $table->timestamps();


            $table->index('brand');
            $table->index('color');
            $table->index('brand');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
