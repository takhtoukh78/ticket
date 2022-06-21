<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609100140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ticket_conversation (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, priority VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, Id_panel INT DEFAULT NULL, Id_Ticket INT DEFAULT NULL, Id_Contact INT DEFAULT NULL, Id_Ressource INT DEFAULT NULL, UNIQUE INDEX UNIQ_4A58DA42B55EF069 (Id_panel), UNIQUE INDEX UNIQ_4A58DA4234CA9FDB (Id_Ticket), UNIQUE INDEX UNIQ_4A58DA42121F7504 (Id_Contact), UNIQUE INDEX UNIQ_4A58DA42896AA038 (Id_Ressource), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ticket_conversation ADD CONSTRAINT FK_4A58DA42B55EF069 FOREIGN KEY (Id_panel) REFERENCES panneaux (id_pa)');
        $this->addSql('ALTER TABLE ticket_conversation ADD CONSTRAINT FK_4A58DA4234CA9FDB FOREIGN KEY (Id_Ticket) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE ticket_conversation ADD CONSTRAINT FK_4A58DA42121F7504 FOREIGN KEY (Id_Contact) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE ticket_conversation ADD CONSTRAINT FK_4A58DA42896AA038 FOREIGN KEY (Id_Ressource) REFERENCES resources (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ticket_conversation');
    }
}
