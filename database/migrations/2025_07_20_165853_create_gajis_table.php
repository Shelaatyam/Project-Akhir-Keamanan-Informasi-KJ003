<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('gajis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('karyawan_id')->constrained();
        $table->decimal('gaji_pokok', 15, 2);
        $table->decimal('tunjangan', 15, 2);
        $table->decimal('total_gaji', 15, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
