<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609092758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ticket_conversation (id INT AUTO_INCREMENT NOT NULL, id_contact INT DEFAULT NULL, title VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, priority VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, id_Panel INT DEFAULT NULL, UNIQUE INDEX UNIQ_4A58DA428DE9BD3B (id_Panel), UNIQUE INDEX UNIQ_4A58DA4292FF4F48 (id_contact), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket_conversation_resources (ticket_conversation_id INT NOT NULL, resources_id INT NOT NULL, INDEX IDX_DF2494CDB386887 (ticket_conversation_id), INDEX IDX_DF2494CDACFC5BFF (resources_id), PRIMARY KEY(ticket_conversation_id, resources_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ticket_conversation ADD CONSTRAINT FK_4A58DA428DE9BD3B FOREIGN KEY (id_Panel) REFERENCES panneaux (id_pa)');
        $this->addSql('ALTER TABLE ticket_conversation ADD CONSTRAINT FK_4A58DA4292FF4F48 FOREIGN KEY (id_contact) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE ticket_conversation_resources ADD CONSTRAINT FK_DF2494CDB386887 FOREIGN KEY (ticket_conversation_id) REFERENCES ticket_conversation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket_conversation_resources ADD CONSTRAINT FK_DF2494CDACFC5BFF FOREIGN KEY (resources_id) REFERENCES resources (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket ADD ticket_conversation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3B386887 FOREIGN KEY (ticket_conversation_id) REFERENCES ticket_conversation (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA3B386887 ON ticket (ticket_conversation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3B386887');
        $this->addSql('ALTER TABLE ticket_conversation_resources DROP FOREIGN KEY FK_DF2494CDB386887');
        $this->addSql('DROP TABLE ticket_conversation');
        $this->addSql('DROP TABLE ticket_conversation_resources');
        $this->addSql('DROP INDEX IDX_97A0ADA3B386887 ON ticket');
        $this->addSql('ALTER TABLE ticket DROP ticket_conversation_id');
    }
}
