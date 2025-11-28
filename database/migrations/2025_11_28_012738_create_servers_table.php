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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            // Owner of the server
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->string('ip_address');
            $table->string('ssh_user');
            $table->unsignedSmallInteger('ssh_port')->default(22);

            $table->text('ssh_private_key')->nullable(); // encrypted in model

            $table->unsignedTinyInteger('status')
                ->default(0)
                ->comment('0=pending, 1=active, 2=offline, 3=error');

            $table->string('agent_version')->nullable();
            $table->timestamp('last_heartbeat_at')->nullable();

            // Audit columns
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
