<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180621080842 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE rooms_options (room_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_605EAA8954177093 (room_id), INDEX IDX_605EAA89A7C41D6F (option_id), PRIMARY KEY(room_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receips (id INT AUTO_INCREMENT NOT NULL, creation_date DATETIME NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rooms_options ADD CONSTRAINT FK_605EAA8954177093 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('ALTER TABLE rooms_options ADD CONSTRAINT FK_605EAA89A7C41D6F FOREIGN KEY (option_id) REFERENCES options (id)');
        $this->addSql('DROP TABLE invoices');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE rooms DROP FOREIGN KEY FK_34DCD176F5B7AF78');
        $this->addSql('DROP INDEX FK_34DCD176F5B7AF78 ON rooms');
        $this->addSql('ALTER TABLE rooms ADD location VARCHAR(50) NOT NULL, ADD cp VARCHAR(10) NOT NULL, ADD is_rented TINYINT(1) DEFAULT \'0\' NOT NULL, DROP user_id, DROP postal_code, DROP dispo, DROP date_dispo, CHANGE name name VARCHAR(50) NOT NULL, CHANGE city city VARCHAR(50) NOT NULL, CHANGE adress description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE users ADD username VARCHAR(255) NOT NULL, ADD is_active TINYINT(1) NOT NULL, ADD roles VARCHAR(64) NOT NULL, DROP phone, DROP bankData, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(64) NOT NULL, CHANGE location location VARCHAR(40) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9F85E0677 ON users (username)');
        $this->addSql('ALTER TABLE options DROP FOREIGN KEY FK_34DCD176F5B7AF79');
        $this->addSql('DROP INDEX FK_34DCD176F5B7AF79 ON options');
        $this->addSql('ALTER TABLE options ADD name VARCHAR(40) NOT NULL, DROP room_id, DROP name_option');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE invoices (id INT AUTO_INCREMENT NOT NULL, date_created DATETIME NOT NULL, url VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name_room VARCHAR(80) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, room_id INT DEFAULT NULL, option_id INT DEFAULT NULL, user_id INT DEFAULT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, INDEX FK_34DCD176F5B7AF75 (room_id), INDEX FK_34DCD176F5B7AF76 (option_id), INDEX FK_34DCD176F5B7AF77 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_34DCD176F5B7AF75 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_34DCD176F5B7AF76 FOREIGN KEY (option_id) REFERENCES options (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_34DCD176F5B7AF77 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('DROP TABLE rooms_options');
        $this->addSql('DROP TABLE receips');
        $this->addSql('ALTER TABLE options ADD room_id INT DEFAULT NULL, ADD name_option VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, DROP name');
        $this->addSql('ALTER TABLE options ADD CONSTRAINT FK_34DCD176F5B7AF79 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('CREATE INDEX FK_34DCD176F5B7AF79 ON options (room_id)');
        $this->addSql('ALTER TABLE rooms ADD user_id INT DEFAULT NULL, ADD postal_code VARCHAR(5) NOT NULL COLLATE utf8_unicode_ci, ADD dispo TINYINT(1) NOT NULL, ADD date_dispo DATETIME DEFAULT NULL, DROP location, DROP cp, DROP is_rented, CHANGE name name VARCHAR(120) NOT NULL COLLATE utf8_unicode_ci, CHANGE city city VARCHAR(60) NOT NULL COLLATE utf8_unicode_ci, CHANGE description adress VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_34DCD176F5B7AF78 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX FK_34DCD176F5B7AF78 ON rooms (user_id)');
        $this->addSql('DROP INDEX UNIQ_1483A5E9E7927C74 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E9F85E0677 ON users');
        $this->addSql('ALTER TABLE users ADD phone VARCHAR(10) DEFAULT NULL COLLATE utf8_unicode_ci, ADD bankData VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, DROP username, DROP is_active, DROP roles, CHANGE email email VARCHAR(120) NOT NULL COLLATE utf8_unicode_ci, CHANGE location location VARCHAR(5) NOT NULL COLLATE utf8_unicode_ci, CHANGE password password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
