<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220629080529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP INDEX UNIQ_97A0ADA3B55EF069, ADD UNIQUE INDEX UNIQ_97A0ADA36F731F77 (Id_panneaux)');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP INDEX UNIQ_97A0ADA36F731F77, ADD INDEX UNIQ_97A0ADA3B55EF069 (Id_panneaux)');
    }
}
