<?php
return [
    'cash'  => [
        'code'        => 'cash',
        'title'       => 'Cash',
        'description' => 'Cash payment method',
        'class'       => 'Modules\Payments\App\Payments\Cash',
        'active'      => true,
        'sort'        => 1,
    ],

    'transfer'  => [
        'code'        => 'transfer',
        'title'       => 'Transfer',
        'description' => 'Bank wire payment method',
        'class'       => 'Modules\Payments\App\Payments\Transfer',
        'active'      => true,
        'sort'        => 2,
    ],
];
