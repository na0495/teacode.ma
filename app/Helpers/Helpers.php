<?php


if (!function_exists('getContributorImage')) {
    function getContributorImage($contributor, $key)
    {
        $contributorImage = 'images/people/contributors/' . $contributor->slug . '.png';
        $exists = \Storage::disk('public')->exists($contributorImage);
        if ($exists) {
            $image = '/storage/' . $contributorImage;
        } else {
            $path = \Storage::disk('public')->path('images/logos');
            $filesCount = count(glob($path . '/*.png'));
            $index = $key < $filesCount ? $key : ($key % $filesCount);
            
            $image = '/storage/images/logos/default ('. $index .').png';
        }
        return $image;
    }
}


if (!function_exists('formatDescription')) {
    function formatDescription($description)
    {
        dd($description);
        // if (is_array())
    }
}

if (!function_exists('getLanguages')) {
    function getLanguages()
    {
        return ['ar', 'en'];
        // return ['ar']; // FOR NOW
    }
}

if (!function_exists('inLanguages')) {
    function inLanguages($lang = null)
    {
        if ($lang) {
            return in_array($lang, getLanguages());
        }
        return false;
    }
}
