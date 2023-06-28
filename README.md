GARAGE VINCENT PARROT - SITE WEB VITRINE:

Ce projet consiste à développer une application web vitrine pour le Garage V. Parrot, un garage automobile situé à Toulouse, offrant des services de réparation de la carrosserie et de la mécanique, l'entretien régulier des voitures, ainsi que la vente de véhicules d'occasion.

FONCTIONNALITES :

-Se connecter: Les utilisateurs (administrateur et employés) peuvent se connecter à l'application à l'aide de leur adresse e-mail et d'un mot de passe sécurisé.
Quand l'administrateur se connecte, il peut trouver l'onglet "Gestion des employés" pour gérer les employés. En revanche, lorsque l'employé se connecte, il ne trouve pas l'onglet de gestion des employés."

-Présenter les services: La page d'accueil du site web affiche les différents services de réparation automobile proposés par le garage. L'administrateur et employés peuvent modifier ces informations à partir de l'espace d'administration(dashboard).

-Définir les horaires d’ouverture: Les horaires d'ouverture du garage sont visibles dans le pied de chaque page du site.  L'administrateur et employés peut préciser ces horaires depuis le dashboard.

-Exposer les voitures d'occasion: Les visiteurs peuvent consulter la liste des véhicules d'occasion disponibles à la vente. Chaque voiture affiche des informations telles que son prix, une image mise en avant, l'année de mise en circulation et le kilométrage. Les employés peuvent ajouter de nouvelles voitures depuis leur espace.

-Filtrer la liste des véhicules d’occasion: Les visiteurs peuvent filtrer la liste des voitures d'occasion en fonction du prix, du kilométrage et de l'année de mise en circulation.

-Permettre de contacter l'atelier: Les visiteurs peuvent contacter le garage par téléphone ou en utilisant un formulaire de contact en ligne. Les informations de contact sont également visibles en bas de chaque annonce de véhicule d'occasion.

-Recueillir les témoignages des clients: Les visiteurs peuvent laisser des témoignages contenant un nom, un commentaire et une note. Les avis seront modérés par un employé du garage et affichés sur la page d'accueil. Les employés peuvent également ajouter des témoignages depuis leur espace dédié.

INSTALLATION

1/ git clone https://github.com/Achrefffff/garage2
2/ Installez les dépendances du projet en exécutant la commande : composer install
3/ Configurez les informations de la base de données dans le fichier .env et exécutez les migrations avec la commande     suivante : php bin/console doctrine:migrations:migrate
4/ Exécutez la commande suivante : composer require --dev orm-fixtures
5/ puis éxécutez la commande : composer require --dev doctrine/doctrine-fixtures-bundle
6/ Enfin exécutez la commande suivante pour générer les fichiers de fixtures : php bin/console doctrine:fixtures:load
7/ Démarrez le serveur de développement avec la commande : symfony serve
8/ Accédez au site web à l'adresse http://localhost:8000 dans votre navigateur.

EN LOCAL : Admin -- V.parrot@garage.ecf  mot de passe : 123456 -- Employé -- choisir un email générer par les fixtures dans la base de donné et le mot de passe : 123456 -- 

LIEN de l application deployer sur heroku : http://gentle-cove-35949-a829e8c827e7.herokuapp.com
                                            ADMIN: vincentparrot@garage.ecf mot de passe: password
                                            EMPLOYE: employe@garage.ecf mot de passe: password


TECHNOLOGIES UTILISEES

Symfony 6.3.1
Twig - Moteur de templates - Framework PHP
Doctrine - ORM pour la gestion de la base de données
HTML, CSS,Bootstrap JavaScript - Front-end

AUTEUR
Achref .