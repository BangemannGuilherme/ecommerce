<?php

use Phoenix\Migration\AbstractMigration;

class NewMigrationTest extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('CREATE TABLE `test_table` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `url` varchar(255) NOT NULL,
            `sorting` int(11) NOT NULL,
            `created_at` datetime NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `idx_test_table_url` (`url`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;'
        );
    }

    protected function down(): void
    {
        $this->table('test_table')
        ->drop();
    }
}
