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
                        'image' => 'sweet and sour fish filet-modified.png'
                    ],
                    [
                        'name' => 'Beef Steak',
                        'image' => 'beef steak.jpg'
                    ],
                    [
                        'name' => 'Chicken Adobo',
                        'image' => 'chicken adobo.jpg'
                    ],

                    [
                        'name' => 'Pork Adobo',
                        'image' => 'pork adobo.jpg'
                    ],

                    [
                        'name' => 'Beef Caldereta',
                        'image' => 'beef kaldereta-modified.png'
                    ],

                    [
                        'name' => 'Beef Brocoli',
                        'image' => 'beef broccoli-modified.png'
                    ]
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
                        'image' => 'chopsuey.jpg'
                    ],
                    [
                        'name' => 'Buttered Mixed -Vegetable with Quail Eggs',
                        'image' => 'Vegetable with Quail Eggs.jpg'
                    ], 
                    [
                        'name' => 'Eggplant Ensalda',
                        'image' => 'Eggplant Ensalada-modified.png'
                    ],
                    [
                        'name' => 'Braised Vegetable',
                        'image' => 'Braised Vegetables-modified.png'
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
                'name' => 'Dessert',
                'items' => [
                    'Fruit Salad',
                    'Coffee Jelly',
                    'Buko Pandan',
                    'Mango Sago Delight',
                    'Sliced Fruits'
                ],
                'rules' => [
                    'basic_package' => 1,
                    'standard_package' => 2,
                    'premium_package' => 3,
                ]
            ],
            'cake_dish' => [
                'name' => 'Cake and Cupcake Flavor',
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