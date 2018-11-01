<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181101163452 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE technology ADD project_id INT NOT NULL');
        $this->addSql('ALTER TABLE technology ADD CONSTRAINT FK_F463524D166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_F463524D166D1F9C ON technology (project_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE technology DROP FOREIGN KEY FK_F463524D166D1F9C');
        $this->addSql('DROP INDEX IDX_F463524D166D1F9C ON technology');
        $this->addSql('ALTER TABLE technology DROP project_id');
    }
}
