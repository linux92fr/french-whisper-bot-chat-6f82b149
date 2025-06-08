
-- Table pour stocker les inscriptions newsletter
CREATE TABLE IF NOT EXISTS newsletter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    date_inscription DATETIME NOT NULL,
    actif BOOLEAN DEFAULT TRUE,
    date_desinscription DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Index pour améliorer les performances
CREATE INDEX idx_email_newsletter ON newsletter(email);
CREATE INDEX idx_actif ON newsletter(actif);
CREATE INDEX idx_date_inscription ON newsletter(date_inscription);
