<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Простые знакомства',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.user.models.*',
                'application.modules.user.components.*',
                'application.modules.rights.*',
                'application.modules.rights.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'111',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*','::1'),
		),
		'user'=>array(
                        'tableUsers' => 'users',
                        'tableProfiles' => 'profiles',
                        'tableProfileFields' => 'profiles_fields',
                ),
                'rights'=>array(
 
//                    'superuserName'=>'Admin', // Name of the role with super user privileges. 
                   'authenticatedName'=>'Authenticated',  // Name of the authenticated user role. 
                   'userIdColumn'=>'id', // Name of the user id column in the database. 
                   'userNameColumn'=>'username',  // Name of the user name column in the database. 
                   'enableBizRule'=>true,  // Whether to enable authorization item business rules. 
                   'enableBizRuleData'=>true,   // Whether to enable data for business rules. 
                   'displayDescription'=>true,  // Whether to use item description instead of name. 
                   'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 
                   'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 
                  
                   'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested. 
                   'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights. 
                   'appLayout'=>'application.views.layouts.main', // Application layout. 
                   'cssFile'=>'rights.css', // Style sheet file to use for Rights. 
                   'install'=>false,  // Whether to enable installer. 
                   'debug'=>false, 
                ),
	),

	// application components
	'components'=>array(

		'user'=>array(
                        'class'=>'RWebUser',
                        // enable cookie-based authentication
                        'allowAutoLogin'=>true,
                        'loginUrl'=>array('/user/login'),
                ),
                'authManager'=>array(
                    'class'=>'RDbAuthManager',
                    'connectionID'=>'db',
                    'itemTable'=>'authitem',
                    'itemChildTable'=>'authitemchild',
                    'assignmentTable'=>'authassignment',
                    'rightsTable'=>'rights',
                      'defaultRoles'=>array('Guest'), 
                ),

		'urlManager'=>array(
                        'caseSensitive'=>true,
			'urlFormat'=>'path',
                        'showScriptName' => false,
                        'urlSuffix' => '',
                        'useStrictParsing' => true,
			'rules'=>array(
                                '' => 'site/index',
                                'rights' => 'rights/assignment',
                                '<action>' => 'site/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),


		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		/*'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),*/

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);


