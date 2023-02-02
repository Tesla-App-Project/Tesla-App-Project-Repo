# Tesla app

## MVC :

### Premiers pas :

Composer :

Configurer Composer

- Installer Composer sur votre machine (https://getcomposer.org/)
- Penser à ajouter une version de PHP supérieure à 7.1 dans vos variables d'environnement en cas d'erreur
- Lancer la commande d'installation dans le terminal du projet : composer install

Env :

Configurer votre base de données (via .env)

- Copier, coller ".env.example"
- Modifier le nom en ".env"
- Modifier les données du .env, selon la configuration de votre base de données
- Veillez à bien ajouter les variables d'environnement dans votre fichier .env (DEV_TOKEN, PROD_TOKEN...)

Migration :

Lancer la migration des tables / colonnes dans les tables

- Lancer la commande d'exécution des migrations : "php migrations.php"

### Pour les URL (les anciennes fonctionnent toujours):

Ancienne : **localhost/votreprojet/index.php?url=controller/action**

Nouvelle : **nomdedomaine/controller/action**

Pour utiliser les nouvelles url (elles ne sont pas obligatoire) il faut créer un virtualhost:

- **_Clic Gauche sur l'icon de wamp => Vos VirtualHosts => Gestion VirtualHost_**

ou en allant ici : http://localhost/add_vhost.php

- **_Dans "Nom du Virtual Host" vous mettez un nom qui remplacera localhost (localhost fonctionnera toujours)_**

> Exemple : tesla

- **_Dans "Chemin complet absolu du dossier VirtualHost" vous mettez le chemin à la racine de votre projet_**

> Exemple : C:\wamp64\www\Tesla-App-Project-Repo

- **_Vous cliquez sur "Démarrer la création ou la modification du VirtualHost"_**

Enfin il faut redémarrer les DNS:

- **_Clic droit sur l'icon wamp => outils => Redémarrage DNS_**

Pour tester (avec le nom du virtualhost choisi):

- http://VotreNomDuVirtualHost/simone/boat

La page doit s'afficher.
