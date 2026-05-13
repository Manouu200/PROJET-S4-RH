-- SQLite n'utilise pas CREATE DATABASE ni USE

CREATE TABLE IF NOT EXISTS departments (
    id_department INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS type_congee (
    id_congee INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle TEXT NOT NULL UNIQUE,
    jour_annuel INTEGER NOT NULL,
    deductible INTEGER NOT NULL DEFAULT 1
);

CREATE TABLE IF NOT EXISTS employees (
    id_employee INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    prenom TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,

    -- SQLite ne possède pas ENUM
    role TEXT NOT NULL CHECK(role IN ('employee', 'rh', 'admin')),

    date_embauche DATE NOT NULL,
    actif INTEGER NOT NULL DEFAULT 1,

    id_department INTEGER,

    FOREIGN KEY (id_department)
        REFERENCES departments(id_department)
);

CREATE TABLE IF NOT EXISTS soldes (
    id_solde INTEGER PRIMARY KEY AUTOINCREMENT,

    id_employee INTEGER NOT NULL,
    id_congee INTEGER NOT NULL,

    annee INTEGER NOT NULL,
    jour_attribue INTEGER NOT NULL,
    jour_pris INTEGER NOT NULL,

    -- Colonne générée SQLite
    jour_restant INTEGER GENERATED ALWAYS AS (
        jour_attribue - jour_pris
    ) STORED,

    FOREIGN KEY (id_employee)
        REFERENCES employees(id_employee),

    FOREIGN KEY (id_congee)
        REFERENCES type_congee(id_congee),

    UNIQUE(id_employee, id_congee, annee)
);

CREATE TABLE IF NOT EXISTS conges (
    id_conge INTEGER PRIMARY KEY AUTOINCREMENT,

    id_employee INTEGER NOT NULL,
    type_congee INTEGER NOT NULL,

    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,

    nb_jours INTEGER NOT NULL,
    motif TEXT NOT NULL,

    -- Remplacement ENUM par CHECK
    statut TEXT NOT NULL DEFAULT 'en attente'
        CHECK(statut IN (
            'en attente',
            'approuvee',
            'acceptee',
            'annulee'
        )),

    commentaire_rh TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    traite_par INTEGER NOT NULL,

    FOREIGN KEY (id_employee)
        REFERENCES employees(id_employee),

    FOREIGN KEY (type_congee)
        REFERENCES type_congee(id_congee),

    FOREIGN KEY (traite_par)
        REFERENCES employees(id_employee)
);