<?php

namespace app\modules\blog\services;

class SlugService
{
    public function getIdFromSlug(string $slug): string
    {
        $slug = strip_tags($slug);

        return (strpos($slug, '_') !== false) ? strstr($slug, '_', true) : $slug;
    }
}
