# IntelliSchool

IntelliSchool est le projet noté de développement web de l'année 2024-2025 de CY Tech, réalisé par:
- Leslie OCLOO
- Jonathan NGO
- Loïc ROBERT
- Thomas LABBE-NOBILI
- Haitam HANIA


## Installation

### Cloner le projet

Vous pouvez cloner le projet depuis `git` via la commande suivante:

```sh
git clone https://github.com/leslieahf/Projet-Ecole.git
```

### Installer les dépendances de PHP, de Composer et de Mysql (Linux)

Si vous avez déjà Composer installé sur votre système, vous pouvez passer cette étape, car vous avez déjà les dépendances
nécessaires.

Composer est l'outil qui permet d'installer les dépendances du projet. Pour fonctionner sur votre ordinateur, Composer
nécessite certaines dépendances.

Pour les installer sous Ubuntu (et distributions similaires), il faut exécuter :

```php
sudo apt install -y php php-xml php-curl php-mbstring composer mysql-server
```

Note : vous pouvez également préciser la version de PHP souhaitée dans le nom des paquets (e.g `php8.1`)

### Installer les dépendances du projet

Le projet est basé sur le framework Laravel.
Pour l'installer avec ses dépendances, il faut vous placer à l'intérieur du dossier et exécuter la commande suivante :

```php
php composer install
```

### Environnement

Le projet dépend de variables stockées dans le fichier `.env`.

La configuration par défaut ce situe dans le fichier `.env.example`.
Vous pouvez le copier/coller ou le renommer en `.env` pour l'utiliser :

```shell
cp .env.example .env
```
`

## Lancer le serveur

### Mode local (*127.0.0.1* ou *localhost* )
Vous pouvez lancer le serveur via la commande :

```shell
php artisan serve
```

Vous pourrez alors retrouver l'interface du projet à l'adresse http://127.0.0.1:8000/.

