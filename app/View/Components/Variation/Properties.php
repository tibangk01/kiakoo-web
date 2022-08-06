<?php

/**
 *
 */

//TODO: documentation for variation & properties .... 😞

namespace App\View\Components\Variation;

use App\Models\Product;
use App\Models\Variation;
use Illuminate\View\Component;

class Properties extends Component
{
    public $variationId;

    public $datas;

    public function __construct($variationId)
    {
        $this->variationId = $variationId;

        $propertyValues = Variation::where('id', $this->variationId)
            ->with(['propertyValues.property'])
            ->first()->propertyValues;

        $productId = Variation::where('id', $this->variationId)->first()->product_id;

        // get properties ids that we will never display on product:
        $propertyIds = Product::where('id', $productId)
            ->with(['properties'])
            ->first()
            ->properties
            ->whereIn('name', config('kiakoo.displayedSpecs'))
            ->pluck('id');

        $variationPropertyValues = $propertyValues->map(function ($propertyValue) use ($variationId) {
            return [
                'variation_id' => $variationId,
                'property_id' => $propertyValue->property->id,
                'property_name' => $propertyValue->property->name,
                'property_value_id' => $propertyValue->id,
                'property_value_name' => $propertyValue->name,
            ];
        })->filter(function($a) use($propertyIds){
            return $propertyIds->contains($a['property_id']);
        });

        $variations = Variation::where(function ($query) use ($productId) {
            $query->where('product_id', $productId)
                ->where('is_published', true);
        })->with(['propertyValues.property'])->get();


        $this->datas = $variationPropertyValues->map(function ($variationPropertyValue) use ($variations, $propertyIds) {

            $otherVariationsPropertyValues = $variations->map(function ($variation) {

                return $variation->propertyValues->map(function ($propertyValue) use ($variation) {

                    return [
                        'variation_id' => $variation->id,
                        'stock' => $variation->stock,
                        'property_id' => $propertyValue->property->id,
                        'property_name' => $propertyValue->property->name,
                        'property_value_id' => $propertyValue->id,
                        'property_value_name' => $propertyValue->name,
                    ];
                });
            })->flatten(1)
                ->reject(function ($formatedPropertyValue) use ($variationPropertyValue, $propertyIds) {

                    // dd($formatedPropertyValue, $variationPropertyValue);

                    //return $formatedPropertyValue['property_value_id'] == $variationPropertyValue['property_value_id'] ||
                    return $formatedPropertyValue['property_id'] != $variationPropertyValue['property_id'];
                        // $propertyIds->contains($formatedPropertyValue['property_id']);
                })
                ->unique('property_value_id')
                ->sortBy('property_value_name');

            return [
                $variationPropertyValue,
                $otherVariationsPropertyValues
            ];
        });
    }

    public function render()
    {
        return view('components.variation.properties');
    }
}
