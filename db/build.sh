#!/bin/bash

# Nom de la base SQLite
DB_NAME="tp_RH.db"

# Supprimer l'ancienne base si elle existe
if [ -f "$DB_NAME" ]; then
    echo "Suppression de l'ancienne base..."
    rm "$DB_NAME"
fi

# Création de la base avec les tables
echo "Création des tables..."
sqlite3 "$DB_NAME" < script.sql

# Insertion des données
echo "Insertion des données..."
sqlite3 "$DB_NAME" < data.sql

echo "Base SQLite créée : $DB_NAME"