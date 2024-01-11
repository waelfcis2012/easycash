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
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->decimal('amount', 8, 2);
                $table->char('currency', 3);
                $table->string('phone');
                $table->smallInteger('status');
                $table->string('transaction_id');
                $table->dateTime('created_at');
                $table->unsignedBigInteger('provider_id');

                $table->foreign('provider_id')->references('id')->on('providers');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
