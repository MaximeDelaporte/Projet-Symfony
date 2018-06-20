<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180620213111 extends AbstractMigration
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
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, surname VARCHAR(40) NOT NULL, lastname VARCHAR(40) NOT NULL, username VARCHAR(255) NOT NULL, location VARCHAR(40) NOT NULL, is_active TINYINT(1) NOT NULL, roles VARCHAR(64) NOT NULL, password VARCHAR(64) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rooms (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, adress VARCHAR(50) NOT NULL, city VARCHAR(50) NOT NULL, cp VARCHAR(10) NOT NULL, description LONGTEXT NOT NULL, capacity INT NOT NULL, is_rented TINYINT(1) DEFAULT \'0\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rooms_options (room_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_605EAA8954177093 (room_id), INDEX IDX_605EAA89A7C41D6F (option_id), PRIMARY KEY(room_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(40) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receips (id INT AUTO_INCREMENT NOT NULL, room INT DEFAULT NULL, user INT DEFAULT NULL, creation_date DATETIME NOT NULL, value INT NOT NULL, UNIQUE INDEX UNIQ_CDFD23E6729F519B (room), UNIQUE INDEX UNIQ_CDFD23E68D93D649 (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA23954177093 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reservation_options ADD CONSTRAINT FK_B7A04102B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservations (id)');
        $this->addSql('ALTER TABLE reservation_options ADD CONSTRAINT FK_B7A04102A7C41D6F FOREIGN KEY (option_id) REFERENCES options (id)');
        $this->addSql('ALTER TABLE rooms_options ADD CONSTRAINT FK_605EAA8954177093 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('ALTER TABLE rooms_options ADD CONSTRAINT FK_605EAA89A7C41D6F FOREIGN KEY (option_id) REFERENCES options (id)');
        $this->addSql('ALTER TABLE receips ADD CONSTRAINT FK_CDFD23E6729F519B FOREIGN KEY (room) REFERENCES rooms (id)');
        $this->addSql('ALTER TABLE receips ADD CONSTRAINT FK_CDFD23E68D93D649 FOREIGN KEY (user) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation_options DROP FOREIGN KEY FK_B7A04102B83297E7');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239A76ED395');
        $this->addSql('ALTER TABLE receips DROP FOREIGN KEY FK_CDFD23E68D93D649');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA23954177093');
        $this->addSql('ALTER TABLE rooms_options DROP FOREIGN KEY FK_605EAA8954177093');
        $this->addSql('ALTER TABLE receips DROP FOREIGN KEY FK_CDFD23E6729F519B');
        $this->addSql('ALTER TABLE reservation_options DROP FOREIGN KEY FK_B7A04102A7C41D6F');
        $this->addSql('ALTER TABLE rooms_options DROP FOREIGN KEY FK_605EAA89A7C41D6F');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE reservation_options');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE rooms');
        $this->addSql('DROP TABLE rooms_options');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE receips');
    }
}
