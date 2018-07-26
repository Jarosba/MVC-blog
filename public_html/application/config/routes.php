<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'main/index/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'about' => [
		'controller' => 'main',
		'action' => 'about',
	],
	'help' => [
		'controller' => 'main',
		'action' => 'help',
	],
	'post/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'post',
	],
	// AdminController
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],
	'admin/delete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
	'admin/posts/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'posts',
	],
	'admin/posts' => [
		'controller' => 'admin',
		'action' => 'posts',
	],
    // AccountController
    'account/signin' => [
        'controller' => 'account',
        'action' => 'signin',
    ],
    'account/signup' => [
        'controller' => 'account',
        'action' => 'signup',
    ],

    'account/add' => [
        'controller' => 'account',
        'action' => 'add',
    ],

    'account/posts' => [
        'controller' => 'account',
        'action' => 'posts',
    ],

    'account/profile' => [
        'controller' => 'account',
        'action' => 'profile',
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',]
];