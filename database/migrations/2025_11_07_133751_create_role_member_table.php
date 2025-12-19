<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
       Schema::create('role_member', function (Blueprint $table) {
    $table->id();
    $table->morphs('authorizable'); // ينشئ authorizable_id و authorizable_type
    $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('role_member');
    }
};
