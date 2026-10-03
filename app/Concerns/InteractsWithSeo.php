<?php

namespace App\Concerns;

trait InteractsWithSeo {

    protected function casts() : array
    {
        return array_merge($this->casts, [
            "seo_keywords" => "json"
        ]);
    }


    public function getSEOData() : array
    {
        return [
            "title" => $this->seo_title,
            "description" => $this->seo_description,
            "keywords" => $this->seo_keywords,
            "thumbnail_url" => $this->seo_thumbnail_url
        ];
    }

}