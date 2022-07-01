<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220629080031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3B55EF069');
        $this->addSql('DROP INDEX UNIQ_97A0ADA3B55EF069 ON ticket');
        $this->addSql('ALTER TABLE ticket CHANGE Id_panel Id_pan INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3E4544A97 FOREIGN KEY (Id_pan) REFERENCES panneaux (id_pa)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_97A0ADA3E4544A97 ON ticket (Id_pan)');
        $this->addSql('DROP INDEX UNIQ_4A58DA42896AA038 ON ticket_conversation');
        $this->addSql('DROP INDEX UNIQ_4A58DA4234CA9FDB ON ticket_conversation');
        $this->addSql('DROP INDEX UNIQ_4A58DA42B55EF069 ON ticket_conversation');
        $this->addSql('DROP INDEX UNIQ_4A58DA42121F7504 ON ticket_conversation');
        $this->addSql('ALTER TABLE ticket_conversation CHANGE title title VARCHAR(255) NOT NULL, CHANGE state state VARCHAR(255) NOT NULL, CHANGE priority priority VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE date_creation date_creation DATE NOT NULL');
        $this->addSql('ALTER TABLE ticket_conversation ADD CONSTRAINT FK_4A58DA42B55EF069 FOREIGN KEY (Id_panel) REFERENCES panneaux (id_pa)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A58DA42896AA038 ON ticket_conversation (Id_Ressource)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A58DA4234CA9FDB ON ticket_conversation (Id_Ticket)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A58DA42B55EF069 ON ticket_conversation (Id_panel)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A58DA42121F7504 ON ticket_conversation (Id_Contact)');
        $this->addSql('ALTER TABLE user CHANGE date_embauche date_embauche DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3E4544A97');
        $this->addSql('DROP INDEX UNIQ_97A0ADA3E4544A97 ON ticket');
        $this->addSql('ALTER TABLE ticket CHANGE Id_pan Id_panel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3B55EF069 FOREIGN KEY (Id_panel) REFERENCES panneaux (id_pa)');
        $this->addSql('CREATE INDEX UNIQ_97A0ADA3B55EF069 ON ticket (Id_panel)');
        $this->addSql('ALTER TABLE ticket_conversation DROP FOREIGN KEY FK_4A58DA42B55EF069');
        $this->addSql('DROP INDEX UNIQ_4A58DA42B55EF069 ON ticket_conversation');
        $this->addSql('DROP INDEX UNIQ_4A58DA4234CA9FDB ON ticket_conversation');
        $this->addSql('DROP INDEX UNIQ_4A58DA42121F7504 ON ticket_conversation');
        $this->addSql('DROP INDEX UNIQ_4A58DA42896AA038 ON ticket_conversation');
        $this->addSql('ALTER TABLE ticket_conversation CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE state state VARCHAR(255) DEFAULT NULL, CHANGE priority priority VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL');
        $this->addSql('CREATE INDEX UNIQ_4A58DA42B55EF069 ON ticket_conversation (Id_panel)');
        $this->addSql('CREATE INDEX UNIQ_4A58DA4234CA9FDB ON ticket_conversation (Id_Ticket)');
        $this->addSql('CREATE INDEX UNIQ_4A58DA42121F7504 ON ticket_conversation (Id_Contact)');
        $this->addSql('CREATE INDEX UNIQ_4A58DA42896AA038 ON ticket_conversation (Id_Ressource)');
        $this->addSql('ALTER TABLE user CHANGE date_embauche date_embauche DATE DEFAULT NULL');
    }
}
