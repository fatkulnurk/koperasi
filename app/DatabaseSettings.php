<?php
class DatabaseSettings
{
    var $settings;
    function getSettings()
    {
        // Database variables
        // Host name
        $settings['dbhost']     = 'localhost';
        // Database name
        $settings['dbname']     = 'koperasi';
        // Username
        $settings['dbusername'] = 'root';
        // Password
        $settings['dbpassword'] = '';

        return $settings;
    }
}