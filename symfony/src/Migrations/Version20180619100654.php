<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180619100654 extends AbstractMigration
{

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reservation (reservation_id INT AUTO_INCREMENT NOT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, room_id INT DEFAULT NULL, option_id INT DEFAULT NULL, user_id INT DEFAULT NULL, PRIMARY KEY(reservation_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');

        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_34DCD176F5B7AF75 FOREIGN KEY (room_id) REFERENCES rooms (room_id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_34DCD176F5B7AF76 FOREIGN KEY (option_id) REFERENCES options (option_id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_34DCD176F5B7AF77 FOREIGN KEY (user_id) REFERENCES users (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE reservation');
    }
}
