<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220328205110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aesthetic (id INT AUTO_INCREMENT NOT NULL, wear VARCHAR(255) NOT NULL, finition VARCHAR(255) NOT NULL, pickups VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, neck_material VARCHAR(255) NOT NULL, body_material VARCHAR(255) NOT NULL, form VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guitar (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, brand_id INT NOT NULL, aesthetic_id INT NOT NULL, name VARCHAR(255) NOT NULL, year INT DEFAULT NULL, acquisition_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', domination_hand TINYINT(1) NOT NULL, nb_string INT NOT NULL, fixation TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image VARCHAR(255) DEFAULT NULL, INDEX IDX_423AC30DA76ED395 (user_id), INDEX IDX_423AC30D44F5D008 (brand_id), INDEX IDX_423AC30D3712B658 (aesthetic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guitar_category (guitar_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_6369AA5948420B1E (guitar_id), INDEX IDX_6369AA5912469DE2 (category_id), PRIMARY KEY(guitar_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, categories_id INT NOT NULL, title VARCHAR(255) NOT NULL, presentation VARCHAR(50) NOT NULL, synopsis LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5A8A6C8DA21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE guitar ADD CONSTRAINT FK_423AC30DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE guitar ADD CONSTRAINT FK_423AC30D44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE guitar ADD CONSTRAINT FK_423AC30D3712B658 FOREIGN KEY (aesthetic_id) REFERENCES aesthetic (id)');
        $this->addSql('ALTER TABLE guitar_category ADD CONSTRAINT FK_6369AA5948420B1E FOREIGN KEY (guitar_id) REFERENCES guitar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guitar_category ADD CONSTRAINT FK_6369AA5912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DA21214B7 FOREIGN KEY (categories_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE guitar DROP FOREIGN KEY FK_423AC30D3712B658');
        $this->addSql('ALTER TABLE guitar DROP FOREIGN KEY FK_423AC30D44F5D008');
        $this->addSql('ALTER TABLE guitar_category DROP FOREIGN KEY FK_6369AA5912469DE2');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DA21214B7');
        $this->addSql('ALTER TABLE guitar_category DROP FOREIGN KEY FK_6369AA5948420B1E');
        $this->addSql('ALTER TABLE guitar DROP FOREIGN KEY FK_423AC30DA76ED395');
        $this->addSql('DROP TABLE aesthetic');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE guitar');
        $this->addSql('DROP TABLE guitar_category');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE user');
    }
}
