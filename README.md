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

### Pour les URL (les anciennes fonctionne toujours):

Ancienne : **localhost/votreprojet/index.php?url=controller/action**

Nouvelle : **nomdedomaine/controller/action**

  

Pour utiliser les nouvelles url (elles ne sont pas obligatoire) il faut créer un virtualhost:

- ***Clic Gauche sur l'icon de wamp => Vos VirtualHosts => Gestion VirtualHost***

ou en allant ici : http://localhost/add_vhost.php

- ***Dans "Nom du Virtual Host" vous mettez un nom qui remplacera localhost (localhost fonctionnera toujours)***

> Exemple : tesla

- ***Dans "Chemin complet absolu du dossier VirtualHost" vous mettez le chemin à la racine de votre projet***

> Exemple : C:\wamp64\www\Tesla-App-Project-Repo

- ***Vous clickez sur "Démarrer la création ou la modification du VirtualHost"***

  

Enfin il faut redemarrer les DNS:

- ***Clic droit sur l'icon wamp => outils => Redémarrage DNS***

  
  

Pour tester (avec le nom du virtualhost choisi):

- http://VotreNomDuVirtualHost/simone/boat

La page doit s'afficher.