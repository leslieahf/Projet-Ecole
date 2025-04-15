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

Si vous avez déjà Composer installé sur votre système, vous pouvez passer cette étape, car vous avez déjà les
dépendances nécessaires.

Composer est l'outil qui permet d'installer les dépendances du projet. Pour fonctionner sur votre ordinateur, Composer
nécessite certaines dépendances.

Pour les installer sous Ubuntu (et distributions similaires), il faut exécuter :

```php
sudo apt install -y php php-xml php-curl php-mbstring composer mysql-server
```

Note : vous pouvez également préciser la version de PHP souhaitée dans le nom des paquets (e.g `php8.1`)

### Installer les dépendances du projet

Le projet est basé sur le framework Laravel. Pour l'installer avec ses dépendances, il faut vous placer à l'intérieur du
dossier et exécuter la commande suivante :

```php
composer install
```
<!--
```php
composer require laracasts/flash
```

```php
composer require barryvdh/laravel-dompdf
```

```php
composer require laraveldaily/laravel-charts
```
-->

### Environnement

Le projet dépend de variables stockées dans le fichier `.env`.

La configuration par défaut ce situe dans le fichier `.env.example`. Vous pouvez le copier/coller ou le renommer en
`.env` pour l'utiliser :

```shell
cp .env.example .env
```

### Mettre en place la base de données

Le projet dispose de migrations SQL et de seeders pour mettre en place et peupler la base de données, déjà mise en place
par défaut. Il faut pour cela exécuter les commandes suivantes :

```php
php artisan migrate
```

```php
php artisan db:seed
```

```php
php artisan storage:link
```

Par défaut, trois utilisateurs sont déjà présents:

- Administrateur

  - login : `admin`
  - Mot de passe : `admin`

- Professeur

  - login : `prof`
  - Mot de passe : `prof`

- Eleve
  - login : `eleve`
  - Mot de passe : `eleve`

## Lancer le serveur

### Mode local (_127.0.0.1_ ou _localhost_ )

Vous pouvez lancer le serveur via la commande :

```shell
php artisan serve
```

Vous pourrez alors retrouver l'interface du projet à l'adresse http://127.0.0.1:8000/.

### Mode réseau

La commande devient :

```shell
php artisan serve --host 0.0.0.0 --port=8000
```

Il faut ensuite remplacer dans le navigateur la partie _127.0.0.1_ de l'adresse précédent par l'adresse IP (locale ou
public) ou le nom de domaine du serveur.

Pour trouver l'adresse IP de votre ordi, vous pouvez taper dans le terminal linux :

```shell
hostname -I
```

Pensez à ouvrir une redirection de port pour les échanges réseaux via Internet. Un pare-feu peut également bloquer le
bon fonctionnement du projet, il est donc important de vérifier ses paramètres.
