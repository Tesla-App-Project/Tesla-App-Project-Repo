# Tesla app

## MVC :

### Premiers pas :

Composer :

Configurer Composer

- Installer Composer sur votre machine (https://getcomposer.org/)
- Penser à ajouter une version de PHP supperieur à 7.1 dans vos variables d'environement en cas d'erreur
- Lancer la commande d'installation dans le terminal du projet : composer install

Env :

Configurer votre base de données (via .env)

- Copier, coller ".env.example"
- Modifier le nom en ".env"
- Modifier les données du .env, selon la configuration de votre base de données

Migration :

Lancer la migration des tables / colonnes dans les tables

- Lancer la commande d'exécution des migrations : "php migrations.php"
