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
        Schema::create('server_tasks', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('server_id')->constrained()->cascadeOnDelete();
            $table->foreignId('wp_site_id')->nullable()->constrained()->nullOnDelete();

            // Action type: 0=install_wp, 1=restart_container, 2=stop, 3=remove, 4=issue_ssl, etc.
            $table->unsignedTinyInteger('action')
                ->default(0)
                ->comment('0=install_wordpress, 1=restart_container, 2=stop_container, 3=remove_container, 4=issue_ssl, 5=renew_ssl, 6=backup_site, 7=update_wp_core, 8=update_plugins');


            // Additional info passed to agent
            $table->json('payload')->nullable();

            // status: 0=pending, 1=running, 2=success, 3=failed
            $table->unsignedTinyInteger('status')
                ->default(0)
                ->comment('0=pending, 1=running, 2=success, 3=failed');

            $table->longText('output')->nullable(); // task logs

            // Audit Trail
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
        Schema::dropIfExists('server_tasks');
    }
};
