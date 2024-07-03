# Projet PHP MVC CRUD

## Description
Ce projet est une application CRUD simple utilisant le modèle MVC en PHP. Il permet la gestion des articles et des catégories.

** Points clés 
- **MVC (Modèle-Vue-Controller)** : Structure de l'application pour séparer la logique métier, la gestion des données et la présentation.
- **Design Patterns**: Ce projet implémente plusieurs design patterns pour améliorer la maintenabilité et l'évolution du code :
     - **Singleton** : Assure qu'une classe n'ait qu'une seule instance et fournit un point d'accès global à cette instance.
     - **Factory** : Définit une interface pour créer des objets sans spécifier les classes concrètes.
     - **Injection de dépendances** : Facilite la gestion des dépendances et améliore la testabilité en injectant les les dépendance requises dans les classes au lieu de les instancier directement. 

## Structure du projet
- **app/** : Contient la logique principale de l'application.
     - **Controller/** : Contient les contrôleurs pour gérer les requêtes et les réponses.
     - **Models/** : Contient les modèles qui gèrent les données et les intéractions avec la base de donnée.
     - **Views/** : Contient les vues pour afficher les données à l'utilisateur.
     - **App.php** : Conteneur d'injection de dépendances entre la connexion à la base donnée et les modèles.
     - **Container.php** : Conteneur d'injection de dépendances pour les modèles et les contrôleurs.

- **config/** : Contient les configurations de l'application.
     - **DataBase.php** : Classe pour la connexion à la base de données.
     - **Constante.php** : Fichier contenant les constantes pour la connexion à la base de données.
     - **Router.php** : Gère les routes en utilisant Altorouter.

- **public/** : Contient les fichiers accessibles publiquement.
     - **components/** : Contient les composants réutilisables, comme `header.php`.
     - **assets/** : Contient les fichiers de style (CSS) et les scripts (JavaScript).
     - **images/** : Contient les images utilisées dans l'application.
     -**index.php** :  Point d'entrée principal de l'application. Il initialise l'application, configure les routes et traite les requêtes.

- **composer.json** : Fichier de configuration pour Composer, gérant les dépendances du projet.
- **vendor/** : Contient les bibliothèques et les dépendances installées via Composer.
- **crud.sql** : Fichier SQL pour initialiser la base de données.

## Installation
- Excécution du Fichier SQL :
    Pour initialiser votre base de données avec le schéma et les données nécessaires, exécutez le fichier 'crud.sql' situé à la racine du projet dans votre SGBD 	 

- Modifier le fichier Constante.php dans le dossier config/ :
     ![illustration](public/image/code.png)
     Modifier les constantes de connexion avec vos informations

- Démarrez le serveur de développement :
    - Ouvrir le terminal et naviguez vers le répértoire où vous avez placé le projet et taper la commande :
    php -S localhost:8000 -t public
    - Ou démarrer votre serveur de développement (xampp, wampp, ...)

## Contributions
Les contributions sont les bienvenues ! Veuillez ouvrir une issue ou soumettre une pull request pour toute amélioration ou correction de bugs.

## Contact
- **Nom** : Tendry Zéphyrin
- **Email** : tendryzephyrin@gmail.com
- **GitHub** : [Tendry-Rkt56](https://github.com/Tendry-Rkt56)