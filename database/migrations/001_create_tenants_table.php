<?php

return [
    'up' => "
        CREATE TABLE tenants (
            id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(150) NOT NULL,
            slug VARCHAR(100) NOT NULL,
            status ENUM('active','suspended') NOT NULL DEFAULT 'active',
            plan_id BIGINT UNSIGNED,
            created_at DATETIME NOT NULL,
            updated_at DATETIME NULL,
            deleted_at DATETIME NULL,
            UNIQUE KEY uniq_slug (slug),
            KEY idx_plan (plan_id)
) ENGINE=InnoDB;
    ",
    'down' => "
        DROP TABLE IF EXISTS tenants;
    "
];
