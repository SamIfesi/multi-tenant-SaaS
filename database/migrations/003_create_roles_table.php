<?php

return [
    'up' => "CREATE TABLE roles (
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
tenant_id BIGINT UNSIGNED NOT NULL,
name VARCHAR(50) NOT NULL,
created_at DATETIME NOT NULL,
UNIQUE KEY uniq_role (tenant_id, name),
FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE user_roles (
user_id BIGINT UNSIGNED NOT NULL,
role_id BIGINT UNSIGNED NOT NULL,
PRIMARY KEY (user_id, role_id),
FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
) ENGINE=InnoDB;",
    'down' => "DROP TABLE IF EXISTS user_roles;
DROP TABLE IF EXISTS roles;"
];
