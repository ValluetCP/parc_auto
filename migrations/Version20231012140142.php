<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012140142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, date_location DATETIME NOT NULL, nb_jr_location INT NOT NULL, prix_location INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location_modele (location_id INT NOT NULL, modele_id INT NOT NULL, INDEX IDX_5B700D5A64D218E (location_id), INDEX IDX_5B700D5AAC14B70A (modele_id), PRIMARY KEY(location_id, modele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loueur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, adresse LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loueur_modele (loueur_id INT NOT NULL, modele_id INT NOT NULL, INDEX IDX_595C4A09DAF8AEE6 (loueur_id), INDEX IDX_595C4A09AC14B70A (modele_id), PRIMARY KEY(loueur_id, modele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, type_modele VARCHAR(255) NOT NULL, annee_modele INT NOT NULL, conso VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, loueur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, nb_km INT NOT NULL, create_at DATETIME NOT NULL, INDEX IDX_E9E2810FDAF8AEE6 (loueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE location_modele ADD CONSTRAINT FK_5B700D5A64D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_modele ADD CONSTRAINT FK_5B700D5AAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loueur_modele ADD CONSTRAINT FK_595C4A09DAF8AEE6 FOREIGN KEY (loueur_id) REFERENCES loueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loueur_modele ADD CONSTRAINT FK_595C4A09AC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FDAF8AEE6 FOREIGN KEY (loueur_id) REFERENCES loueur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location_modele DROP FOREIGN KEY FK_5B700D5A64D218E');
        $this->addSql('ALTER TABLE location_modele DROP FOREIGN KEY FK_5B700D5AAC14B70A');
        $this->addSql('ALTER TABLE loueur_modele DROP FOREIGN KEY FK_595C4A09DAF8AEE6');
        $this->addSql('ALTER TABLE loueur_modele DROP FOREIGN KEY FK_595C4A09AC14B70A');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810FDAF8AEE6');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE location_modele');
        $this->addSql('DROP TABLE loueur');
        $this->addSql('DROP TABLE loueur_modele');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE voiture');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
