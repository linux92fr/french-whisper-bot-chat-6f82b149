
-- Ajouter des colonnes pour la réinitialisation de mot de passe
ALTER TABLE utilisateurs ADD COLUMN reset_token VARCHAR(255) NULL;
ALTER TABLE utilisateurs ADD COLUMN reset_token_expires DATETIME NULL;
