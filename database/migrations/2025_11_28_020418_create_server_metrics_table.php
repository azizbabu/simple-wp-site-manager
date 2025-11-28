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
        Schema::create('server_metrics', function (Blueprint $table) {
            $table->id();

            $table->foreignId('server_id')->constrained()->cascadeOnDelete();

            $table->float('cpu_usage')->nullable();    // e.g., 57.3 %
            $table->float('memory_usage')->nullable(); // e.g., 62.8 %
            $table->float('disk_usage')->nullable();   // e.g., 70.1 %

            // Very important: actual time of the metric
            $table->timestamp('reported_at')->useCurrent()
                    ->comment('Actual time metric was recorded on server');
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
        Schema::dropIfExists('server_metrics');
    }
};
