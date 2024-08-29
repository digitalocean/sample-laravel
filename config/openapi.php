<?php

return [

    'collections' => [

        'default' => [

            'info' => [
                'title' => config('app.name'),
                'description' => null,
                'version' => '1.0.1',
                'contact' => [],
            ],

            'servers' => [
                [
                    'url' => env('APP_URL'),
                    'description' => null,
                    'variables' => [],
                ],

                [
                    'url' => 'https://orca-app-hoihb.ondigitalocean.app/api/',
                    'description' => "Live server temporary address" ,
                    'variables' => [],
                ],
            ],

            'tags' => [

                [
                   'name' => 'accounts',
                   'description' => 'Application accounts',
                ],
                [
                    'name' => 'Kiosk',
                    'description' => 'All kiosk registerd with Homechow',
                ],
                [
                    'name' => 'Orders',
                    'description' => 'Orders with Homechow',
                ],
                [
                    'name' => 'Meals',
                    'description' => 'Orders with Homechow',
                ],
                [
                    'name' => 'Payment Transaction',
                    'description' => 'Application customer & franchisee payment processing',
                ],
                [
                    'name' => 'Wallet Transaction',
                    'description' => 'Application customer & franchisee wallet processing',
                ],

                [
                    'name' => 'Restock Transactions',
                    'description' => 'Application restocking of kiosk transactions',
                ],

                [
                    'name' => 'Faq',
                    'description' => 'Faq for kiosk and consumers',
                ],
                

            ],

            'security' => [
                // GoldSpecDigital\ObjectOrientedOAS\Objects\SecurityRequirement::create()->securityScheme('JWT'),
            ],

            // Non standard attributes used by code/doc generation tools can be added here
            'extensions' => [
                // 'x-tagGroups' => [
                //     [
                //         'name' => 'General',
                //         'tags' => [
                //             'user',
                //         ],
                //     ],
                // ],
            ],

            // Route for exposing specification.
            // Leave uri null to disable.
            'route' => [
                'uri' => '/openapi',
                'middleware' => [],
            ],

            // Register custom middlewares for different objects.
            'middlewares' => [
                'paths' => [
                    //
                ],
                'components' => [
                    //
                ],
            ],

        ],

    ],

    // Directories to use for locating OpenAPI object definitions.
    'locations' => [
        'callbacks' => [
            app_path('OpenApi/Callbacks'),
        ],

        'request_bodies' => [
            app_path('OpenApi/RequestBodies'),
        ],

        'responses' => [
            app_path('OpenApi/Responses'),
        ],

        'schemas' => [
            app_path('OpenApi/Schemas'),
        ],

        'security_schemes' => [
            app_path('OpenApi/SecuritySchemes'),
        ],
    ],

];
