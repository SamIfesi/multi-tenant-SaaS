<?php

return [
    'up' => "CREATE TABLE usage_records (
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
tenant_id BIGINT UNSIGNED NOT NULL,
metric ENUM('api_calls','storage_mb','users') NOT NULL,
quantity INT NOT NULL,
recorded_at DATETIME NOT NULL,
KEY idx_usage (tenant_id, metric, recorded_at)
) ENGINE=InnoDB;",
    'down' => "
        DROP TABLE IF EXISTS usage_records;"
];
