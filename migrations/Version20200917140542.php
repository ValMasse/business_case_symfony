<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200917140542 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_32EB52E8E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE administrateur_question (administrateur_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_46CF8F2D7EE5403C (administrateur_id), INDEX IDX_46CF8F2D1E27F6BF (question_id), PRIMARY KEY(administrateur_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, ligne1 VARCHAR(38) NOT NULL, ligne2 VARCHAR(38) DEFAULT NULL, ligne3 VARCHAR(38) DEFAULT NULL, code_postal VARCHAR(6) NOT NULL, commune VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chef_projet (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_54BBCCD2E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domaine (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(50) NOT NULL, position INT NOT NULL, ratio_minimum NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_co (id INT AUTO_INCREMENT NOT NULL, session_id INT NOT NULL, adresse_id INT NOT NULL, test_technique_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_30B6F0FA613FECDF (session_id), INDEX IDX_30B6F0FA4DE7DC5C (adresse_id), INDEX IDX_30B6F0FA330C2B16 (test_technique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, domaine_id INT NOT NULL, niveau_id INT NOT NULL, position INT NOT NULL, enonce VARCHAR(255) NOT NULL, est_eliminatoire TINYINT(1) NOT NULL, est_actif TINYINT(1) NOT NULL, INDEX IDX_B6F7494E4272FC9F (domaine_id), INDEX IDX_B6F7494EB3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_test_technique (question_id INT NOT NULL, test_technique_id INT NOT NULL, INDEX IDX_BD869A721E27F6BF (question_id), INDEX IDX_BD869A72330C2B16 (test_technique_id), PRIMARY KEY(question_id, test_technique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_possible (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, code VARCHAR(20) NOT NULL, intitule VARCHAR(255) NOT NULL, est_juste TINYINT(1) NOT NULL, est_actif TINYINT(1) NOT NULL, INDEX IDX_21290E491E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, ville_session_id INT NOT NULL, formation_id INT NOT NULL, chef_projet_id INT DEFAULT NULL, numero INT NOT NULL, INDEX IDX_D044D5D4BF6308D6 (ville_session_id), INDEX IDX_D044D5D45200282E (formation_id), INDEX IDX_D044D5D4D3B0D67C (chef_projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_technique (id INT AUTO_INCREMENT NOT NULL, administrateur_id INT DEFAULT NULL, INDEX IDX_55A60F8B7EE5403C (administrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, date_de_naissance DATETIME DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, numero_pe VARCHAR(10) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, cv VARCHAR(1024) DEFAULT NULL, cv_filename VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_info_co (user_id INT NOT NULL, info_co_id INT NOT NULL, INDEX IDX_68BBEEF0A76ED395 (user_id), INDEX IDX_68BBEEF0E8ACC402 (info_co_id), PRIMARY KEY(user_id, info_co_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_reponse_possible (user_id INT NOT NULL, reponse_possible_id INT NOT NULL, INDEX IDX_5C3C4C94A76ED395 (user_id), INDEX IDX_5C3C4C94C53BC6BC (reponse_possible_id), PRIMARY KEY(user_id, reponse_possible_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville_session (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administrateur_question ADD CONSTRAINT FK_46CF8F2D7EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE administrateur_question ADD CONSTRAINT FK_46CF8F2D1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE info_co ADD CONSTRAINT FK_30B6F0FA613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE info_co ADD CONSTRAINT FK_30B6F0FA4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE info_co ADD CONSTRAINT FK_30B6F0FA330C2B16 FOREIGN KEY (test_technique_id) REFERENCES test_technique (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E4272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE question_test_technique ADD CONSTRAINT FK_BD869A721E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_test_technique ADD CONSTRAINT FK_BD869A72330C2B16 FOREIGN KEY (test_technique_id) REFERENCES test_technique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reponse_possible ADD CONSTRAINT FK_21290E491E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4BF6308D6 FOREIGN KEY (ville_session_id) REFERENCES ville_session (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D45200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4D3B0D67C FOREIGN KEY (chef_projet_id) REFERENCES chef_projet (id)');
        $this->addSql('ALTER TABLE test_technique ADD CONSTRAINT FK_55A60F8B7EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE user_info_co ADD CONSTRAINT FK_68BBEEF0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_info_co ADD CONSTRAINT FK_68BBEEF0E8ACC402 FOREIGN KEY (info_co_id) REFERENCES info_co (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reponse_possible ADD CONSTRAINT FK_5C3C4C94A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reponse_possible ADD CONSTRAINT FK_5C3C4C94C53BC6BC FOREIGN KEY (reponse_possible_id) REFERENCES reponse_possible (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur_question DROP FOREIGN KEY FK_46CF8F2D7EE5403C');
        $this->addSql('ALTER TABLE test_technique DROP FOREIGN KEY FK_55A60F8B7EE5403C');
        $this->addSql('ALTER TABLE info_co DROP FOREIGN KEY FK_30B6F0FA4DE7DC5C');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4D3B0D67C');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E4272FC9F');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D45200282E');
        $this->addSql('ALTER TABLE user_info_co DROP FOREIGN KEY FK_68BBEEF0E8ACC402');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EB3E9C81');
        $this->addSql('ALTER TABLE administrateur_question DROP FOREIGN KEY FK_46CF8F2D1E27F6BF');
        $this->addSql('ALTER TABLE question_test_technique DROP FOREIGN KEY FK_BD869A721E27F6BF');
        $this->addSql('ALTER TABLE reponse_possible DROP FOREIGN KEY FK_21290E491E27F6BF');
        $this->addSql('ALTER TABLE user_reponse_possible DROP FOREIGN KEY FK_5C3C4C94C53BC6BC');
        $this->addSql('ALTER TABLE info_co DROP FOREIGN KEY FK_30B6F0FA613FECDF');
        $this->addSql('ALTER TABLE info_co DROP FOREIGN KEY FK_30B6F0FA330C2B16');
        $this->addSql('ALTER TABLE question_test_technique DROP FOREIGN KEY FK_BD869A72330C2B16');
        $this->addSql('ALTER TABLE user_info_co DROP FOREIGN KEY FK_68BBEEF0A76ED395');
        $this->addSql('ALTER TABLE user_reponse_possible DROP FOREIGN KEY FK_5C3C4C94A76ED395');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4BF6308D6');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE administrateur_question');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE chef_projet');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE info_co');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE question_test_technique');
        $this->addSql('DROP TABLE reponse_possible');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE test_technique');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_info_co');
        $this->addSql('DROP TABLE user_reponse_possible');
        $this->addSql('DROP TABLE ville_session');
    }
}
