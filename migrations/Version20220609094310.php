<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609094310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket_conversation ADD id_ticket INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket_conversation ADD CONSTRAINT FK_4A58DA42B197184E FOREIGN KEY (id_ticket) REFERENCES ticket (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A58DA42B197184E ON ticket_conversation (id_ticket)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket_conversation DROP FOREIGN KEY FK_4A58DA42B197184E');
        $this->addSql('DROP INDEX UNIQ_4A58DA42B197184E ON ticket_conversation');
        $this->addSql('ALTER TABLE ticket_conversation DROP id_ticket');
    }
}
