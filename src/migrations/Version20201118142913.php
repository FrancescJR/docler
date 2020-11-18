<?php

declare(strict_types=1);

namespace Cesc\Docler\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Ramsey\Uuid\Uuid;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201118142913 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Generates some initial data';
    }

    public function up(Schema $schema) : void
    {
        $idCesc = Uuid::uuid1();
        $idMauro = Uuid::uuid1();
        // generate users
        $this->addSql("INSERT IGNORE into user(id, username) values('{$idCesc->toString()}', 'cesc' )");
        $this->addSql("INSERT IGNORE into user(id, username) values('{$idMauro->toString()}', 'mauro' )");
        $this->addSql("INSERT IGNORE into user(id, username) values(UUID(), 'marta' )");
        $this->addSql("INSERT IGNORE into user(id, username) values(UUID(), 'luca' )");
        $this->addSql("INSERT IGNORE into user(id, username) values(UUID(), 'mattia' )");
        $this->addSql("INSERT IGNORE into user(id, username) values(UUID(), 'stephanie' )");
        $this->addSql("INSERT IGNORE into user(id, username) values(UUID(), 'charles' )");
        $this->addSql("INSERT IGNORE into user(id, username) values(UUID(), 'ludwig' )");

        $taskDescriptions = [
            "Prepare a metting",
            "Do the presentation for the stake holders",
            "Solve bug 45",
            "Go for a walk",
            "Send mass email to the whole company",
            "Feed the fishes",
            "Water the plants"
        ];

        for ($i=0; $i<10; $i ++) {
            $this->addSql("INSERT IGNORE into task(id, description, status, user_id) values".
                 "(UUID(), '{$taskDescriptions[array_rand($taskDescriptions)]}', 'todo', '{$idCesc->toString()}')");
        }

        for ($i=0; $i<10; $i ++) {
            $this->addSql("INSERT IGNORE into task(id, description, status, user_id) values".
                          "(UUID(), '{$taskDescriptions[array_rand($taskDescriptions)]}', 'todo', '{$idMauro->toString()}')");
        }

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql("DELETE FROM task");
        $this->addSql("DELETE FROM user");
    }
}
