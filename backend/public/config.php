<?php
    $config = array(
        'driver'    => 'mysql', // Db driver
        'host'      => 'localhost',
        'database'  => 'gocodeop_guyana2016',
        'username'  => 'gocodeop_hack',
        'password'  => ';GiON;]F8JU^',
        // 'charset'   => 'utf8', // Optional
        // 'collation' => 'utf8_unicode_ci', // Optional
        // 'prefix'    => 'cb_', // Table prefix, optional
        'options'   => array( // PDO constructor options, optional
            PDO::ATTR_TIMEOUT => 5,
            PDO::ATTR_EMULATE_PREPARES => false,
        ),
    );
    // make the connection
    new \Pixie\Connection('mysql', $config, 'DB');
?>