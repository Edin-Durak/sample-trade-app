<?php

if (php_sapi_name() !== 'cli') {
    die('This script can be started via terminal only!');
}

require __DIR__ . '/../variables/variables.php';

$charset = $config['database']['charset'];

$db->querry("
    CREATE TABLE IF NOT EXISTS `role` (
        `id` int NOT NULL AUTO_INCREMENT,
        `role_name` varchar(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET={$charset}
");

$db->querry("
    CREATE TABLE IF NOT EXISTS `users` (
        `id` int NOT NULL AUTO_INCREMENT,
        `first_name` varchar(255) NOT NULL,
        `last_name` varchar(255) DEFAULT NULL,
        `email_address` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL DEFAULT 'admin',
        `is_active` tinyint DEFAULT 0,
        `role_id` int NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `fk_users_role_id` (`role_id`),
        CONSTRAINT `fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET={$charset}
");

$db->querry("
CREATE TABLE IF NOT EXISTS `parameters` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `short_code` VARCHAR(8) NOT NULL,
  `description` TEXT NULL,
  `measurement_unit` VARCHAR(32) NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  `minimum` DECIMAL(12,4) NULL,
  `maximum` DECIMAL(12,4) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_parameters_short_code` (`short_code`),
  UNIQUE KEY `uq_parameters_name` (`name`),
  CONSTRAINT `chk_parameters_short_code`
    CHECK (`short_code` REGEXP '^[A-Z0-9]{2,8}$'),
  CONSTRAINT `chk_parameters_limits`
    CHECK (
      `minimum` IS NULL
      OR `maximum` IS NULL
      OR `minimum` < `maximum`
    )
) ENGINE=InnoDB DEFAULT CHARSET={$charset};");

$adminRole = $db->querry('SELECT id FROM role WHERE id = 1')->find();

if (!$adminRole) {
    $db->querry('INSERT INTO role (id, role_name) VALUES (1, :role_name)', [
        'role_name' => 'admin',
    ]);
}

$technicianRole = $db->querry('SELECT id FROM role WHERE id = 2')->find();

if (!$technicianRole) {
    $db->querry('INSERT INTO role (id, role_name) VALUES (2, :role_name)', [
        'role_name' => 'technician',
    ]);
}

$user = $db->querry('SELECT id FROM users WHERE email_address = :email', [
    'email' => 'admin@admin.com',
])->find();

if (!$user) {
    $db->querry(
        'INSERT INTO users (first_name, email_address, password, is_active, role_id)
         VALUES (:first_name, :email, :password, :is_active, :role_id)',
        [
            'first_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'is_active' => 1,
            'role_id' => 1,
        ]
    );
}

echo 'role and users tables are created and default admin user is created. parameters table is created.' . PHP_EOL;