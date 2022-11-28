<?php 
    return [
        'catering' => [
            'main_dish' => [
                'name' => 'Main Dish',
                'items' => [
                    [
                        'name' => 'Roast beef with mashed potato',
                        'image' => 'roast_beef_with_mashed_potato.jpg'
                    ],
                    [
                        'name' => 'Buttered garlic chicken',
                        'image' => 'Buttered garlic chicken.jpg'
                    ],
                    [
                        'name' => 'Chicken teriyaki',
                        'image' => 'Chicken teriyaki.jpg'
                    ],
                    [
                        'name' => 'Pork tonkatsu',
                        'image' => 'pork tonkatsu.jpg'
                    ],
                    [
                        'name' => 'Pork hamonado',
                        'image' => 'pork hamonado.jpg'
                    ],
                    [
                        'name' => 'Fish filet with lemon butter sauce',
                        'image' => 'Fish filet with lemon butter sauce.jpg'
                    ],
                    [
                        'name' => 'sweet and sour fish filet',
                        'image' => 'beef broccoli.jpg'
                    ],
                    [
                        'name' => 'Beef Steak',
                        'image' => 'beef steak.jpg'
                    ],
                    [
                        'name' => 'Chicken Adobo',
                        'image' => 'chicken adobo.jpg'
                    ],
                ],
                'rules' => [
                    'basic_package' => 2,
                    'standard_package' => 4,
                    'premium_package' => 6,
                ]
            ],
    
            'vegetable_dish' => [
                'name' => 'Vegatable Dish',
                'items' => [
                    [
                        'name' => 'Buttered Corn and Carrots',
                        'image' => 'Buttered Corn and Carrots.jpg'
                    ],
                    [
                        'name' => 'Stir Fried Mixed Vegetable',
                        'image' => 'Stir Fried Mixed Vegetable.jpg'
                    ],
                    [
                        'name' => 'Chopsuey',
                        'image' => 'Stir Fried Mixed Vegetable.jpg'
                    ],
                    [
                        'name' => 'Buttered Mixed -Vegetable with Quail Eggs',
                        'image' => 'Vegetable with Quail Eggs.jpg'
                    ]
                ],
                'rules' => [
                    'basic_package' => 1,
                    'standard_package' => 2,
                    'premium_package' => 3,
                ]
            ],
        ],

        'secondary' => [
            'desert_dish' => [
                'name' => 'Desert Dish',
                'items' => [
                    'Fruit Salad',
                    'Coffee Jelly',
                    'Buko Pandan',
                    'Mango Sago Delight'
                ],
                'rules' => [
                    'basic_package' => 1,
                    'standard_package' => 2,
                    'premium_package' => 3,
                ]
            ],
            'cake_dish' => [
                'name' => 'Cake Dish',
                'items' => [
                    'Chocolate',
                    'Vanilla',
                    'Red Velvet',
                    'Mocha'
                ]
            ],
            'souvenirs' => [
                'name' => 'Souvenirs',
                'items' => [
                    'Mug',
                    'Keychain',
                    'Refrigerator Magnet'
                ]
            ]
        ]
    ];
?>