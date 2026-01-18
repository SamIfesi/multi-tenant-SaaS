<?php

return [
    'up' => "CREATE TABLE plans (
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(100) NOT NULL,
price DECIMAL(10,2) NOT NULL,
billing_cycle ENUM('monthly','yearly') NOT NULL,
max_users INT,
max_storage_mb INT,
api_rate_limit INT,
created_at DATETIME NOT NULL
) ENGINE=InnoDB;

CREATE TABLE subscriptions (
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
tenant_id BIGINT UNSIGNED NOT NULL,
plan_id BIGINT UNSIGNED NOT NULL,
status ENUM('trial','active','past_due','canceled') NOT NULL,
started_at DATETIME NOT NULL,
ends_at DATETIME NULL,
canceled_at DATETIME NULL,
created_at DATETIME NOT NULL,
KEY idx_tenant_status (tenant_id, status),
CONSTRAINT fk_sub_tenant FOREIGN KEY (tenant_id) REFERENCES tenants(id) ON DELETE CASCADE,
CONSTRAINT fk_sub_plan FOREIGN KEY (plan_id) REFERENCES plans(id) ON DELETE CASCADE
) ENGINE=InnoDB;",
    'down' => "DROP TABLE IF EXISTS subscriptions;
DROP TABLE IF EXISTS plans;"
];
