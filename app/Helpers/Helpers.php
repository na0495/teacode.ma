<?php

if (!function_exists('getSocialLinks')) {
    function getSocialLinks()
    {
        return json_decode(\File::get(base_path() . '/database/data/social-links.json'));
    }
}

if (!function_exists('getFooterMenu')) {
    function getFooterMenu()
    {
        return json_decode(\File::get(base_path() . '/database/data/footer-menu.json'));
    }
}

if (!function_exists('getColorRole')) {
    function getColorRole($role)
    {
        $roleSlug = \Str::slug($role);
        $colors = [
            'founder' => '#1da1f2',
            'staff-team' => '#3ac3e2',
            'helpers-members' => '#16c60c',
            'contributors-members' => '#e85b00'
        ];
        return $colors[$roleSlug];
    }
}

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
