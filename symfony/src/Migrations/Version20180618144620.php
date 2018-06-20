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
                                    location VARCHAR(255) NOT NULL,
                                    city VARCHAR(60) NOT NULL,
                                    cp VARCHAR(5) NOT NULL,
                                    description VARCHAR(255) NOT NULL,
                                    capacity INT NOT NULL,
                                    isRented BOOLEAN NOT NULL,
                                    rentingDateBegin DATETIME DEFAULT NULL,
                                    rentingDateEnd DATETIME DEFAULT NULL,
                                    pastRentingUsers INT DEFAULT NULL,
                                    currentRentingUser INT DEFAULT NULL,
                                    user_id INT DEFAULT NULL,
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');

        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_34DCD176F5B7AF78 FOREIGN KEY (currentRentingUser) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE rooms');
    }
}
