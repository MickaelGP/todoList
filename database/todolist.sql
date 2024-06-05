-- Création de la base de donnée
DROP DATABASE IF EXISTS todo;
CREATE DATABASE todo;

USE todo;

-- Suppression de la table users si elle existe
DROP TABLE IF EXISTS users;
-- Création de la table users
CREATE TABLE users(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    role VARCHAR(60) DEFAULT 'user',
    password CHAR(60) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Suppression de la table categories si elle existe
DROP TABLE IF EXISTS categories;
-- Création de la table categories
CREATE TABLE categories(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(60) NOT NULL,
    icon VARCHAR(60) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Suppression de la table todos si elle existe
DROP TABLE IF EXISTS todos;
-- Création de la table todos
CREATE TABLE todos(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    title VARCHAR(255) NOT NULL,
    user_id INT(10) UNSIGNED NOT NULL ,
    categorie_id INT(10) UNSIGNED NOT NULL ,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ,
    FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Suppression de la table items si elle existe
DROP TABLE IF EXISTS items;
-- Création de la table items
CREATE TABLE items(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255) NOT NULL,
    status TINYINT UNSIGNED DEFAULT 0,
    todo_id INT(10) UNSIGNED NOT NULL ,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (todo_id) REFERENCES todos(id) ON DELETE CASCADE
);

-- Déchargement des données dans la table users
INSERT INTO users (name, email, role, password) VALUES ('test', 'test@test.fr','admin' , '$2y$12$7Ey.ll2N2/5MNenS5yL/M.SfY0Vw0ShxsZMiQIlCEMy78LmyJuMHu');
-- Déchargement des données dans la table categories
INSERT INTO categories (name, icon) VALUES
('Voyage', 'fa-solid fa-plane'),
('Travail', 'fa-solid fa-briefcase');
-- Déchargement des données dans la table todos
INSERT INTO todos (title, user_id, categorie_id) VALUES
('Voyage en Italie', 1, 1),
('Faire le dossier pro', 1, 2);
-- Déchargement des données dans la table items
INSERT INTO items (name, status, todo_id) VALUES
('Préparer l\'itinéraire', 1, 1),
('Préparer le sac', 0, 1),
('Télécharger la version vierge', 0, 2);


