<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181101163709 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEFDFF2E92');
        $this->addSql('ALTER TABLE technology DROP FOREIGN KEY FK_F463524D166D1F9C');
        $this->addSql('CREATE TABLE technologies (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, name VARCHAR(255) NOT NULL, version VARCHAR(11) NOT NULL, INDEX IDX_4CCBFB18166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, alt VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, thumbnail_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, completed TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_5C93B3A4FDFF2E92 (thumbnail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE technologies ADD CONSTRAINT FK_4CCBFB18166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4FDFF2E92 FOREIGN KEY (thumbnail_id) REFERENCES images (id)');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE technology');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4FDFF2E92');
        $this->addSql('ALTER TABLE technologies DROP FOREIGN KEY FK_4CCBFB18166D1F9C');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, alt VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, thumbnail_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, description LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, url VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME DEFAULT NULL, completed TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_2FB3D0EEFDFF2E92 (thumbnail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technology (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, version VARCHAR(11) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_F463524D166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEFDFF2E92 FOREIGN KEY (thumbnail_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE technology ADD CONSTRAINT FK_F463524D166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('DROP TABLE technologies');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE projects');
    }
}
