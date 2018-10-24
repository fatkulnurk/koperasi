<?php
class DatabaseSettings
{
    // Database variables
    var $settings;

    function getSettings()
    {
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