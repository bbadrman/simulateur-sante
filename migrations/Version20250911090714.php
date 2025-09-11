<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250911090714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sante ADD date1 VARCHAR(255) DEFAULT NULL, ADD date2 VARCHAR(255) DEFAULT NULL, ADD date3 VARCHAR(255) DEFAULT NULL, ADD date4 VARCHAR(255) DEFAULT NULL, CHANGE brithdate brithdate DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sante DROP date1, DROP date2, DROP date3, DROP date4, CHANGE brithdate brithdate VARCHAR(255) DEFAULT NULL');
    }
}
