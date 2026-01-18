<?php

return [
    'up' => "
        CREATE TABLE users (
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
tenant_id BIGINT UNSIGNED NOT NULL,
email VARCHAR(190) NOT NULL,
password VARCHAR(255) NOT NULL,
status ENUM('active','disabled') NOT NULL DEFAULT 'active',
created_at DATETIME NOT NULL,
updated_at DATETIME NULL,
deleted_at DATETIME NULL,
UNIQUE KEY uniq_tenant_email (tenant_id, email),
KEY idx_tenant (tenant_id),
CONSTRAINT fk_users_tenant FOREIGN KEY (tenant_id) REFERENCES tenants(id)
) ENGINE=InnoDB;
    ",
    'down' => "
        DROP TABLE IF EXISTS users;
    "
];
