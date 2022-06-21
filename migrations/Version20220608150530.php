<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220608150530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket_conv DROP FOREIGN KEY FK_3B9F8CF4422BA59D');
        $this->addSql('DROP INDEX UNIQ_3B9F8CF4422BA59D ON ticket_conv');
        $this->addSql('ALTER TABLE ticket_conv CHANGE id_contact_id id_contact INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket_conv ADD CONSTRAINT FK_3B9F8CF492FF4F48 FOREIGN KEY (id_contact) REFERENCES contact (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3B9F8CF492FF4F48 ON ticket_conv (id_contact)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket_conv DROP FOREIGN KEY FK_3B9F8CF492FF4F48');
        $this->addSql('DROP INDEX UNIQ_3B9F8CF492FF4F48 ON ticket_conv');
        $this->addSql('ALTER TABLE ticket_conv CHANGE id_contact id_contact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket_conv ADD CONSTRAINT FK_3B9F8CF4422BA59D FOREIGN KEY (id_contact_id) REFERENCES contact (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3B9F8CF4422BA59D ON ticket_conv (id_contact_id)');
    }
}
