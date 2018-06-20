<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 * Table : users
 */
final class Version20180618132413 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(
            'CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, 
                                    email VARCHAR(120) NOT NULL, 
                                    surname VARCHAR(40) NOT NULL, 
                                    lastname VARCHAR(40) NOT NULL,
                                    password VARCHAR(255) NOT NULL,
                                    phone VARCHAR(10)  NULL,
                                    bankData VARCHAR(50) DEFAULT NULL,
                                    roles VARCHAR(50) DEFAULT NULL,
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE users');
    }
}
