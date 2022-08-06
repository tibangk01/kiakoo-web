<?php

return [
    'header' => [
        'one' => "Informatique",
        'two' => "Télephone et tablettes",
        'three'=> "Chaussures",
        'four' => "Autres",
    ],
    'pagination' => 12,
    'displayedSpecs' => [
        'Couleur',
        'Mémoire RAM',
        'Mémoire interne',
        'Capacité de stockage',
    ],
    'email' => 'kiakoo@kiakoo.com',
    'paygateglobal' => [
        'token' => env('PAYGATE_TOKEN'),
        'url' => env('PAYGATE_URL'),
    ],
];
