<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203200337 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE career_step (id INT AUTO_INCREMENT NOT NULL, image_id INT NOT NULL, section_id INT NOT NULL, position VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_9D10DDA53DA5256D (image_id), INDEX IDX_9D10DDA5D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, url LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, section_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5E3DE4773DA5256D (image_id), INDEX IDX_5E3DE477D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social (id INT AUTO_INCREMENT NOT NULL, image_id INT NOT NULL, section_id INT NOT NULL, name VARCHAR(255) NOT NULL, url LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_7161E1873DA5256D (image_id), INDEX IDX_7161E187D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE career_step ADD CONSTRAINT FK_9D10DDA53DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE career_step ADD CONSTRAINT FK_9D10DDA5D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4773DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE social ADD CONSTRAINT FK_7161E1873DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE social ADD CONSTRAINT FK_7161E187D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE career_step DROP FOREIGN KEY FK_9D10DDA53DA5256D');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4773DA5256D');
        $this->addSql('ALTER TABLE social DROP FOREIGN KEY FK_7161E1873DA5256D');
        $this->addSql('ALTER TABLE career_step DROP FOREIGN KEY FK_9D10DDA5D823E37A');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477D823E37A');
        $this->addSql('ALTER TABLE social DROP FOREIGN KEY FK_7161E187D823E37A');
        $this->addSql('DROP TABLE career_step');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE social');
    }
}
