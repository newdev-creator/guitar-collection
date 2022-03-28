<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325144034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_post (category_id INT NOT NULL, post_id INT NOT NULL, INDEX IDX_D11116CA12469DE2 (category_id), INDEX IDX_D11116CA4B89032C (post_id), PRIMARY KEY(category_id, post_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guitar_category (guitar_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_6369AA5948420B1E (guitar_id), INDEX IDX_6369AA5912469DE2 (category_id), PRIMARY KEY(guitar_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_post ADD CONSTRAINT FK_D11116CA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_post ADD CONSTRAINT FK_D11116CA4B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guitar_category ADD CONSTRAINT FK_6369AA5948420B1E FOREIGN KEY (guitar_id) REFERENCES guitar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guitar_category ADD CONSTRAINT FK_6369AA5912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guitar ADD brand_id INT NOT NULL, ADD aesthetic_id INT NOT NULL');
        $this->addSql('ALTER TABLE guitar ADD CONSTRAINT FK_423AC30D44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE guitar ADD CONSTRAINT FK_423AC30D3712B658 FOREIGN KEY (aesthetic_id) REFERENCES aesthetic (id)');
        $this->addSql('CREATE INDEX IDX_423AC30D44F5D008 ON guitar (brand_id)');
        $this->addSql('CREATE INDEX IDX_423AC30D3712B658 ON guitar (aesthetic_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category_post');
        $this->addSql('DROP TABLE guitar_category');
        $this->addSql('ALTER TABLE guitar DROP FOREIGN KEY FK_423AC30D44F5D008');
        $this->addSql('ALTER TABLE guitar DROP FOREIGN KEY FK_423AC30D3712B658');
        $this->addSql('DROP INDEX IDX_423AC30D44F5D008 ON guitar');
        $this->addSql('DROP INDEX IDX_423AC30D3712B658 ON guitar');
        $this->addSql('ALTER TABLE guitar DROP brand_id, DROP aesthetic_id');
    }
}
