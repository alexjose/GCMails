<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model
    'import' => array(
        'application.models.*',
    ),
    // application components
    'components' => array(
        'Smtpmail' => array(
            'class' => 'application.extensions.smtpmail.PHPMailer',
            'Host' => "smtp.gmail.com",
            'Username' => 'test@yourdomain.com',
            'Password' => 'test',
            'Mailer' => 'smtp',
            'Port' => 26,
            'SMTPAuth' => true,
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=GCMails',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
);
