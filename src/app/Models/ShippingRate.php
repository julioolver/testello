<?php

namespace App\Models;

use App\Classes\Utils\Cep;
use App\Classes\Utils\Rate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_postcode',
        'to_postcode',
        'from_weight',
        'to_weight',
        'cost',
        'user_id'
    ];

    protected $casts = [
        'from_weight' => 'float',
        'to_weight' => 'float',
        'cost' => 'float'
    ];

    // protected function fromWeight(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => str_replace('.', ',', $value),
    //         set: fn ($value) => (float) str_replace(',', '.', $value)
    //     );
    // }

    /**
     * Realiza a conversão de comma para dot antes de gravar no BD do field from_weight.
     * 
     * @param float|string $value
     * 
     * @return void
     */
    public function setFromPostcodeAttribute(string $value): void
    {
        $this->attributes['from_postcode'] = Cep::removeMask($value);
    }

    /**
     * Remove a mácara do campo passado
     * @param string $value
     * 
     * @return void
     */
    public function setToPostcodeAttribute(string $value): void
    {
        $this->attributes['to_postcode'] = Cep::removeMask($value);
    }

    /**
     * Realiza a conversão de comma para dot antes de gravar no BD field from_weight.
     * 
     * @param float|string $value
     * 
     * @return void
    */
    public function setFromWeightAttribute(float|string $value): void
    {
        $this->attributes['from_weight'] = Rate::convertStrToFloat($value);
    }

    /**
     * Realiza a conversão de comma para dot antes de gravar no BD field to_weight.
     * 
     * @param float|string $value
     * 
     * @return void
    */
    public function setToWeightAttribute(float|string $value): void
    {
        $this->attributes['to_weight'] = Rate::convertStrToFloat($value);
    }

    /**
     * Realiza a conversão de comma para dot antes de gravar no BD field cost.
     * 
     * @param float|string $value
     * 
     * @return void
     */
    public function setCostAttribute(float|string $value): void
    {
        $this->attributes['cost'] = Rate::convertStrToFloat($value);
    }

    /**
     * Relação de User com o Shipping Rate
     * 
     */
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
