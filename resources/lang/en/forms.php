<?php

return [

    'confirm_password' => 'Confirm Password',
    'current_password' => 'Current Password',
    'email_address'    => 'Email Address',
    'email'            => 'Email',
    'name'             => 'Name',
    'new_password'     => 'New Password',
    'password'         => 'Password',
    'username'         => 'Username',
    'code'             => 'Code',
    'recovery_code'    => 'Recovery Code',

    'update_password' => [
        'requirements_notice' => 'Password must be 12–128 characters, and include a number, a symbol, a lower and an upper case letter.',
    ],

    'password_rules' => [
        'needs_lowercase'         => 'One lowercase character',
        'needs_uppercase'         => 'One uppercase character',
        'needs_numeric'           => 'One number',
        'needs_special_character' => 'One special character',
        'needs_minimum_length'    => '12 characters minumum',
    ],

    'delete-user' => [
        'title'        => 'Delete Account',
        'description'  => 'Permanently delete your account.',
        'content'      => 'Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.',
        'confirmation' => 'Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.',
    ],

    'logout-sessions' => [
        'title'          => 'Browser Sessions',
        'description'    => 'Manage and logout your active sessions on other browsers and devices.',
        'content'        => 'If necessary, you may logout of all of your other browser sessions across all of your devices. If you feel your account has been compromised, you should also update your password',
        'confirm_logout' => 'Logout Other Browser Sessions',
    ],

    'confirming-logout' => [
        'title'          => 'Logout Other Browser Sessions',
        'content'        => 'Please enter your password to confirm you would like to logout of your other browser sessions across all of your devices.',
    ],
];
