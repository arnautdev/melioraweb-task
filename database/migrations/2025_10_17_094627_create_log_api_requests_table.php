<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('log_api_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string('method')->index();
            $table->string('url');
            $table->string('ip')->index();
            $table->string('user_id')->nullable()->index();
            $table->string('headers');
            $table->json('body');
            $table->string('response_status')->index();
            $table->json('response_body');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_api_requests');
    }
};
