<?php
/**
 * @see https://github.com/artesaos/seotools
 */

$defaultTitlle = "Mentari Sehat Indonesia Kabupaten Sragen";
$defaultDescription = "Yayasan Mentari Sehat Indonesia didirikan di Semarang pada 22 Juli 2020 oleh Prof. Dr. Masrukhi, Supriyanto, Hj. Siti Taqiyah, Noor Diansyah, dan Chairul Basar.";

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => $defaultTitlle, // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => $defaultDescription, // set false to total remove
            'separator'    => ' | ',
            'keywords'     => [
                 'yayasan',
                'sehat',
                'mentari',
                'masyarakat',
                'indonesia',
                'sragen',
                'kabupaten sragen',
                'mentari sragen',
                'mentari sehat indonesia',
                'mentari sehat indonesia kabupaten sragen',
            ],
            'canonical'    => true, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => true, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => $defaultTitlle, // set false to total remove
            'description' => $defaultDescription, // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => $defaultTitlle,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => $defaultTitlle, // set false to total remove
            'description' => $defaultDescription, // set false to total remove
            'url'         => null, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
