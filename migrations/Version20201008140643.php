<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201008140643 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE escape_game_module (escape_game_id INT NOT NULL, module_id INT NOT NULL, INDEX IDX_1582710A535D9AB (escape_game_id), INDEX IDX_1582710AAFC2B591 (module_id), PRIMARY KEY(escape_game_id, module_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE escape_game_module ADD CONSTRAINT FK_1582710A535D9AB FOREIGN KEY (escape_game_id) REFERENCES escape_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE escape_game_module ADD CONSTRAINT FK_1582710AAFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE escape_game_module');
    }
}
