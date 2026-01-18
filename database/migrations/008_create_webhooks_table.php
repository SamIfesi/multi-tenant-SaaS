<?php

return [
    'up' => "CREATE TABLE webhooks (
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
tenant_id BIGINT UNSIGNED NOT NULL,
event VARCHAR(100) NOT NULL,
payload JSON NOT NULL,
delivered_at DATETIME NULL,
attempts INT DEFAULT 0,
created_at DATETIME NOT NULL,
KEY idx_webhook_retry (delivered_at, attempts),
CONSTRAINT fk_webhook_tenant FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE
) ENGINE=InnoDB;",
    'down' => "DROP TABLE IF EXISTS webhooks;"
];
