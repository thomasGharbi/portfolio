#!/bin/sh
set -e

echo "Installation des dépendances..."
[ -d node_modules ] || npm install

echo "Démarrage du développement et du watch..."
exec npm run watch
