<?php
return [
    'enablePrettyUrl' => true,
    'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        '' => 'site/index',
        'sign-up' => 'site/sign-up',
        'login' => 'site/login',
        'logout' => 'site/logout',
        'request-password-reset' => 'site/request-password-reset',
        'password-reset' => 'site/password-reset',
        'about' => 'site/about',
        'contact' => 'site/contact',
        'captcha' => 'site/captcha',
        'poll/my-polls' => 'poll/index',
        'poll/create' => 'poll/create',
        'poll/<id:\d+>/delete' => 'poll/delete',
        'poll/<id:\d+>' => 'poll/view',
        'poll/<id:\d+>/vote' => 'poll/vote'
    ]
];