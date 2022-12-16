--
-- Structure de la table `todos`
--

CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL,
    `nom` varchar(30) NOT NULL,
    `prenom` varchar(30) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `todos`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `todos`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users` ADD UNIQUE(`email`);
COMMIT;

--
-- Structure de la table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
                         `id` int(11) NOT NULL,
                         `texte` varchar(200) NOT NULL,
                         `termine` tinyint(1) NOT NULL DEFAULT 0,
                         `user_id` int(11) NOT NULL,
                         `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `todos`
--
ALTER TABLE `todos`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `todos`
--
ALTER TABLE `todos`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `todos` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);
COMMIT;
