#!/bin/sh
set -e

if [ -f package.json ]; then
  echo "Installation des dépendances..."
  [ -d node_modules ] || npm install
  exec npm run dev
else
  echo "Aucun package.json, attente..."
  tail -f /dev/null
fi
