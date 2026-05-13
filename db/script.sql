create DATABASE IF NOT EXISTS RH;
use RH;

create table if not exists departments (
    id_department int auto_increment primary key,
    name VARCHAR(255) NOT NULL UNIQUE
);

create table if not exists type_congee (
    id_congee int auto_increment primary key,
    libelle VARCHAR(255) NOT NULL UNIQUE,
    jour_annuel int NOT NULL,
    deductible BOOLEAN NOT NULL DEFAULT 1
);

create table if not EXISTS employees (
    id_employee int auto_increment primary key,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role enum('employee', 'rh', 'admin') NOT NULL,
    date_embauche DATE NOT NULL,
    actif BOOLEAN NOT NULL DEFAULT 1,
    id_department int,
    FOREIGN KEY (id_department) REFERENCES departments(id_department)
);

CREATE TABLE IF NOT EXISTS soldes (
    id_solde INT AUTO_INCREMENT PRIMARY KEY,
    id_employee INT NOT NULL,
    id_congee INT NOT NULL,
    annee INT NOT NULL,
    jour_attribue INT NOT NULL,
    jour_pris INT NOT NULL,
    jour_restant INT GENERATED ALWAYS AS (jour_attribue - jour_pris) STORED,
    FOREIGN KEY (id_employee) REFERENCES employees(id_employee),
    FOREIGN KEY (id_congee) REFERENCES type_congee(id_congee),
    UNIQUE KEY uq_solde_employee_congee_annee (id_employee, id_congee, annee)
);

CREATE TABLE IF NOT EXISTS conges (
    id_conge INT AUTO_INCREMENT PRIMARY KEY,
    id_employee INT NOT NULL,
    type_congee INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    nb_jours INT NOT NULL,
    motif VARCHAR(255) NOT NULL,
    statut ENUM('en attente', 'approuvee', 'acceptee', 'annulee') NOT NULL DEFAULT 'en attente',
    commentaire_rh VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    traite_par INT NOT NULL,
    FOREIGN KEY (id_employee) REFERENCES employees(id_employee),
    FOREIGN KEY (type_congee) REFERENCES type_congee(id_congee),
    FOREIGN KEY (traite_par) REFERENCES employees(id_employee)
);

