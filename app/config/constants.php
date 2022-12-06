<?php

    #################################################
	##             THIRD-PARTY APPS                ##
    #################################################

    define('DEFAULT_REPLY_TO' , '');

    const ITEXMO = [
        'key' => 'ST-MARKG387451_V6YZ8',
        'pwd' => '(7]8bu4]ja'
    ];

    #################################################
	##             EXTENDED APPS                   ##
	#################################################
	const APP_EXTENSIONS = [
		'cxbook' => [
			'base_controller' => 'Accounts',
			'base_method'     => 'index'
        ]
    ];

    define('APP_EXTENSIONS_PATH' , APPROOT.DS.'softwares');

	#################################################
	##             SYSTEM CONFIG                ##
    #################################################


    define('GLOBALS' , APPROOT.DS.'classes/globals');
    define('SITE_NAME' , 'vitalcare.sbs');
    define('COMPANY_NAME' , 'Big Days');
    define('KEY_WORDS' , 'Event Management');
    define('DESCRIPTION' , 'Event Management');
    define('AUTHOR' , SITE_NAME);


    define('GLOBAL_VAR', [
        'categories' => include_once(APPROOT.DS.'assets/categories.php'),
        'events' => include_once(APPROOT.DS.'assets/events.php'),
        'package_group' => include_once(APPROOT.DS.'assets/package_group.php'),
        'packages' => include_once(APPROOT.DS.'assets/packages.php'),
        'packageGroupKeys' => [
            'main_dish' => 'Main Dish',
            'vegetable_dish' => 'Vegetable Dish',
            'desert_dish' => 'Dessert Dish',
            'cake_dish' => 'Cake Dish',
            'souvenirs' => 'Souvenirs',
        ]
    ]);
    
    const MAILER_AUTH = [
        'username' => 'cx@evtrsv.xyz',
        'password' => 'q,U2J[$ilT4M',
        'host'     => 'evtrsv.xyz',
        'name'     => COMPANY_NAME,
        'replyTo'  => 'cx@evtrsv.xyz',
        'replyToName' => 'doNotReply'
    ];
?>