<?php

namespace Config;

class BaseConfig
{
    public static  array $config = [
        'App_version' => '0.0.1',
        'App_name' => 'Kunden und Mitarbeiterverwaltung',
        'App_autor' => 'Keven Clausen',
        'App_year' => '2023',
        'root_dir' => '/',
        'default_action' => 'index',
        'default_site_title' => 'Sharehop GmbH',
        'default_site_header' => 'header',
        'default_site_navigation' => 'navigation',
        'default_site_message' => 'message',
        'Database_Host' => 'ddev-sharehop-db:3306',
        'Database_User' => 'root',
        'Database_Password' => 'root',
        'Database_Name' => 'sharehop'
    ];
}