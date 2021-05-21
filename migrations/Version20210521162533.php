<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521162533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE DATABASE IF NOT EXISTS `todolist` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');
        $this->addSql("CREATE TABLE `doctrine_migrations` (
            `version` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
            `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
        $this->addSql("CREATE TABLE `tasks` (
            `id` int(11) NOT NULL,
            `user_id` int(11) DEFAULT NULL,
            `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `deadline` datetime NOT NULL,
            `done` tinyint(1) NOT NULL,
            `created_at` datetime NOT NULL DEFAULT current_timestamp(),
            `edited_at` datetime DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
        $this->addSql("INSERT INTO `tasks` (`id`, `user_id`, `task`, `deadline`, `done`, `created_at`, `edited_at`) VALUES
        (1, 1, 'koš', '2021-05-21 17:03:00', 0, '2021-05-21 17:03:24', '2021-05-21 17:03:24'),
        (2, 1, 'koš', '2021-05-21 17:03:00', 1, '2021-05-21 17:04:03', '2021-05-21 17:04:03'),
        (3, 1, 'lololol', '2021-05-22 17:31:00', 1, '2021-05-21 17:31:08', '2021-05-21 17:58:23'),
        (4, 1, 'brambory', '2021-05-29 15:45:00', 0, '2021-05-21 17:41:48', '2021-05-21 17:41:48'),
        (5, 1, 'sekat trávu', '2021-05-30 13:00:00', 0, '2021-05-21 17:42:09', '2021-05-21 17:42:09'),
        (6, 2, 'lovit mamuty', '2021-05-29 18:17:00', 1, '2021-05-21 18:17:23', '2021-05-21 18:18:02'),
        (7, 2, 'koksu 5 gram', '2021-06-22 21:21:00', 0, '2021-05-21 18:18:18', '2021-05-21 18:18:18')");
        $this->addSql("CREATE TABLE `users` (
            `id` int(11) NOT NULL,
            `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
            `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
            `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
            `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
            `created_at` datetime NOT NULL DEFAULT current_timestamp(),
            `edited_at` datetime DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
        $this->addSql("INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`, `edited_at`) VALUES
        (1, 'admin', '$2y$10$Ykyjd3SRQS0bQqz2EGqaBu90e9XDQn6kAK1L5M/vq6BTgS19sQy9K', 'admin@admin.cz', 'admin', '2021-05-21 17:02:41', '2021-05-21 17:02:41'),
        (2, 'user', '$2y$10$cvcDgEYARpgiT.Ijfs9m/.NKcmvq6gYwPojjXwdl1srOHZYRbszgu', 'user@user.cz', 'user', '2021-05-21 17:58:49', '2021-05-21 17:58:49')");
        $this->addSql("ALTER TABLE `doctrine_migrations`
        ADD PRIMARY KEY (`version`)");
        $this->addSql("ALTER TABLE `tasks`
        ADD PRIMARY KEY (`id`),
        ADD KEY `IDX_50586597A76ED395` (`user_id`)");
        $this->addSql("ALTER TABLE `users`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`)");
        $this->addSql("ALTER TABLE `tasks`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8");
        $this->addSql("ALTER TABLE `users`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3");
        $this->addSql("ALTER TABLE `tasks`
        ADD CONSTRAINT `FK_50586597A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
      COMMIT");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
