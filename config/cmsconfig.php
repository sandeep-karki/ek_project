<?php
return [
    //List of modules are defined here
    'modules' => [
        'home' => "Admin Dashboard",
        'user' => "User Management",
        'log' => 'Log Management',
        'language' => 'Languages',
        'config'  => 'System Config',
		'templates' => 'Page Templates',
		'news' => 'News',
		'page' => 'Pages',
    ],
    //Module sub modules contains here
    'modulepages' =>  [
        'home'    =>  ['home' => 'Admin Dashboard'],
		'config' => ['settings' => 'Settings', 'email' => 'Email Template'],
		'user' => ['role' => 'Roles', 'user' => 'Users'],
		'audit' => ['audit' => 'Audit Log'],
		'log' => ['log' => 'Log Management','login_logs'=>'Login Logs'],
		'language' => ['langcategory' => 'Category', 'languages' => 'Languages', 'words' => 'Words', 'translation' => 'Translation'],
		'templates' => ['list' => 'List View', 'form' => 'Form View'],
		'news' => ['news' => 'newslist'],
		'page' => ['page' => 'pagelist'],
	],
	//Permissions for each module is defined here
	'modulepermissions' => [
		'config' => [
			//Settings Sub Module
			'config.settings.index' => 'View Settings',
            'config.settings.create' => 'Create Custom Settings',
            'config.settings.edit' => 'Edit Custom Settings',
            'config.settings.destroy' => 'Delete Custom Settings',

			'config.email.edit' => 'Edit Email',
            'config.email.index' => 'View Email',
            'config.email.destroy' => 'Delete Email',

			'config.notification.index' => 'View Push Notification',

			'config.pages.index' => 'View Page Management',
			'config.pages.create' => 'Create Page',
			'config.pages.edit' => 'Edit Page',
			'config.pages.destroy' => 'Delete Page',

			'config.language.index' => 'Language Translation View',

		],
		'user' => [
			//Roles Sub Module
			'user.role.index' => 'View Roles',
			'user.role.create' => 'Create Roles',
			'user.role.edit' => 'Edit Roles',
			'user.role.delete' => 'Delete Roles',
			//Users Sub Module
			'user.user.index' => 'View Users',
			'user.user.create' => 'Create Users',
			'user.user.edit' => 'Edit Users',
			'user.user.destroy' => 'Delete Users',

			'user.user.profile' => 'Change Personal Profile',

		],

		'language' => [

			'language.langcategory.index' => 'View Language Category',
			'language.langcategory.create' => 'Create Language Category',
			'language.langcategory.edit' => 'Edit Language Category',
			'language.langcategory.delete' => 'Delete Language Category',

			'language.languages.index' => 'View Languages',
			'language.languages.create' => 'Create Languages',
			'language.languages.edit' => 'Edit Languages',
			'language.languages.delete' => 'Delete Languages',

			'language.words.index' => 'View Words',
			'language.words.create' => 'Create Words',
			'language.words.edit' => 'Edit Words',
			'language.words.delete' => 'Delete Words',

			'language.translation.index' => 'View Translation',
		],

		'audit' => [
			'audit.audit.index' => 'Audit Log View',
		],
		'log' => [
			'log.log.index' => 'Log View',
			'log.log.delete' => 'Delete Log',
            'log.loginLog.index' => 'Cms log tracker view',
		],
		'templates' => [
			'templates.list.index' => 'List View',
			'templates.form.index' => 'Form View',
		],
		'news' => [
			'news.news.index' => 'View news',
			'news.news.create' => 'Create news',
			'news.news.edit' => 'Edit news',
			'news.news.delete' => 'Delete news',
		],
		'page' => [
			'page.page.index' => 'View page',
			'page.page.create' => 'Create page',
			'page.page.edit' => 'Edit page',
			'page.page.delete' => 'Delete page',
 		],
		
	],
	//Permissions for each module is defined hereGallery
	//Icons for eash modules is defined here
	'moduleicons' => [
		'home' => 'icon-home',
		'user' => 'icon-users',
		'config' => 'icon-gear',
		'log' => 'icon-list-alt',
		'templates' => 'icon-file-o',
		'curl' => 'icon-th-large',
		'audit' => 'icon-database',
		'language' => 'icon-language',
		'news' => 'icon-list-alt',
		'page' => 'icon-file-o',
	],
	//Icons for eash modules is defined here
	'cmsTitle' => 'Ekcms 5.5', //Cms Title
	'logotitle' => 'Ekbana', // Logo title
];
