# 🚀 Portfolio avec Symfony, React et Webpack

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://mit-license.org/)
[![Symfony](https://img.shields.io/badge/Symfony-7.3-000000?logo=symfony&logoColor=white)](https://symfony.com/)
[![React](https://img.shields.io/badge/React-19.1-blue?logo=react)](https://reactjs.org/)
[![TypeScript](https://img.shields.io/badge/TypeScript-5.8-blue?logo=typescript)](https://www.typescriptlang.org/)
[![Docker](https://img.shields.io/badge/Docker-ready-blue?logo=docker)](https://www.docker.com/)
[![Taskfile](https://img.shields.io/badge/Taskfile-supported-blueviolet)](https://taskfile.dev)
[![GrumPHP](https://img.shields.io/badge/GrumPHP-enabled-brightgreen)](https://github.com/phpro/grumphp)

Ce projet est un **portfolio personnel** développé avec **Symfony 7.3**, utilisant **React**, **Webpack** et conteneurisé avec **Docker**. Il comprend une configuration multi-environnement (`dev`, `test`, etc.) et des vérifications automatisées de qualité de code via **GrumPHP**, **PHPStan**, **PHPUnit** et **PHP CodeSniffer**.

---

## 📚 Sommaire

- [🔧 Prérequis](#prérequis)
- [📁 Configuration des environnements](#configuration-des-environnements)
- [▶️ Commandes disponibles](#commandes-disponibles)
    - [🖥️ Conteneurs](#démarrer-les-conteneurs)
    - [🧪 Qualité de code](#commandes-de-clean-code)
- [🌱 Exemple avec un autre environnement](#exemple-avec-un-autre-environnement)
- [👀 Accès en local](#accès-en-local)
- [👤 Contact](#contact)
- [📝 Licence](#licence)

---

## Prérequis

Avant de commencer, si ce n'est pas déjà fait, installez les outils suivants :

| Outil           | Documentation officielle                               |
|----------------|--------------------------------------------------------|
| Docker         | [docs.docker.com/get-docker](https://docs.docker.com/get-docker/) |
| Docker Compose | [docs.docker.com/compose/install](https://docs.docker.com/compose/install/) |
| Taskfile       | [taskfile.dev/installation](https://taskfile.dev/installation/) |

---

## Configuration des environnements

Chaque environnement (`dev`, `test`, etc.) doit avoir un fichier `.env` correspondant :

```bash
.env.dev
.env.test
```

Ces fichiers sont utilisés par `Taskfile.yml` et Symfony.

---

## Commandes disponibles

Les commandes sont accessibles via `task`.

### Démarrer les conteneurs

| Commande             | Description                                               |
|----------------------|-----------------------------------------------------------|
| `task up`            | Lance les conteneurs (`ENV=dev` par défaut)               |
| `task up -- hard`    | Force la reconstruction des images et relance les services |
| `task down`          | Arrête et supprime les conteneurs                          |
| `task logs`          | Affiche les logs de tous les services                      |
| `task logs php`      | Affiche les logs du conteneur PHP                          |
| `task logs nginx`    | Affiche les logs du conteneur NGINX                        |

### Commandes de clean code

Des outils de vérification sont intégrés pour maintenir une base de code propre :

| Commande            | Description                              |
|---------------------|------------------------------------------|
| `task phpstan`      | Analyse statique du code (niveau 8)      |
| `task phpcs`        | Vérification du style PSR-12             |
| `task phpunit`      | Lancement des tests unitaires            |
| `task check-code`   | Exécute tous les outils via GrumPHP      |

---

## GrumPHP & Git Hooks

Le projet utilise un **hook `pre-commit`** configuré via **GrumPHP**. Cela garantit que les outils suivants sont exécutés avant chaque commit :

- ✅ **PHPStan** (`phpstan.dist.neon`)
- ✅ **PHPUnit** (`phpunit.dist.xml`)
- ✅ **PHPCS** (standard `PSR12`)

Aucune erreur n’est tolérée avant un commit valide.

### ⚡️ Installation du hook pre-commit

Après avoir cloné le dépôt et lancé `composer install`, vous devez initialiser le hook Git localement :

```bash
vendor/bin/grumphp git:init
```

Cette commande installe le hook `pre-commit` dans le dossier `.git/hooks/` de votre dépôt local.

---

## Exemple avec un autre environnement

Vous pouvez spécifier un autre environnement via la variable `ENV` :

```bash
ENV=test task up
ENV=test task logs
```

Assurez-vous que le fichier `.env.test` existe.

---

## Accès en local

Une fois les conteneurs lancés, le portfolio est accessible à l'adresse suivante :  
[http://app.portfolio.com](http://app.portfolio.com)

---

## Contact

**Nom :** _Thomas Gharbi_   
**Email :** [thomas.gharbi@gmail.com](mailto:thomas.gharbi@gmail.com)  
**GitHub :** [@thomasGharbi](https://github.com/thomasGharbi)

---

## Licence

Ce projet est sous licence [MIT](https://mit-license.org/).
