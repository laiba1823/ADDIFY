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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('user_type', ['vendor', 'buyer', 'admin']);
            $table->unsignedBigInteger('user_id');
            $table->integer('current_balance');
            $table->string('card_holder')->nullable();
            $table->string('card_expiry')->nullable();
            $table->string('card_number')->nullable();
            $table->string('account_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
