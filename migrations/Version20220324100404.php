<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220324100404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE guitar_category (guitar_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_6369AA5948420B1E (guitar_id), INDEX IDX_6369AA5912469DE2 (category_id), PRIMARY KEY(guitar_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE guitar_category ADD CONSTRAINT FK_6369AA5948420B1E FOREIGN KEY (guitar_id) REFERENCES guitar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guitar_category ADD CONSTRAINT FK_6369AA5912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brand ADD guitar_id INT NOT NULL');
        $this->addSql('ALTER TABLE brand ADD CONSTRAINT FK_1C52F95848420B1E FOREIGN KEY (guitar_id) REFERENCES guitar (id)');
        $this->addSql('CREATE INDEX IDX_1C52F95848420B1E ON brand (guitar_id)');
        $this->addSql('ALTER TABLE guitar ADD aesthetic_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE guitar ADD CONSTRAINT FK_423AC30D3712B658 FOREIGN KEY (aesthetic_id) REFERENCES aesthetic (id)');
        $this->addSql('ALTER TABLE guitar ADD CONSTRAINT FK_423AC30DA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_423AC30D3712B658 ON guitar (aesthetic_id)');
        $this->addSql('CREATE INDEX IDX_423AC30DA76ED395 ON guitar (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE guitar_category');
        $this->addSql('ALTER TABLE aesthetic CHANGE wear wear VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE finition finition VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pickups pickups VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE model model VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE neck_material neck_material VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE body_material body_material VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE body_form body_form VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE brand DROP FOREIGN KEY FK_1C52F95848420B1E');
        $this->addSql('DROP INDEX IDX_1C52F95848420B1E ON brand');
        $this->addSql('ALTER TABLE brand DROP guitar_id, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE guitar DROP FOREIGN KEY FK_423AC30D3712B658');
        $this->addSql('ALTER TABLE guitar DROP FOREIGN KEY FK_423AC30DA76ED395');
        $this->addSql('DROP INDEX IDX_423AC30D3712B658 ON guitar');
        $this->addSql('DROP INDEX IDX_423AC30DA76ED395 ON guitar');
        $this->addSql('ALTER TABLE guitar DROP aesthetic_id, DROP user_id, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE post CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE synopsis synopsis VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE first_name first_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_name last_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
