<?php


if (!function_exists('getLinks')) {
    function getLinks()
    {
        $links = [
            'how-to' => 'https://youtu.be/uNFwkNjNkYc',
            'howto' => 'https://youtu.be/uNFwkNjNkYc',
            'about' => 'https://youtu.be/uNFwkNjNkYc',
            'discord' => 'https://discord.gg/vKu2fkPqjY',

            // Activities
            'workshops' => 'https://discord.gg/vKu2fkPqjY',
            'communication' => 'https://discord.gg/vKu2fkPqjY',
            'communication-en' => 'https://discord.gg/vKu2fkPqjY',
            'communication-fr' => 'https://discord.gg/vKu2fkPqjY',
            'hangouts' => 'https://discord.gg/vKu2fkPqjY',
            'pair-programming' => 'https://discord.gg/vKu2fkPqjY',
            'coding-challenges' => 'https://discord.gg/vKu2fkPqjY',
            'mock-interview' => 'https://discord.gg/vKu2fkPqjY',
            'bot-project' => 'https://teacodema.notion.site/24eed2b9e3b04433b7275d7ad406581e',

            // Social links
            'facebook' => 'https://facebook.com/teacode.ma',
            'facebook-page' => 'https://facebook.com/teacode.ma',
            'facebook-group' => 'https://facebook.com/groups/teacode.ma',
            'instagram' => 'https://instagram.com/teacode.ma',
            'twitter' => 'https://twitter.com/teacodema',
            'linkedin' => 'https://www.linkedin.com/company/teacode.ma',
            'patreon' => 'https://www.patreon.com/teacodema',

            // Specific links
            'email' => 'mailto:contact@teacode.ma?subject=TeaCode : ',
            'youtube' => 'https://youtube.com/channel/UCss61diIS1kW_TRsHMMwtwQ',
            'videos' => 'https://youtube.com/channel/UCss61diIS1kW_TRsHMMwtwQ/videos',
            'events' => 'https://facebook.com/teacode.ma/events',
            'roadmaps' => 'https://roadmap.sh'
        ];
        return $links;
    }
}

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


if (!function_exists('getContributorBadge')) {
    function getContributorBadge($contributor)
    {
        $badges = [
            'founder' => '☕',
            'staff team' => '🥈',
            'host' => '📺',
            'helper' => '🥉',
            'guest' => '💠',
            'contributor' => '🔰'
        ];
        return $badges[$contributor->role];
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
