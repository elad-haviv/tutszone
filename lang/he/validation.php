<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute חייב להיות מאושר',
    'active_url'           => ':attribute הוא לא כתובת URL תקנית',
    'after'                => ':attribute חייב לביות תאריך אחרי :date',
    'alpha'                => ':attribute יכול להכיל רק אותיות לטיניות',
    'alpha_dash'           => ':attribute יכול להכיל רק אותיות לטיניות, מספרים ומקפים',
    'alpha_num'            => ':attribute יכול להכיל רק אותיות לטיניות ומספרים',
    'array'                => ':attribute חייב להיות מערך',
    'before'               => ':attribute חייב להיות תאריך לפני :date.',
    'between'              => [
        'numeric' => ':attribute חייב להיות בין :min ל-:max',
        'file'    => 'הגודל של :attribute חייב להיות בין :min ל-:max kb',
        'string'  => 'האורך של :attribute חייב להיות בין :min ל-:max',
        'array'   => ':attribute חייב להכיל בין :min ל-:max פריטים',
    ],
    'boolean'              => ':attribute חייב להיות "אמת" או "שקר"',
    'confirmed'            => 'ווידוא ה-:attribute לא נכון',
    'date'                 => ':attribute הוא לא תאריך תקני',
    'date_format'          => ':attribute לא תואם לפורמט :format',
    'different'            => ':attribute חייב להיות שונה מ-:other',
    'digits'               => ':attribute חייב להכיל :digits ספרות',
    'digits_between'       => ':attribute חייב להכיל בין :min ל-:max ספרות',
    'email'                => ':attribute חייב להייות כתובת דוא"ל תקנית',
    'filled'               => ':attribute הוא שדה חובה',
    'exists'               => ':attribute שהוזן אינו תקני.',
    'image'                => ':attribute חייב להיות תמונה',
    'in'                   => 'ה-:attribute שנבחר אינו תקני',
    'integer'              => ':attribute חייב להיות ערך מספרי',
    'ip'                   => ':attribute חייב להיות כתובת IP תקנית',
    'max'                  => [
        'numeric' => ':attribute חייב להיות קטן או שווה ל-:max.',
        'file'    => 'הגודל של :attribute לא יכול לעבור את :max kilobytes.',
        'string'  => ':attribute לא יכול להכיל יותר מ-:max תווים',
        'array'   => ':attribute לא יכול להכיל יותר מ-:max פריטים',
    ],
    'mimes'                => ':attribute חייב להיות קובץ מסוג :values.',
    'min'                  => [
        'numeric' => ':attribute חייב להיות לפחות :min',
        'file'    => ':attribute חייב להיות לפחות בגודל :min kilobytes.',
        'string'  => ':attribute חייבל הכיל לפחות :min תווים',
        'array'   => ':attribute חייב להכיל לפחות :min פריטים',
    ],
    'not_in'               => ':attribute שנבחר אינו תקין',
    'numeric'              => ':attribute חייב להיות ערך מספרי',
    'regex'                => 'הפורמט של :attribute אינו תקין',
    'required'             => 'השדה :attribute הוא שדה חובה',
    'required_if'          => 'השדה :attribute הוא חובה בתנאי ש-:other שווה ל-:value',
    'required_with'        => ':attribute הוא שדה חובה רק אם :value מופיע',
    'required_with_all'    => ':attribute הוא שדה חובה רק אם :values מופיעים',
    'required_without'     => ':attribute הוא שדה חובה רק אם :value לא מופיע',
    'required_without_all' => ':attribute הוא שדה חובה רק אם :values לא מופיעים',
    'same'                 => ':attribute חייב להתאים ל :other',
    'size'                 => [
        'numeric' => ':attribute חייב להיות :size.',
        'file'    => ':attribute חייב להיות בגודל :size kilobytes.',
        'string'  => ':attribute חייב להכיל :size תווים',
        'array'   => ':attribute חייב להכיל :size פריטים.',
    ],
    'timezone'             => ':attribute חייב להיות אזור זמן תקני',
    'unique'               => 'ה:attribute כבר נמצא בשימוש',
    'url'                  => 'הפורמט של :attribute לא תקין',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'ht-field' => [
            'max' => "You're busted!"
        ],
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => "שם",
        'full-name' => "שם מלא",
        'subject' => 'נושא',
        'email' => "דואר-אלקטרוני",
        'password' => "סיסמא",
        'content ' => 'תוכן'
    ],

];
