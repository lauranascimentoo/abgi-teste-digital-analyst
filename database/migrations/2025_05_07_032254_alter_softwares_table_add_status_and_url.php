<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('softwares', function (Blueprint $table) {
            // $table->boolean('status')->default(true); // ou use ->default(1)
            // $table->string('download_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('softwares', function (Blueprint $table) {
            $table->dropColumn(['status', 'download_url']);
        });
    }
};
