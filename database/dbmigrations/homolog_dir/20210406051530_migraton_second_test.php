<?php

namespace HomologDir;

use Phoenix\Migration\AbstractMigration;

class MigratonSecondTest extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('CREATE TABLE `second_table` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `url` varchar(255) NOT NULL,
            `sorting` int(11) NOT NULL,
            `created_at` datetime NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `idx_second_table_url` (`url`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;'
        );
    }

    protected function down(): void
    {
        $this->table('second_table')
        ->drop();
    }
}
