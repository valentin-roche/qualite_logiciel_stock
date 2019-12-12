# Qualite logiciel : gestion des stock
Projet étudiant portant sur la production de documents de projet, les bonnes pratiques de développement et le test unitaire.
> TO DO

# Mise en place avec WAMP
1) Placer le dossier contenant le projet dans le répertoire **www** (dans le répertoire d'installation de WAMP).
2) Créer un **virtualhost**, le nom importe peu, il faut juste être sur du chemin absolu vers le dossier projet.
3) Modifier le fichier de configuration appelé **config.php** situé dans le répertoire config du projet afin de permettre une connexion à la base de données.

# Mise en place avec un stack AMP
Procédure un peu inexacte pour le moment et dont les commandes sont uniquement valables sous Linux.
1) S'assurer d'avoir installé un stack AMP et que tout les composants sont fonctionnels.
2) Placer le dossier contenant le projet dans le répertoire **www**
3) Ajouter un fichier de configuration pour créer un **virtualhost** apache dans le dossier /etc/apache2/config (suivre [ce tutoriel](https://www.ostechnix.com/configure-apache-virtual-hosts-ubuntu-part-1/) a partir de la 4ème partie).
4) Modifier le fichier de configuration appelé **config.php** situé dans le répertoire config du projet afin de permettre une connexion à la base de données. 
5) Redémarrer le service apache :
`sudo service apache2 restart`
