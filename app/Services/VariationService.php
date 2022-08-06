<?php

namespace App\Services;

use App\Repositories\VariationRepository;

class VariationService
{
    public $repository;

    public function __construct()
    {
        $this->repository = new VariationRepository;
    }

    public function searchSimilar($oldVariationId, $newVariationPropertyId, $newVariationPropertyValueId)
    {
        $formNew = collect([
            'property' . $newVariationPropertyId => $newVariationPropertyId,
            'propertyValue' . $newVariationPropertyValueId => $newVariationPropertyValueId,
        ]);

        $displayVariation = $this->repository->findOrFail($oldVariationId);

        $displaysVariationPropertyValues = $displayVariation
            ->load('propertyValues')
            ->propertyValues->sortBy('id');

        $aa = $displaysVariationPropertyValues->map(function ($propertyValue) {
            return collect([
                'property' . $propertyValue->property_id => $propertyValue->property_id,
                'propertyValue' . $propertyValue->pivot->property_value_id => $propertyValue->pivot->property_value_id
            ]);
        });

        $aaa = $aa->prepend(collect(['variation_id' => $displayVariation->id]));

        // get old variation product id
        $productId = $displayVariation->product_id;

        // get the above product child : published, stock++, except oldVariation
        $otherVariations = $this->repository->with(['propertyValues'])->findWhere([
            'product_id' =>  $productId,
            ['id', '!=', $oldVariationId],
            'is_published' => true,
        ]);

        $bb = $otherVariations->map(function ($variation) {

            $xxx = $variation->propertyValues->map(function ($propertyValue) {

                return collect([
                    'property' . $propertyValue->property_id => $propertyValue->property_id,
                    'propertyValue' . $propertyValue->pivot->property_value_id => $propertyValue->pivot->property_value_id
                ]);
            });

            return $xxx->prepend(collect(['variation_id' => $variation->id]));
        });

        $el = $bb->map(function ($e) use ($aaa, $formNew) {

            $z = $e->diff($aaa);

            if ($z->count() === 2) {

                if ($z->last()->first() === (int)$formNew->first()) {
                    return $z->first()->first();
                }
            }
        });

        $filter = $el
            ->filter()
            ->flatten();

        if ($filter->isNotEmpty()) {

            // get the correct one :
            $redVar = $this
                ->repository
                ->with('propertyValues')
                ->findOrFail($filter); // Add where clauses to select disired elements ...😃

            $trueOne = $redVar->map(function ($var) {

                $v = $var->propertyValues->map(function ($propertyValue) {

                    return collect([
                        'property' . $propertyValue->property_id => $propertyValue->property_id,
                        'propertyValue' . $propertyValue->pivot->property_value_id => $propertyValue->pivot->property_value_id
                    ]);
                });

                return $v->prepend(collect(['variation_id' => $var->id]));
            });

            $finalTrue = $trueOne->map(function ($true) use ($formNew) {

                return $true->contains($formNew) ? $true : false;
            });

            $finalTrue = $finalTrue->filter();

            if ($finalTrue->isNotEmpty()) {

                $sezam =  $finalTrue->flatten()->first(); //😇

                return $this->repository->findOrFail($sezam);
            }
        }

        return null;
    }
}
