<?php

return [
    'up' => "CREATE TABLE audit_logs (
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
tenant_id BIGINT UNSIGNED NOT NULL,
user_id BIGINT UNSIGNED,
action VARCHAR(150) NOT NULL,
metadata JSON,
created_at DATETIME NOT NULL,
KEY idx_audit (tenant_id, created_at)
) ENGINE=InnoDB;",
    'down' => "
        DROP TABLE IF EXISTS audit_logs;"
];
