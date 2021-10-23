<?php


if (!function_exists('getFaqSections')) {
    function getFaqSections()
    {
        $sections = [
            'how-to-use',
            'how-to-benefit',
            'how-to-ask-for-help',
            'how-to-help',
            'post-code',
        ];
        return $sections;
    }
}

if (!function_exists('getPages')) {
    function getPages()
    {
        $links = [
            'videos' => 'https://youtube.com/channel/UCss61diIS1kW_TRsHMMwtwQ/videos',
            'events' => 'https://facebook.com/teacode.ma/events',
            'contributors' => 'contributors',
            'resources' => 'resources',
            'rules' => 'rules',
            'faq' => 'faq',
            'privacy' => 'privacy',
            'coming-soon' => 'comingSoon',
        ];
    }
}

if (!function_exists('getLinks')) {
    function getLinks()
    {
        $links = [
            'how-to' => 'https://youtu.be/uNFwkNjNkYc',
            'howto' => 'https://youtu.be/uNFwkNjNkYc',
            'about' => 'https://youtu.be/uNFwkNjNkYc',
            'discord' => 'https://discord.gg/vKu2fkPqjY',
            'join' => 'https://discord.gg/vKu2fkPqjY',

            // Activities
            'workshops' => 'https://discord.gg/vKu2fkPqjY',
            'communication' => 'https://discord.gg/vKu2fkPqjY',
            'communication-en' => 'https://discord.gg/vKu2fkPqjY',
            'communication-fr' => 'https://discord.gg/vKu2fkPqjY',
            'hangouts' => 'https://discord.gg/vKu2fkPqjY',
            'pair-programming' => 'https://discord.gg/vKu2fkPqjY',
            'coding-challenges' => 'https://discord.gg/vKu2fkPqjY',
            'mock-interview' => 'https://discord.gg/vKu2fkPqjY',

            // Bot Project
            'teabot' => 'https://replit.com/@drissboumlik/teabot',
            'teabottest' => 'https://replit.com/@drissboumlik/TeaBotTest',
            'bot-project' => 'https://teacodema.notion.site/24eed2b9e3b04433b7275d7ad406581e',

            // Social links
            'facebook' => 'https://facebook.com/teacode.ma',
            'facebook-page' => 'https://facebook.com/teacode.ma',
            'facebook-group' => 'https://facebook.com/groups/teacode.ma',
            'instagram' => 'https://instagram.com/teacode.ma',
            'twitter' => 'https://twitter.com/teacodema',
            'linkedin' => 'https://www.linkedin.com/company/teacode.ma',
            'github' => 'https://www.github.com/teacodema',
            'patreon' => 'https://www.patreon.com/teacodema',
            'paypal' => 'https://www.paypal.me/drissboumlik',

            // Specific links
            'email' => 'mailto:contact@teacode.ma?subject=TeaCode : ',
            // 'email' => 'mailto:info@spatie.be?subject=A%20good%20match%21&body=Tell%20us%20as%20much%20as%20you%20can%20about%0A-%20your%20online%20project%0A-%20your%20planning%0A-%20your%20budget%0A-%20%E2%80%A6%0A%0AAnything%20that%20helps%20us%20to%20start%20straightforward%21',
            'rules' => 'https://teacodema.notion.site/d1fdafdd0baa483a891f2b00d1719566',
            'faq' => 'https://teacodema.notion.site/e1151faed70b4f768da2688b026b2ac6',
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
