<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('ad_script_tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->longText('reference_script');
            $table->text('outcome_description');
            $table->longText('new_script')->nullable();
            $table->longText('analysis')->nullable();
            $table->enum('status', \App\Application\Enums\AdScriptTaskStatusEnum::toArray())
                ->default(\App\Application\Enums\AdScriptTaskStatusEnum::PENDING->value);

            $table->text('error')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ad_script_tasks');
    }
};
