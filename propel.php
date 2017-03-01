<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'test2' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=test2',
                    'user'       => 'root',
                    'password'   => '',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'test2',
            'connections' => ['test2']
        ],
        'generator' => [
            'defaultConnection' => 'test2',
            'connections' => ['test2']
        ]
    ]
];

?>