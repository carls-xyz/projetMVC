# projetMVC — Parc d'activités (version 1)

Première version du projet **Parc d'activités**, réalisé pour le cours PHP orienté objet de l'IIM (décembre 2025).

Application MVC écrite en PHP pur : routeur maison, autoload, PDO, entités, modèles, contrôleurs et vues. Elle permet de lister des activités, de s'inscrire et se connecter, et de réserver une place.

Cette version ne contient pas encore l'espace admin (création et édition d'activités). La **version finale** est dans le repo [IIM_A2CDI_PHPOO](https://github.com/carls-xyz/IIM_A2CDI_PHPOO), avec un README détaillé (architecture, routes, installation).

## Lancer

1. Base MySQL `parc_activite` (schéma dans le repo [MVC](https://github.com/carls-xyz/MVC), fichier `parc_activite.sql`).
2. Ajuster les identifiants dans `app/utils/Bdd.php`.
3. Servir le dossier avec Apache et `mod_rewrite` (MAMP), puis ouvrir `index.php`.
