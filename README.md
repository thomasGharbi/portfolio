# 🚀 Portfolio avec Symfony

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://mit-license.org/)
[![Symfony](https://img.shields.io/badge/Symfony-7.3-000000?logo=symfony&logoColor=white)](https://symfony.com/)
[![Docker](https://img.shields.io/badge/Docker-ready-blue?logo=docker)](https://www.docker.com/)
[![Taskfile](https://img.shields.io/badge/Taskfile-supported-blueviolet)](https://taskfile.dev)

Ce projet est un portfolio personnel développé avec **Symfony** et conteneurisé avec **Docker**. Il inclut une configuration multi-environnement (dev, test, etc.).

---

## 📚 Sommaire

- [🔧 Prérequis](#prérequis)
- [📁 Configuration des environnements](#configuration-des-environnements)
- [▶️ Commandes disponibles](#commandes-disponibles)
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

Chaque environnement (`dev`, `test`, etc.) doit avoir un fichier `.env` correspondant, par exemple :

```bash
.env.dev
.env.test
```

Ces fichiers sont utilisés par le fichier `Taskfile.yml`.

---

## Commandes disponibles

Les commandes sont accessibles avec `task` :

### Démarrer les conteneurs

| Commande             | Description                                               |
|----------------------|-----------------------------------------------------------|
| `task up`            | Lance les conteneurs (`ENV=dev` par défaut)               |
| `task up -- hard`    | Force la reconstruction des images et relance les services |

### Arrêter les conteneurs

| Commande     | Description                                  |
|--------------|----------------------------------------------|
| `task down`  | Arrête et supprime les conteneurs            |

### Logs

| Commande            | Description                                |
|---------------------|--------------------------------------------|
| `task logs`         | Logs de tous les services                  |
| `task logs php`     | Logs du conteneur PHP                      |
| `task logs nginx`   | Logs du conteneur NGINX                    |

---

## Exemple avec un autre environnement

Vous pouvez spécifier un autre environnement via la variable `ENV` (par défaut `ENV=dev`) :

```bash
ENV=test task up
ENV=test task logs
```

Assurez-vous que le fichier `.env.test` existe.

---

## Accès en local

Une fois les conteneurs lancés, le portfolio sera accessible à l'adresse suivante : [app.portfolio.com](http://app.portfolio.com/)

---

## Contact

**Nom :** _Thomas Gharbi_   
**Email :** [thomas.gharbi@gmail.com](mailto:thomas.gharbi@gmail.com)  
**GitHub :** [@thomasGharbi](https://github.com/thomasGharbi)

---

## Licence

Ce projet est sous licence [MIT](https://mit-license.org/).
