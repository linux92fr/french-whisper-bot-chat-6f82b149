
-- Table pour stocker les messages de contact
CREATE TABLE IF NOT EXISTS messages_contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    sujet VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    type_demande ENUM('information', 'adhesion', 'conseil', 'reclamation', 'autre') DEFAULT 'information',
    date_envoi DATETIME NOT NULL,
    traite BOOLEAN DEFAULT FALSE,
    reponse TEXT,
    date_reponse DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Index pour améliorer les performances
CREATE INDEX idx_email ON messages_contact(email);
CREATE INDEX idx_date_envoi ON messages_contact(date_envoi);
CREATE INDEX idx_traite ON messages_contact(traite);
