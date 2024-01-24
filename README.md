
# Projet d'AdminWeb
Dans le contexte des cours de développement Web, nous avons réalisé un projet centré sur l'utilisation du framework Symfony. L'objectif principal était de concevoir une interface Web destinée à simplifier le recensement des résidents d'une ville. L'utilisateur avait la possibilité d'ajouter, de modifier et de supprimer des habitants. De plus, il pouvait accéder à une liste complète des habitants, avec la capacité de les trier selon différents critères tels que l'ordre alphabétique ou les adresses.

## Menu Habitant
Ici l'utilisateur à accés à la liste globale de tous les habitants ajoutés à la base de donnée. 
        

![img](https://media.discordapp.net/attachments/1017135217988878336/1199727124626559126/image.png?ex=65c397f4&is=65b122f4&hm=ecaa1922a910a2e404d20a4b54409599f8457d36df45419cf702e14aee1f4a13&=&format=webp&quality=lossless&width=896&height=116)
        

## Visualisation habitant
Sur cette page, l'utilisateur à accés à toutes les données de l'utilisateur:
- Nom
- Prenom
- Adresse

Il peut revenir à la page précédente en utilisant `retour à la liste`
        
![img](https://media.discordapp.net/attachments/1017135217988878336/1199727714098233405/image.png?ex=65c39880&is=65b12380&hm=e767397d5e97a5819db01aad1939e6cdd3434147bde2e3bfcece1d0b076db894&=&format=webp&quality=lossless&width=896&height=228)


## Mise à jour de l'habitant
Sur celle-ci, l'utilisateur peut modifier tous les champs de l'habitant ainsi que sa position GPS (pour l'affichage dashboard). 

![img](https://media.discordapp.net/attachments/1017135217988878336/1199727755550543942/image.png?ex=65c3988a&is=65b1238a&hm=b7d87f57aa375c7d03076f28afcad5d8527c1d047ac3b35a3d9d08874018fa5d&=&format=webp&quality=lossless&width=896&height=228)

## Création nouvel habitant
Sur cette page l'utilisateur peut rentrer toutes les informations liée à l'habitant.

![img](https://media.discordapp.net/attachments/1017135217988878336/1199727287256502272/image.png?ex=65c3981b&is=65b1231b&hm=7ec3b069163dfc836f70e1245e9f962b808235cac5960d0f1654d84979609952&=&format=webp&quality=lossless&width=340&height=428)

## Technologies Utilisées
- Symfony
- PHP
- Twig
- Doctrine
- CSS - Tailwind

## Installation
Pour installer et exécuter ce projet, suivez ces étapes :

Clonez le dépôt : 
```bash
git clone https://github.com/MrEleffant/ProjetWeb
```
Installez les dépendances : 
```bash
composer install
```
Configurez votre fichier .env pour la base de données. (La base est par défaut configurer avec MariaDB)

Créez la base de données : 
```bash
php bin/console doctrine:database:create
```
Effectuez les migrations : 
```bash
php bin/console doctrine:migrations:migrate
```
(Optionnel) Ajouter la liste d'habitant à disposition. Pour se faire il faut se connecter au serveur de base de donnée et se connecter à la base de données du projet.
```bash
mysql -u <utilisateur> -p 
use <votre base de donnée attribué au projet>
```
il suffit ensuite de copier coller et exécuter le contenu du fichier init-data.sql situé dans le dossier /data du projet. (Attention les commandes contenu dans celui ci agissent sur une table nommé habitant).

Lancez le serveur de développement : 
```bash
symfony server:start
```