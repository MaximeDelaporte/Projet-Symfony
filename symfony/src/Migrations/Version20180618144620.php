<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 * Table salles
 */
final class Version20180618144620 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(
            'CREATE TABLE rooms (id INT AUTO_INCREMENT NOT NULL, 
                                    name VARCHAR(120) NOT NULL, 
                                    adresse VARCHAR(255) NOT NULL, 
                                    dispo BOOLEAN NOT NULL,
                                    date_dispo DATETIME DEFAULT NULL,
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');

        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_34DCD176F5B7AF75 FOREIGN KEY (users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE rooms DROP reservation');
    }
}
