# Qualite logiciel : gestion des stock
Projet étudiant portant sur la production de documents de projet, les bonnes pratiques de développement et le test unitaire.

# Prérequis communs
Peu importe la façon dont l'application sera mise en place, il faudra soit créer un utilisateur dans la base de données pour le site web ou alors adapter le fichier de configuration à un potentiel utilisateur déjà créé.
## Création utilisateur
Créer un utilisateur avec pour login : web et mot de passe : test_web. 
Cet utilisateur doit pouvoir se connecter en local si la base de données est sur le même serveur que le serveur d'installation de l'application ou alors à distance. 
Pour se faire, adapter la ligne **NOM_HOTE_BD** dans le fichier de configuration **configProd.php** en fonction de la situation.

## Création base de données
Dans le projet vous trouverez [le script de creation](https://github.com/valentin-roche/qualite_logiciel_stock/blob/master/resources/decathlux.sql) de la base de données, contenant un minimum d'enregistrements pour le bon fonctionnement (2 comptes utilisateurs et des rayons). Il suffit d'exécuter ce script avec votre SGBD pour créer la base de données du site

# Mise en place avec WAMP
1) Placer le dossier contenant le projet dans le répertoire **www** (dans le répertoire d'installation de WAMP).
2) Créer un **virtualhost**, le nommer **qualite-logiciel-stock**, et faites le pointer vers le dossier projet.
3) Vérifier la connexion en suivant ce lien : http://qualite-logiciel-stock

# Mise en place avec un stack AMP
Procédure un peu inexacte pour le moment et dont les commandes sont uniquement valables sous Linux.
1) S'assurer d'avoir installé un stack AMP et que tout les composants sont fonctionnels.
2) Placer le dossier contenant le projet dans le répertoire **www**
3) Ajouter un fichier de configuration pour créer un **virtualhost** apache dans le dossier /etc/apache2/config (suivre [ce tutoriel](https://www.ostechnix.com/configure-apache-virtual-hosts-ubuntu-part-1/) a partir de la 4ème partie) et appeler le virtualhost **qualite-logiciel-stock**. 
5) Redémarrer le service apache :
`sudo service apache2 restart`
6) Vérifier la connexion en suivant ce lien : http://qualite-logiciel-stock.

# Utilisation de l'application
## Comptes utilisateur
2 comptes sont disponnibles initialement, un administrateur et un vendeur.

| Login                 | Mot de passe | Role           |
|-----------------------|--------------|----------------|
| test.manager@test.com | testmgr      | administrateur |
| test.vendeur@test.com | testvendeur  | vendeur        |

## Utilisation de l'application
Pour l'utilisation de l'application des vidéos sont disponnibles [ici](ressources/videos).

# Contacts
Valentin Roche : valentin.roche@etu.univ-tours.fr
Florent Dumoulin : florent.dumoulin@etu.univ-tours.fr
