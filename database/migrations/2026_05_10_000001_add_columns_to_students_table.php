<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('npm')->unique()->nullable()->after('id');
            $table->string('prodi')->nullable()->after('email');
            $table->year('angkatan')->nullable()->after('prodi');
            $table->enum('status', ['aktif', 'cuti', 'lulus'])->default('aktif')->after('angkatan');
            $table->string('no_hp')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['npm', 'prodi', 'angkatan', 'status', 'no_hp']);
        });
    }
};