<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180620212526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, room_id INT DEFAULT NULL, user_id INT DEFAULT NULL, created_at VARCHAR(255) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, UNIQUE INDEX UNIQ_4DA23954177093 (room_id), UNIQUE INDEX UNIQ_4DA239A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_options (reservation_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_B7A04102B83297E7 (reservation_id), INDEX IDX_B7A04102A7C41D6F (option_id), PRIMARY KEY(reservation_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rooms_options (room_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_605EAA8954177093 (room_id), INDEX IDX_605EAA89A7C41D6F (option_id), PRIMARY KEY(room_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receips (id INT AUTO_INCREMENT NOT NULL, room INT DEFAULT NULL, user INT DEFAULT NULL, creation_date DATETIME NOT NULL, value INT NOT NULL, UNIQUE INDEX UNIQ_CDFD23E6729F519B (room), UNIQUE INDEX UNIQ_CDFD23E68D93D649 (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA23954177093 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reservation_options ADD CONSTRAINT FK_B7A04102B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservations (id)');
        $this->addSql('ALTER TABLE reservation_options ADD CONSTRAINT FK_B7A04102A7C41D6F FOREIGN KEY (option_id) REFERENCES options (id)');
        $this->addSql('ALTER TABLE rooms_options ADD CONSTRAINT FK_605EAA8954177093 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('ALTER TABLE rooms_options ADD CONSTRAINT FK_605EAA89A7C41D6F FOREIGN KEY (option_id) REFERENCES options (id)');
        $this->addSql('ALTER TABLE receips ADD CONSTRAINT FK_CDFD23E6729F519B FOREIGN KEY (room) REFERENCES rooms (id)');
        $this->addSql('ALTER TABLE receips ADD CONSTRAINT FK_CDFD23E68D93D649 FOREIGN KEY (user) REFERENCES users (id)');
        $this->addSql('DROP TABLE invoices');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE users ADD username VARCHAR(255) NOT NULL, ADD location VARCHAR(40) NOT NULL, ADD is_active TINYINT(1) NOT NULL, DROP phone, DROP bankData, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(64) NOT NULL, CHANGE roles roles VARCHAR(64) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9F85E0677 ON users (username)');
        $this->addSql('ALTER TABLE rooms CHANGE name name VARCHAR(50) NOT NULL, CHANGE adress adress VARCHAR(50) NOT NULL, CHANGE city city VARCHAR(50) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE is_rented is_rented TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE postal_code cp VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE options CHANGE name name VARCHAR(40) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation_options DROP FOREIGN KEY FK_B7A04102B83297E7');
        $this->addSql('CREATE TABLE invoices (id INT AUTO_INCREMENT NOT NULL, date_created DATETIME NOT NULL, url VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name_room VARCHAR(80) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, room_id INT DEFAULT NULL, createdAt DATETIME NOT NULL, date_start DATE NOT NULL, date_end DATE NOT NULL, options_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX FK_34DCD176F5B7AF75 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_34DCD176F5B7AF75 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE reservation_options');
        $this->addSql('DROP TABLE rooms_options');
        $this->addSql('DROP TABLE receips');
        $this->addSql('ALTER TABLE options CHANGE name name VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE rooms CHANGE name name VARCHAR(120) NOT NULL COLLATE utf8_unicode_ci, CHANGE adress adress VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE city city VARCHAR(60) NOT NULL COLLATE utf8_unicode_ci, CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE is_rented is_rented TINYINT(1) NOT NULL, CHANGE cp postal_code VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('DROP INDEX UNIQ_1483A5E9E7927C74 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E9F85E0677 ON users');
        $this->addSql('ALTER TABLE users ADD phone VARCHAR(10) DEFAULT NULL COLLATE utf8_unicode_ci, ADD bankData VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, DROP username, DROP location, DROP is_active, CHANGE email email VARCHAR(120) NOT NULL COLLATE utf8_unicode_ci, CHANGE roles roles VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE password password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
