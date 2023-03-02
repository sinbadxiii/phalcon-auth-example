<?php

use App\Ship\Module;

return [
    'front' => [
        'className' => App\Front\Module::class,
        'path'      => '../src/Front/Module.php'
    ],
    'admin' => [
        'className' => App\Admin\Module::class,
        'path'      => '../src/Admin/Module.php',
        'scope'     => 'private'
    ],
    'crm' => [
        'className' => App\Crm\Module::class,
        'path'      => '../src/Crm/Module.php',
        'scope'     => 'private'
    ],
    'ship' => [
        'className' => Module::class,
        'path'      => '../src/Ship/Module.php',
        'scope'     => 'private'
    ],
    'cms' => [
        'className' => App\Cms\Module::class,
        'path'      => '../src/Cms/Module.php',
        'scope'     => 'private'
    ],
    'worktime' => [
        'className' => App\Containers\Worktime\Module::class,
        'path'      => '../src/Containers/Worktime/Module.php',
        'scope'     => 'private'
    ]
];