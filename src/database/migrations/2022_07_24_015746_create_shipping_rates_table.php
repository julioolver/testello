<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const MAX_POSTAL_CODE_LENGTH = 9;
    const TOTAL_DECIMAL_WEIGHT = 8;
    const TOTAL_PLACES_WEIGHT = 4;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_rates', function (Blueprint $table) {
            $table->id();
            $table->string('from_postcode', self::MAX_POSTAL_CODE_LENGTH);
            $table->string('to_postcode', self::MAX_POSTAL_CODE_LENGTH);
            $table->decimal('from_weight', self::TOTAL_DECIMAL_WEIGHT, self::TOTAL_PLACES_WEIGHT);
            $table->decimal('to_weight', self::TOTAL_DECIMAL_WEIGHT, self::TOTAL_PLACES_WEIGHT);
            $table->decimal('cost', self::TOTAL_DECIMAL_WEIGHT, self::TOTAL_PLACES_WEIGHT);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_rates');
    }
};
