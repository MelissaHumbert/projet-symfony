<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429085627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD product_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD76B7C825 FOREIGN KEY (product_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD76B7C825 ON product (product_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD76B7C825');
        $this->addSql('DROP INDEX IDX_D34A04AD76B7C825 ON product');
        $this->addSql('ALTER TABLE product DROP product_user_id');
    }
}
