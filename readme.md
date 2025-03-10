# **README du Projet Blog Hygge**

## **Description du projet**
Ce projet consiste en la création d'un blog sur le thème "hygge", permettant à une utilisatrice de publier des articles autour de sujets qui l’inspirent. L’application propose une gestion des articles, des commentaires modérés, et une interface administrateur pour la gestion globale du contenu.

## **Fonctionnalités principales**
- **Consultation des articles** : Les visiteurs peuvent lire les articles postés sur le blog.
- **Gestion des articles** : L’administrateur peut créer, modifier et supprimer des articles.
- **Gestion des commentaires** : Les commentaires postés par les utilisateurs peuvent être modérés.
- **Statistiques d’articles** : Suivi du nombre de vues des articles.
- **Authentification** : Gestion sécurisée de l'accès utilisateur, incluant le changement de mot de passe.

## **Technologies utilisées**
- **Frontend** : HTML, CSS, JavaScript
- **Backend** : PHP (avec PDO pour MySQL et MongoDB Driver)
- **Bases de données** :
  - MySQL pour les données structurées (utilisateurs, articles, commentaires)
  - MongoDB pour les données non structurées (statistiques de vues)
- **Environnement** : Docker avec Nginx
- **Déploiement** : Heroku

## **Installation**
### Prérequis
- Docker et Docker Compose installés
- Accès à une instance MySQL (via JawsDB) et MongoDB Atlas
- Heroku CLI pour le déploiement

### Étapes
1. **Cloner le projet**
   ```bash
   git clone <url_du_répertoire>
   cd <nom_du_répertoire>
   ```

2. **Lancer les conteneurs Docker**
   ```bash
   docker-compose up -d
   ```

3. **Accéder à l’application**
   Ouvrir [http://localhost:4000](http://localhost:4000) dans le navigateur.

## **Configuration**
### Variables d'environnement
Les informations sensibles comme les identifiants de bases de données doivent être configurées via des variables d'environnement :
- MySQL :
  ```env
  MYSQL_ROOT_PASSWORD=<mot_de_passe_root>
  MYSQL_DATABASE=<nom_de_la_base>
  MYSQL_USER=<nom_utilisateur>
  MYSQL_PASSWORD=<mot_de_passe_utilisateur>
  ```
- MongoDB :
  ```env
  MONGODB_URI=<url_connection_mongodb>
  ```

## **Utilisation**
### Accès Administrateur
- Connexion via `/admin`
- Fonctionnalités disponibles : gestion des articles, des commentaires et des utilisateurs

### Gestion des Articles
- Création, modification et suppression d’articles
- Catégorisation des articles

### Modification du mot de passe
Voici le fonctionnement pour changer un mot de passe :
1. L’utilisateur fournit l’ancien mot de passe ainsi que le nouveau mot de passe et sa confirmation.
2. Le système vérifie la correspondance avec l'ancien mot de passe stocké.
3. Si la vérification est correcte, le mot de passe est mis à jour dans la base de données avec un hachage sécurisé.

## **Bonnes pratiques adoptées**
- **Sécurité** :
  - Protection contre les attaques XSS avec `htmlspecialchars()`
  - Protection contre les injections SQL avec des requêtes préparées
  - Hachage des mots de passe avec `password_hash()`
  - Jetons CSRF pour les opérations critiques
- **Performance** :
  - Compression des images et mise en cache
  - Utilisation de `fetch()` pour les requêtes asynchrones
- **Documentation** :
  - Commentaires clairs dans le code
  - Documentation des fonctions importantes avec PHPDoc

## **Déploiement sur Heroku**
1. **Connexion au registre Docker d'Heroku**
   ```bash
   heroku container:login
   ```

2. **Construction et déploiement de l'image Docker**
   ```bash
   heroku container:push web --app <nom_application>
   heroku container:release web --app <nom_application>
   ```

3. **Ajout des addons pour les bases de données**
   ```bash
   heroku addons:create jawsdb:kitefin --app <nom_application>
   ```

## **Améliorations futures**
- Intégration d'un système d’authentification OAuth
- Implémentation de tests automatisés
- Amélioration de la gestion utilisateur (profils personnalisés, notifications)

## **Auteur**
- Quentin Beaudiquez

