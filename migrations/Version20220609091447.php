<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220609091447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resources DROP FOREIGN KEY FK_EF66EBAE230A4795');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3E0F2C01E');
        $this->addSql('DROP TABLE ticket_conv');
        $this->addSql('DROP INDEX IDX_EF66EBAE230A4795 ON resources');
        $this->addSql('ALTER TABLE resources DROP ticket_conv_id');
        $this->addSql('DROP INDEX IDX_97A0ADA3E0F2C01E ON ticket');
        $this->addSql('ALTER TABLE ticket DROP id_conversation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ticket_conv (id INT AUTO_INCREMENT NOT NULL, idpa INT DEFAULT NULL, id_contact INT DEFAULT NULL, id_ticket INT DEFAULT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, state VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, priority VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_cre DATE NOT NULL, UNIQUE INDEX UNIQ_3B9F8CF492FF4F48 (id_contact), UNIQUE INDEX UNIQ_3B9F8CF43D3E2C51 (idpa), UNIQUE INDEX UNIQ_3B9F8CF4B197184E (id_ticket), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ticket_conv ADD CONSTRAINT FK_3B9F8CF43D3E2C51 FOREIGN KEY (idpa) REFERENCES panneaux (id_pa)');
        $this->addSql('ALTER TABLE ticket_conv ADD CONSTRAINT FK_3B9F8CF4B197184E FOREIGN KEY (id_ticket) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE ticket_conv ADD CONSTRAINT FK_3B9F8CF492FF4F48 FOREIGN KEY (id_contact) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE resources ADD ticket_conv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resources ADD CONSTRAINT FK_EF66EBAE230A4795 FOREIGN KEY (ticket_conv_id) REFERENCES ticket_conv (id)');
        $this->addSql('CREATE INDEX IDX_EF66EBAE230A4795 ON resources (ticket_conv_id)');
        $this->addSql('ALTER TABLE ticket ADD id_conversation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3E0F2C01E FOREIGN KEY (id_conversation_id) REFERENCES ticket_conv (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA3E0F2C01E ON ticket (id_conversation_id)');
    }
}
