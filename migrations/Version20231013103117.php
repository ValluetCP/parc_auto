<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231013103117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loueur ADD voiture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE loueur ADD CONSTRAINT FK_2B284AD8181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('CREATE INDEX IDX_2B284AD8181A8BA ON loueur (voiture_id)');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810FDAF8AEE6');
        $this->addSql('DROP INDEX IDX_E9E2810FDAF8AEE6 ON voiture');
        $this->addSql('ALTER TABLE voiture DROP loueur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loueur DROP FOREIGN KEY FK_2B284AD8181A8BA');
        $this->addSql('DROP INDEX IDX_2B284AD8181A8BA ON loueur');
        $this->addSql('ALTER TABLE loueur DROP voiture_id');
        $this->addSql('ALTER TABLE voiture ADD loueur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FDAF8AEE6 FOREIGN KEY (loueur_id) REFERENCES loueur (id)');
        $this->addSql('CREATE INDEX IDX_E9E2810FDAF8AEE6 ON voiture (loueur_id)');
    }
}
