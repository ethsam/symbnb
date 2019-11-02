<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191101140423 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mots_cles (id INT AUTO_INCREMENT NOT NULL, mot_cle VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, articles_id INT NOT NULL, pseudo VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, actif TINYINT(1) NOT NULL, rgpd TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_D9BEC0C41EBAF6CC (articles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_category (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_category_products (products_category_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_FCFE8BCEE89BFF79 (products_category_id), INDEX IDX_FCFE8BCE6C8A81A9 (products_id), PRIMARY KEY(products_category_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, featured_image VARCHAR(255) NOT NULL, INDEX IDX_BFDD316867B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_categories (articles_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_DE004A0E1EBAF6CC (articles_id), INDEX IDX_DE004A0EA21214B7 (categories_id), PRIMARY KEY(articles_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_mots_cles (articles_id INT NOT NULL, mots_cles_id INT NOT NULL, INDEX IDX_2927AB461EBAF6CC (articles_id), INDEX IDX_2927AB46C0BE80DB (mots_cles_id), PRIMARY KEY(articles_id, mots_cles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, usercreate_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, datecreate DATETIME NOT NULL, publish TINYINT(1) NOT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, bookingurl VARCHAR(255) DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, INDEX IDX_B3BA5A5A20537CE3 (usercreate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C41EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE products_category_products ADD CONSTRAINT FK_FCFE8BCEE89BFF79 FOREIGN KEY (products_category_id) REFERENCES products_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_category_products ADD CONSTRAINT FK_FCFE8BCE6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD316867B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE articles_categories ADD CONSTRAINT FK_DE004A0E1EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_categories ADD CONSTRAINT FK_DE004A0EA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_mots_cles ADD CONSTRAINT FK_2927AB461EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_mots_cles ADD CONSTRAINT FK_2927AB46C0BE80DB FOREIGN KEY (mots_cles_id) REFERENCES mots_cles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A20537CE3 FOREIGN KEY (usercreate_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles_mots_cles DROP FOREIGN KEY FK_2927AB46C0BE80DB');
        $this->addSql('ALTER TABLE products_category_products DROP FOREIGN KEY FK_FCFE8BCEE89BFF79');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD316867B3B43D');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A20537CE3');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C41EBAF6CC');
        $this->addSql('ALTER TABLE articles_categories DROP FOREIGN KEY FK_DE004A0E1EBAF6CC');
        $this->addSql('ALTER TABLE articles_mots_cles DROP FOREIGN KEY FK_2927AB461EBAF6CC');
        $this->addSql('ALTER TABLE products_category_products DROP FOREIGN KEY FK_FCFE8BCE6C8A81A9');
        $this->addSql('ALTER TABLE articles_categories DROP FOREIGN KEY FK_DE004A0EA21214B7');
        $this->addSql('DROP TABLE mots_cles');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE products_category');
        $this->addSql('DROP TABLE products_category_products');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE articles_categories');
        $this->addSql('DROP TABLE articles_mots_cles');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE categories');
    }
}
