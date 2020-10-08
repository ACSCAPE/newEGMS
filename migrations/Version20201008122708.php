<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201008122708 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE escape_game (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, duration TIME NOT NULL, date_time DATETIME NOT NULL, number_min INT NOT NULL, number_max INT NOT NULL, private TINYINT(1) NOT NULL, excerpt VARCHAR(255) NOT NULL, category_name VARCHAR(255) NOT NULL, resume_text VARCHAR(255) NOT NULL, introduction_text VARCHAR(255) NOT NULL, instructions_text VARCHAR(255) NOT NULL, happy_end_text VARCHAR(255) NOT NULL, game_over_text VARCHAR(255) NOT NULL, INDEX IDX_22A85001A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, pseudo VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE escape_game ADD CONSTRAINT FK_22A85001A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE escape_game DROP FOREIGN KEY FK_22A85001A76ED395');
        $this->addSql('DROP TABLE escape_game');
        $this->addSql('DROP TABLE user');
    }
}
