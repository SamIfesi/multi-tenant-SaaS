<?php

return [
    'up' => "CREATE TABLE invoices (
id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
tenant_id BIGINT UNSIGNED NOT NULL,
subscription_id BIGINT UNSIGNED NOT NULL,
amount DECIMAL(10,2) NOT NULL,
status ENUM('pending','paid','failed') NOT NULL,
pdf_path VARCHAR(255),
issued_at DATETIME NOT NULL,
due_at DATETIME NOT NULL,
created_at DATETIME NOT NULL,
KEY idx_invoice (tenant_id, status),
CONSTRAINT fk_invoice_tenant FOREIGN KEY (tenant_id) REFERENCES tenants(id)
) ENGINE=InnoDB;",
    'down' => "
        DROP TABLE IF EXISTS invoices;"
];
