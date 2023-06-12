<?php

declare(strict_types=1);

namespace Migrations;

use Phoenix\Exception\InvalidArgumentValueException;
use Phoenix\Migration\AbstractMigration;

final class CreateGarageTable extends AbstractMigration
{
    /**
     * @throws InvalidArgumentValueException
     */
    protected function up(): void
    {
        $this->table('garage')
            ->addColumn('name','string', ['length' => 75])
            ->addColumn('hourly_price','decimal', ['length' => 10, 'decimals' => 2])
            ->addColumn('email','string', ['length' => 50])
            ->addColumn('coordinates','point')

            ->addColumn('currency_id', 'integer')
            ->addIndex('currency_id')
            ->addForeignKey('currency_id', 'currency', 'id', 'cascade')

            ->addColumn('country_id', 'integer')
            ->addIndex('country_id')
            ->addForeignKey('country_id', 'country', 'id', 'cascade')

            ->addColumn('owner_id', 'integer')
            ->addIndex('owner_id')
            ->addForeignKey('owner_id', 'company', 'id', 'cascade')

            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }

    protected function down(): void
    {
        $this->table('garage')
            ->drop();
    }
}
