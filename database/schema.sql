
-- Base de données pour FOCOM UES ILIAD
CREATE DATABASE IF NOT EXISTS focom_iliad CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE focom_iliad;

-- Table des utilisateurs
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('admin', 'membre', 'visiteur') DEFAULT 'visiteur',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    actif BOOLEAN DEFAULT TRUE
);

-- Table des actualités
CREATE TABLE actualites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    image VARCHAR(255),
    urgent BOOLEAN DEFAULT FALSE,
    tags TEXT,
    auteur_id INT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    publie BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (auteur_id) REFERENCES utilisateurs(id)
);

-- Table des adhésions
CREATE TABLE adhesions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    poste VARCHAR(100),
    service VARCHAR(100),
    message TEXT,
    status ENUM('en_attente', 'approuve', 'refuse') DEFAULT 'en_attente',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des contacts
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sujet VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    traite BOOLEAN DEFAULT FALSE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des documents
CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    fichier VARCHAR(255) NOT NULL,
    categorie VARCHAR(100),
    public BOOLEAN DEFAULT TRUE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des élections
CREATE TABLE elections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    date_election DATE NOT NULL,
    resultats TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertion de données d'exemple
INSERT INTO actualites (titre, contenu, image, urgent, tags) VALUES
('Négociation collective : avancées importantes', 'Après plusieurs semaines de négociation, nous avons obtenu des avancées significatives sur les conditions de travail et les salaires. Cette victoire est le résultat de notre mobilisation collective...', 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=600', TRUE, 'Négociation,Salaires'),
('Formations FO', 'Nos prochaines sessions de formation pour les adhérents auront lieu en 2025. Inscrivez-vous dès maintenant pour développer vos compétences et connaître vos droits...', 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=600', FALSE, 'Formation,Événement'),
('Assemblée générale annuelle', 'L\'assemblée générale annuelle du syndicat se tiendra en 2025. Venez participer à la vie démocratique de votre syndicat et faire entendre votre voix...', 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600', FALSE, 'Assemblée,Démocratie');

-- Création d'un utilisateur admin par défaut
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role) VALUES
('Admin', 'Système', 'admin@focom-iliad.fr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');
