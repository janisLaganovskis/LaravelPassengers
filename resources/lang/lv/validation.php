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

    'accepted'             => 'The :attribute ir jāpieņem.',
    'active_url'           => 'The :attribute nav derīgs URL.',
    'after'                => 'The :attribute jābūt datumam pēc :date.',
    'after_or_equal'       => 'The :attribute jābūt datumam pēc vai vienāds ar :date.',
    'alpha'                => 'The :attribute var būt tikai burti.',
    'alpha_dash'           => 'The :attribute var būt tikai burtu, ciparu un domuzīmes.',
    'alpha_num'            => 'The :attribute var būt tikai burti un cipari.',
    'array'                => 'The :attribute jābūt masīvam.',
    'before'               => 'The :attribute jābūt datumam pirms :date.',
    'before_or_equal'      => 'The :attribute jābūt datumam pirms vai vienāds ar :date.',
    'between'              => [
        'numeric' => 'The :attribute jābūt starp :min un :max.',
        'file'    => 'The :attribute jābūt starp :min un :max kilobytes.',
        'string'  => 'The :attribute jābūt starp :min un :max characters.',
        'array'   => 'The :attribute jābūt starp :min un :max items.',
    ],
    'boolean'              => 'The :attribute laukam jābūt patiesam vai nepatiesam.',
    'confirmed'            => 'The :attribute apstiprinājums neatbilst.',
    'date'                 => 'The :attribute nav derīgs datums.',
    'date_format'          => 'The :attribute neatbilst formātam :format.',
    'different'            => 'The :attribute un :other jābūt atšķirīgam.',
    'digits'               => 'The :attribute ir jābūt :digits cipari.',
    'digits_between'       => 'The :attribute ir jābūt starp :min un :max cipari.',
    'dimensions'           => 'The :attribute ir nederīgi attēla izmēri.',
    'distinct'             => 'The :attribute laukam ir dublikāta vērtība.',
    'email'                => 'The :attribute Jābūt derīga e-pasta adrese.',
    'exists'               => 'The atlasīts :attribute nav derīgs.',
    'file'                 => 'The :attribute jābūt failam.',
    'filled'               => 'The :attribute laukam ir jābūt vērtībai.',
    'image'                => 'The :attribute jābūt attēlam.',
    'in'                   => 'The atlasīts :attribute nav derīgs.',
    'in_array'             => 'The :attribute lauks neeksistē :other.',
    'integer'              => 'The :attribute jābūt veselam skaitlim.',
    'ip'                   => 'The :attribute jābūt deramai IP adresei.',
    'ipv4'                 => 'The :attribute jābūt deramai IPv4 adresei.',
    'ipv6'                 => 'The :attribute jābūt deramai IPv6 adresei.',
    'json'                 => 'The :attribute jābūt derīgai JSON virknei.',
    'max'                  => [
        'numeric' => 'The :attribute nedrīkst būt lielāks par :max.',
        'file'    => 'The :attribute nedrīkst būt lielāks par :max kilobytes.',
        'string'  => 'The :attribute nedrīkst būt lielāks par :max characters.',
        'array'   => 'The :attribute var būt ne vairāk kā :max priekšmeti.',
    ],
    'mimes'                => 'The :attribute jābūt faila tipam: :values.',
    'mimetypes'            => 'The :attribute jābūt faila tipam: :values.',
    'min'                  => [
        'numeric' => 'The :attribute jābūt vismaz :min.',
        'file'    => 'The :attribute jābūt vismaz :min kilobytes.',
        'string'  => 'The :attribute jābūt vismaz :min characters.',
        'array'   => 'The :attribute jābūt vismaz :min items.',
    ],
    'not_in'               => 'The atlasīts :attribute nav derīgs.',
    'numeric'              => 'The :attribute jābūt skaitlim.',
    'present'              => 'The :attribute laukam jābūt klāt.',
    'regex'                => 'The :attribute formāts nav derīgs.',
    'required'             => 'The :attribute lauks ir vajadzīgs.',
    'required_if'          => 'The :attribute lauks ir nepieciešams, kad :other ir :value.',
    'required_unless'      => 'The :attribute lauks ir nepieciešams, ja vien :other ir in :values.',
    'required_with'        => 'The :attribute lauks ir nepieciešams, kad :values ir present.',
    'required_with_all'    => 'The :attribute lauks ir nepieciešams, kad  :values ir present.',
    'required_without'     => 'The :attribute lauks ir nepieciešams, kad  :values nav present.',
    'required_without_all' => 'The :attribute lauks ir nepieciešams, kad neivena no :values ir klāt.',
    'same'                 => 'The :attribute un :other ir jāsakrīt.',
    'size'                 => [
        'numeric' => 'The :attribute jābūt :size.',
        'file'    => 'The :attribute jābūt :size kilobytes.',
        'string'  => 'The :attribute jābūt :size characters.',
        'array'   => 'The :attribute jāiekļauj :size items.',
    ],
    'string'               => 'The :attribute jābūt virknei.',
    'timezone'             => 'The :attribute jābūt derīgai zonai.',
    'unique'               => 'The :attribute jau ir pieņemts.',
    'uploaded'             => 'The :attribute neizdevās augšupielādēt.',
    'url'                  => 'The :attribute formāts nav derīgs.',

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

    'attributes' => [],

];
