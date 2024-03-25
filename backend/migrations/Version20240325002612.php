<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240325002612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groups (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, code VARCHAR(191) NOT NULL, name VARCHAR(191) NOT NULL, description TEXT DEFAULT NULL, status SMALLINT UNSIGNED DEFAULT 0 NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_F06D39707B00651C (status), INDEX IDX_F06D39708B8E8428 (created_at), INDEX IDX_F06D397043625D9F (updated_at), UNIQUE INDEX UNIQ_F06D397077153098 (code), UNIQUE INDEX UNIQ_F06D39705E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE login_attempts (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ip_address VARCHAR(64) NOT NULL, login VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_9163C7FB22FFD58C (ip_address), INDEX IDX_9163C7FBAA08CB10 (login), INDEX IDX_9163C7FB8B8E8428 (created_at), INDEX IDX_9163C7FB43625D9F (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE password_resets (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, email VARCHAR(191) NOT NULL, token VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, INDEX IDX_9EDAFEA1E7927C74 (email), INDEX IDX_9EDAFEA15F37A13B (token), INDEX IDX_9EDAFEA18B8E8428 (created_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, image VARCHAR(255) DEFAULT NULL, first_name VARCHAR(191) DEFAULT NULL, last_name VARCHAR(191) DEFAULT NULL, gender VARCHAR(191) DEFAULT NULL, country VARCHAR(191) DEFAULT NULL, address TEXT DEFAULT NULL, about_me TEXT DEFAULT NULL, username VARCHAR(191) NOT NULL, phone VARCHAR(64) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, status SMALLINT UNSIGNED DEFAULT 0 NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_1483A5E935C246D5 (password), INDEX IDX_1483A5E97B00651C (status), INDEX IDX_1483A5E98B8E8428 (created_at), INDEX IDX_1483A5E943625D9F (updated_at), INDEX IDX_1483A5E9A9D1C132 (first_name), INDEX IDX_1483A5E9C808BA5A (last_name), INDEX IDX_1483A5E9C7470A42 (gender), INDEX IDX_1483A5E95373C966 (country), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), UNIQUE INDEX UNIQ_1483A5E9444F97DD (phone), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_groups (user_id BIGINT UNSIGNED NOT NULL, group_id BIGINT UNSIGNED NOT NULL, INDEX IDX_FF8AB7E0A76ED395 (user_id), INDEX IDX_FF8AB7E0FE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_notifications (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, subject VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, status SMALLINT UNSIGNED DEFAULT 0 NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, user_id BIGINT UNSIGNED DEFAULT NULL, INDEX IDX_69E5B8DEA76ED395 (user_id), INDEX IDX_69E5B8DEFBCE3E7A (subject), INDEX IDX_69E5B8DE6DE44026 (description), INDEX IDX_69E5B8DE7B00651C (status), INDEX IDX_69E5B8DE8B8E8428 (created_at), INDEX IDX_69E5B8DE43625D9F (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_verifications (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, token VARCHAR(255) NOT NULL, status SMALLINT UNSIGNED DEFAULT 0 NOT NULL, expired_at DATETIME DEFAULT NULL, user_id BIGINT UNSIGNED DEFAULT NULL, INDEX IDX_8563EF4BA76ED395 (user_id), INDEX IDX_8563EF4B5F37A13B (token), INDEX IDX_8563EF4B7B00651C (status), INDEX IDX_8563EF4BC253ECC4 (expired_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_groups ADD CONSTRAINT FK_FF8AB7E0A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_groups ADD CONSTRAINT FK_FF8AB7E0FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id)');
        $this->addSql('ALTER TABLE users_notifications ADD CONSTRAINT FK_69E5B8DEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_verifications ADD CONSTRAINT FK_8563EF4BA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_groups DROP FOREIGN KEY FK_FF8AB7E0A76ED395');
        $this->addSql('ALTER TABLE users_groups DROP FOREIGN KEY FK_FF8AB7E0FE54D947');
        $this->addSql('ALTER TABLE users_notifications DROP FOREIGN KEY FK_69E5B8DEA76ED395');
        $this->addSql('ALTER TABLE users_verifications DROP FOREIGN KEY FK_8563EF4BA76ED395');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE login_attempts');
        $this->addSql('DROP TABLE password_resets');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_groups');
        $this->addSql('DROP TABLE users_notifications');
        $this->addSql('DROP TABLE users_verifications');
    }
}
