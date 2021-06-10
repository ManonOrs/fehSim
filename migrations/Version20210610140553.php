<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610140553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, sp INT NOT NULL, rng INT NOT NULL, damage INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arme_restriction (arme_id INT NOT NULL, restriction_id INT NOT NULL, INDEX IDX_A242451E21D9C0A (arme_id), INDEX IDX_A242451EE6160631 (restriction_id), PRIMARY KEY(arme_id, restriction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, skill_set_id INT NOT NULL, nom VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, rarete INT NOT NULL, type VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, arme_type VARCHAR(255) NOT NULL, image_default LONGTEXT NOT NULL, image_atack LONGTEXT NOT NULL, image_special LONGTEXT NOT NULL, image_injured LONGTEXT NOT NULL, total INT NOT NULL, INDEX IDX_6AEA486D3FB1590C (skill_set_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restriction (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, sp INT NOT NULL, slot VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_restriction (skill_id INT NOT NULL, restriction_id INT NOT NULL, INDEX IDX_C48702025585C142 (skill_id), INDEX IDX_C4870202E6160631 (restriction_id), PRIMARY KEY(skill_id, restriction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_set (id INT AUTO_INCREMENT NOT NULL, skill_a_id INT DEFAULT NULL, skill_b_id INT DEFAULT NULL, skill_c_id INT DEFAULT NULL, support_id INT DEFAULT NULL, special_id INT DEFAULT NULL, arme_id INT DEFAULT NULL, hp INT NOT NULL, atk INT NOT NULL, spd INT NOT NULL, def INT NOT NULL, res INT NOT NULL, INDEX IDX_1547E8327C9FCFEA (skill_a_id), INDEX IDX_1547E8326E2A6004 (skill_b_id), INDEX IDX_1547E832D6960761 (skill_c_id), INDEX IDX_1547E832315B405 (support_id), INDEX IDX_1547E8324F5B3969 (special_id), INDEX IDX_1547E83221D9C0A (arme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE special (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, sp INT NOT NULL, cd INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE special_restriction (special_id INT NOT NULL, restriction_id INT NOT NULL, INDEX IDX_B11C48664F5B3969 (special_id), INDEX IDX_B11C4866E6160631 (restriction_id), PRIMARY KEY(special_id, restriction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE support (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, sp INT NOT NULL, rng INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE support_restriction (support_id INT NOT NULL, restriction_id INT NOT NULL, INDEX IDX_AFDB6EEE315B405 (support_id), INDEX IDX_AFDB6EEEE6160631 (restriction_id), PRIMARY KEY(support_id, restriction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arme_restriction ADD CONSTRAINT FK_A242451E21D9C0A FOREIGN KEY (arme_id) REFERENCES arme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE arme_restriction ADD CONSTRAINT FK_A242451EE6160631 FOREIGN KEY (restriction_id) REFERENCES restriction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D3FB1590C FOREIGN KEY (skill_set_id) REFERENCES skill_set (id)');
        $this->addSql('ALTER TABLE skill_restriction ADD CONSTRAINT FK_C48702025585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_restriction ADD CONSTRAINT FK_C4870202E6160631 FOREIGN KEY (restriction_id) REFERENCES restriction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_set ADD CONSTRAINT FK_1547E8327C9FCFEA FOREIGN KEY (skill_a_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE skill_set ADD CONSTRAINT FK_1547E8326E2A6004 FOREIGN KEY (skill_b_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE skill_set ADD CONSTRAINT FK_1547E832D6960761 FOREIGN KEY (skill_c_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE skill_set ADD CONSTRAINT FK_1547E832315B405 FOREIGN KEY (support_id) REFERENCES support (id)');
        $this->addSql('ALTER TABLE skill_set ADD CONSTRAINT FK_1547E8324F5B3969 FOREIGN KEY (special_id) REFERENCES special (id)');
        $this->addSql('ALTER TABLE skill_set ADD CONSTRAINT FK_1547E83221D9C0A FOREIGN KEY (arme_id) REFERENCES arme (id)');
        $this->addSql('ALTER TABLE special_restriction ADD CONSTRAINT FK_B11C48664F5B3969 FOREIGN KEY (special_id) REFERENCES special (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE special_restriction ADD CONSTRAINT FK_B11C4866E6160631 FOREIGN KEY (restriction_id) REFERENCES restriction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE support_restriction ADD CONSTRAINT FK_AFDB6EEE315B405 FOREIGN KEY (support_id) REFERENCES support (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE support_restriction ADD CONSTRAINT FK_AFDB6EEEE6160631 FOREIGN KEY (restriction_id) REFERENCES restriction (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme_restriction DROP FOREIGN KEY FK_A242451E21D9C0A');
        $this->addSql('ALTER TABLE skill_set DROP FOREIGN KEY FK_1547E83221D9C0A');
        $this->addSql('ALTER TABLE arme_restriction DROP FOREIGN KEY FK_A242451EE6160631');
        $this->addSql('ALTER TABLE skill_restriction DROP FOREIGN KEY FK_C4870202E6160631');
        $this->addSql('ALTER TABLE special_restriction DROP FOREIGN KEY FK_B11C4866E6160631');
        $this->addSql('ALTER TABLE support_restriction DROP FOREIGN KEY FK_AFDB6EEEE6160631');
        $this->addSql('ALTER TABLE skill_restriction DROP FOREIGN KEY FK_C48702025585C142');
        $this->addSql('ALTER TABLE skill_set DROP FOREIGN KEY FK_1547E8327C9FCFEA');
        $this->addSql('ALTER TABLE skill_set DROP FOREIGN KEY FK_1547E8326E2A6004');
        $this->addSql('ALTER TABLE skill_set DROP FOREIGN KEY FK_1547E832D6960761');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D3FB1590C');
        $this->addSql('ALTER TABLE skill_set DROP FOREIGN KEY FK_1547E8324F5B3969');
        $this->addSql('ALTER TABLE special_restriction DROP FOREIGN KEY FK_B11C48664F5B3969');
        $this->addSql('ALTER TABLE skill_set DROP FOREIGN KEY FK_1547E832315B405');
        $this->addSql('ALTER TABLE support_restriction DROP FOREIGN KEY FK_AFDB6EEE315B405');
        $this->addSql('DROP TABLE arme');
        $this->addSql('DROP TABLE arme_restriction');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE restriction');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_restriction');
        $this->addSql('DROP TABLE skill_set');
        $this->addSql('DROP TABLE special');
        $this->addSql('DROP TABLE special_restriction');
        $this->addSql('DROP TABLE support');
        $this->addSql('DROP TABLE support_restriction');
    }
}
