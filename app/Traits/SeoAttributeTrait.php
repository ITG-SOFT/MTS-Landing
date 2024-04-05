<?php

namespace App\Traits;

use App\Models\Seo\SeoAttribute;

trait SeoAttributeTrait
{
    public function seoAttributes()
    {
        return $this->morphMany(SeoAttribute::class, 'imageable');
    }

    public static function createSeoAttributes($data, $object)
    {
        foreach ($data as $seo_attribute) {
            if ($seo_attribute['value']) {
                SeoAttribute::createSeoAttribute($object,
                    seo_key_id: $seo_attribute['seo_key_id'], value: $seo_attribute['value']
                );
            }
        }
    }

    public static function updateSeoAttributes($data, $object)
    {
        foreach ($data as $seo_attribute) {
            if (isset($seo_attribute['id'])) {
                /** @var SeoAttribute $seo_attribute_obj */
                $seo_attribute_obj = SeoAttribute::query()->find($seo_attribute['id']);
                if (!$seo_attribute['value']) {
                    SeoAttribute::deleteSeoAttribute($seo_attribute_obj);
                    continue;
                }

                SeoAttribute::updateSeoAttribute($seo_attribute_obj, $seo_attribute['value']);
            } else {
                if ($seo_attribute['value']) {
                    SeoAttribute::createSeoAttribute($object,
                        seo_key_id: $seo_attribute['seo_key_id'], value: $seo_attribute['value']
                    );
                }
            }
        }
    }
}
