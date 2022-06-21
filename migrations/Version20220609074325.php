<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609074325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket ADD id_conversation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3E0F2C01E FOREIGN KEY (id_conversation_id) REFERENCES ticket_conv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_97A0ADA3E0F2C01E ON ticket (id_conversation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3E0F2C01E');
        $this->addSql('DROP INDEX UNIQ_97A0ADA3E0F2C01E ON ticket');
        $this->addSql('ALTER TABLE ticket DROP id_conversation_id');
    }
}
