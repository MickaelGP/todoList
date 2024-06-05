# ToDo List Application

## Description
Une application de gestion de liste de tâches développée avec Laravel, CSS, Bootstrap, JavaScript et MySQL.

## Fonctionnalités
- Ajouter des tâches
- Marquer les tâches comme terminées
- Supprimer des tâches
- Filtrer les tâches par catégorie
- Interface d'administration pour gérer les catégories

## Technologies utilisées
- [Laravel](https://laravel.com/) - Framework PHP pour le backend
- [CSS](https://developer.mozilla.org/fr/docs/Web/CSS) - Pour le style
- [Bootstrap](https://getbootstrap.com/) - Framework CSS pour un design réactif
- [JavaScript](https://developer.mozilla.org/fr/docs/Web/JavaScript) - Pour les interactions dynamiques
- [MySQL](https://www.mysql.com/) - Base de données pour stocker les tâches

## Prérequis
- PHP >= 8
- Composer
- MySQL

## Installation
1. Clonez le dépôt :
    ```bash
    git clone https://github.com/MickaelGP/todoList.git
    cd todoList
    ```

2. Installez les dépendances PHP avec Composer :
    ```bash
    composer install
    ```

3. Configurez l'environnement :
    - Copiez le fichier `.env.example` en `.env` :
        ```bash
        cp .env.example .env
        ```
    - Modifiez le fichier `.env` pour configurer votre base de données MySQL et autres variables d'environnement :
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=votre_base_de_donnees
        DB_USERNAME=votre_utilisateur
        DB_PASSWORD=votre_mot_de_passe
        ```

5. Générez la clé de l'application :
    ```bash
    php artisan key:generate
    ```

6. Exécutez les migrations de base de données :
    ```bash
    php artisan migrate
    ```

7. Démarrez le serveur de développement Laravel :
    ```bash
    php artisan serve
    ```

## Utilisation
Ouvrez votre navigateur et accédez à `http://localhost:8000` pour voir l'application de gestion de liste de tâches en action.

## Licence
Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## Auteurs
- **MickaelGP** - [MickaelGP](https://github.com/MickaelGP)


