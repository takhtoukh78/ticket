<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220628151841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3B55EF069 FOREIGN KEY (Id_panel) REFERENCES panneaux (id_pa)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_97A0ADA3B55EF069 ON ticket (Id_panel)');

        $this->addSql('ALTER TABLE ticket_conversation CHANGE title title VARCHAR(255) , CHANGE state state VARCHAR(255) , CHANGE priority priority VARCHAR(255) , CHANGE description description VARCHAR(255) , CHANGE date_creation date_creation DATE , CHANGE Id_panel Id_panel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket_conversation ADD CONSTRAINT FK_4A58DA42B55EF069 FOREIGN KEY (Id_panel) REFERENCES panneaux (id_pa)');
    
        $this->addSql('ALTER TABLE user CHANGE date_embauche date_embauche DATE ');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3B55EF069');

        $this->addSql('ALTER TABLE ticket ADD nom_pa VARCHAR(255) , DROP Id_panel');
        $this->addSql('ALTER TABLE ticket_conversation DROP FOREIGN KEY FK_4A58DA42B55EF069');

        $this->addSql('ALTER TABLE ticket_conversation CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE state state VARCHAR(255) DEFAULT NULL, CHANGE priority priority VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL, CHANGE Id_panel Id_panel VARCHAR(255) DEFAULT NULL');
    
        $this->addSql('ALTER TABLE user CHANGE date_embauche date_embauche DATE DEFAULT NULL');
    }
}
