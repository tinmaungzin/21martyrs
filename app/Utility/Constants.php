<?php

namespace App\Utility;

class Constants
{
    const LOCALE_MAP = [
        'en' => [
            'text' => "English",
            'pic' => 'images/icons/en-icon.png',
            'code' => 'en_GB'
        ],
        'mm' => [
            'text' => "မြန်မာ",
            'code' => 'my_MM',
            'pic' => 'images/icons/mm-icon.png'
        ]
    ];

    const OCCUPATIONS_ENUM = ['student', 'cdm staff', 'government official', 'political party member', 'journalist', 'civilian', 'other', null];

    const GENDER_ENUM = ['male', 'female', 'other'];
}
