<?php

declare(strict_types=1);

namespace Migrations;

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateCurrencyTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('currency')
            ->addColumn('name','string', ['length' => 30])
            ->addColumn('symbol','string', ['length' => 5])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }

    protected function down(): void
    {
        $this->table('currency')
            ->drop();
    }
}
