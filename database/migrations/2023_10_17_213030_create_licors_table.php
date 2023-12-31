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
        Schema::create('licors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('descripcion',100);
            $table->decimal('precio',7,2);
            $table->unsignedInteger('stock');
            $table->foreignId('categoria_id')->contrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licors');
    }
};
