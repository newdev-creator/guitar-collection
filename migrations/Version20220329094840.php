<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329094840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE guitar (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, model VARCHAR(255) NOT NULL, year INT DEFAULT NULL, acquisition_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', wear VARCHAR(255) NOT NULL, finition VARCHAR(255) NOT NULL, pickups VARCHAR(255) DEFAULT NULL, neck_material VARCHAR(255) DEFAULT NULL, body_material VARCHAR(255) DEFAULT NULL, body_form VARCHAR(255) NOT NULL, domination_hand TINYINT(1) NOT NULL, nb_frets INT NOT NULL, fixation TINYINT(1) NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_423AC30DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guitar_category (guitar_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_6369AA5948420B1E (guitar_id), INDEX IDX_6369AA5912469DE2 (category_id), PRIMARY KEY(guitar_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE guitar ADD CONSTRAINT FK_423AC30DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE guitar_category ADD CONSTRAINT FK_6369AA5948420B1E FOREIGN KEY (guitar_id) REFERENCES guitar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guitar_category ADD CONSTRAINT FK_6369AA5912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE guitar_category DROP FOREIGN KEY FK_6369AA5948420B1E');
        $this->addSql('ALTER TABLE guitar DROP FOREIGN KEY FK_423AC30DA76ED395');
        $this->addSql('DROP TABLE guitar');
        $this->addSql('DROP TABLE guitar_category');
        $this->addSql('DROP TABLE user');
    }
}
