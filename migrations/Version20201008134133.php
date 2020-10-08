<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201008134133 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module ADD enigma_id INT NOT NULL');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628457B6BA0 FOREIGN KEY (enigma_id) REFERENCES enigma (id)');
        $this->addSql('CREATE INDEX IDX_C242628457B6BA0 ON module (enigma_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628457B6BA0');
        $this->addSql('DROP INDEX IDX_C242628457B6BA0 ON module');
        $this->addSql('ALTER TABLE module DROP enigma_id');
    }
}
