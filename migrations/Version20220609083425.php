<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609083425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP INDEX UNIQ_97A0ADA3E0F2C01E, ADD INDEX IDX_97A0ADA3E0F2C01E (id_conversation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP INDEX IDX_97A0ADA3E0F2C01E, ADD UNIQUE INDEX UNIQ_97A0ADA3E0F2C01E (id_conversation_id)');
    }
}
