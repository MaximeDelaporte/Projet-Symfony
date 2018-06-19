<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 * Table : options
 */
final class Version20180618145031 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(
            'CREATE TABLE options (option_id INT AUTO_INCREMENT NOT NULL, 
                                    name_option VARCHAR(30) NOT NULL, 
                                    price INT NOT NULL,
                                    room_id INT DEFAULT NULL,
                                    PRIMARY KEY(option_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        
        $this->addSql('ALTER TABLE options ADD CONSTRAINT FK_34DCD176F5B7AF79 FOREIGN KEY (room_id) REFERENCES rooms (room_id)');
}

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE options');
    }
}
