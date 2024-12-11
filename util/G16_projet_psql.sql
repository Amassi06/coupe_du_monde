-- Création de la table G16_Pays
CREATE TABLE IF NOT EXISTS G16_Pays( 
    pays_id VARCHAR(10) PRIMARY KEY,
    pays_nom VARCHAR(25) NOT NULL,
    capitale VARCHAR (25) NOT NULL,
    continent VARCHAR(25) NOT NULL
);

-- Insertion des données dans la table G16_Pays
INSERT INTO G16_Pays (pays_id, pays_nom, capitale, continent)
VALUES 
('URY', 'Uruguay', 'Montevideo', 'Amérique du Sud'),
('ITA', 'Italie', 'Rome', 'Europe'),
('DEU_WEST', 'Allemagne de l''Ouest', 'Bonn', 'Europe'),
('BRA', 'Brésil', 'Brasília', 'Amérique du Sud'),
('ARG', 'Argentine', 'Buenos Aires', 'Amérique du Sud'),
('FRA', 'France', 'Paris', 'Europe'),
('ESP', 'Espagne', 'Madrid', 'Europe'),
('CHE', 'Suisse', 'Berne', 'Europe'),
('SWE', 'Suède', 'Stockholm', 'Europe'),
('CHL', 'Chili', 'Santiago', 'Amérique du Sud'),
('ENG', 'Angleterre', 'Londres', 'Europe'),
('MEX', 'Mexique', 'Mexico', 'Amérique du Nord'),
('USA', 'États-Unis', 'Washington, D.C.', 'Amérique du Nord'),
('KOR', 'Corée du Sud', 'Séoul', 'Asie'),
('ZAF', 'Afrique du Sud', 'Pretoria', 'Afrique'),
('RUS', 'Russie', 'Moscou', 'Europe'),
('QAT', 'Qatar', 'Doha', 'Asie'),
('CHN', 'Chine', 'Pékin', 'Asie'),
('NOR', 'Norvège', 'Oslo', 'Europe'),
('JPN', 'Japon', 'Tokyo', 'Asie'),
('CAN', 'Canada', 'Ottawa', 'Amérique du Nord'),
('NZ','Nouvelle-Zélande','Wellington','Océanie'),
('AU','Australie','Canberra','Océanie'),
('DEU', 'Allemagne', 'Berlin', 'Europe');

-- Création de la table G16_coupe_du_monde
CREATE TABLE IF NOT EXISTS G16_coupe_du_monde (     
    édition INT NOT NULL,
    année SERIAL PRIMARY KEY,
    catégorie CHAR(1) NOT NULL CHECK (catégorie IN ('H', 'F')),
    lieu VARCHAR(255) NOT NULL,
    vainqueur_id VARCHAR(25) NOT NULL,
    FOREIGN KEY (vainqueur_id) REFERENCES G16_Pays(pays_id)
);
  -- Insertion des données dans la table G16_coupe_du_monde   
INSERT INTO G16_coupe_du_monde (édition, année, catégorie, lieu, vainqueur_id)
VALUES
(1, 1930, 'H', 'Uruguay', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Uruguay')),
(2, 1934, 'H', 'Italie', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Italie')),
(3, 1938, 'H', 'France', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Italie')),
(4, 1950, 'H', 'Brésil', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Uruguay')),
(5, 1954, 'H', 'Suisse', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Allemagne de l''Ouest')),
(6, 1958, 'H', 'Suède', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Brésil')),
(7, 1962, 'H', 'Chili', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Brésil')),
(8, 1966, 'H', 'Angleterre', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Angleterre')),
(9, 1970, 'H', 'Mexique', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Brésil')),
(10, 1974, 'H', 'Allemagne de l''Ouest', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Allemagne de l''Ouest')),
(11, 1978, 'H', 'Argentine', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Argentine')),
(12, 1982, 'H', 'Espagne', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Italie')),
(13, 1986, 'H', 'Mexique', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Argentine')),
(14, 1990, 'H', 'Italie', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Allemagne de l''Ouest')),
(15, 1994, 'H', 'États-Unis', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Brésil')),
(16, 1998, 'H', 'France', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'France')),
(17, 2002, 'H', 'Corée du Sud et Japon', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Brésil')),
(18, 2006, 'H', 'Allemagne', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Italie')),
(19, 2010, 'H', 'Afrique du Sud', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Espagne')),
(20, 2014, 'H', 'Brésil', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Allemagne')),
(21, 2018, 'H', 'Russie', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'France')),
(22, 2022, 'H', 'QATAR', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Argentine')),
(1, 1991, 'F', 'Chine', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'États-Unis')),
(2, 1995, 'F', 'Suède', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Norvège')),
(3, 1999, 'F', 'États-Unis', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'États-Unis')),
(4, 2003, 'F', 'États-Unis', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Allemagne')),
(5, 2007, 'F', 'Chine', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Allemagne')),
(6, 2011, 'F', 'Allemagne',(SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Japon')),
(7, 2015, 'F', 'Canada',(SELECT pays_id FROM G16_Pays WHERE pays_nom = 'États-Unis')),
(8, 2019, 'F', 'France',(SELECT pays_id FROM G16_Pays WHERE pays_nom = 'États-Unis')),
(9, 2023, 'F', 'Australie', (SELECT pays_id FROM G16_Pays WHERE pays_nom = 'Espagne'));
     
-- Création de la table G16_organise
CREATE TABLE IF NOT EXISTS G16_organise (
    année_org INTEGER NOT NULL,
    id_org VARCHAR(25) NOT NULL,
    FOREIGN KEY (année_org) REFERENCES G16_coupe_du_monde(année),
    FOREIGN KEY (id_org) REFERENCES G16_Pays(pays_id),
    PRIMARY KEY (année_org,id_org)
);

-- Insertion des données dans la table G16_organise
INSERT INTO G16_organise (année_org, id_org) VALUES 
((SELECT année FROM G16_coupe_du_monde WHERE année = 1930),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'URY')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1934),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'ITA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1938),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'FRA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1950), (SELECT pays_id FROM G16_Pays WHERE pays_id = 'BRA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1954),  (SELECT pays_id FROM G16_Pays WHERE pays_id = 'CHE')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1958),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'SWE')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1962), (SELECT pays_id FROM G16_Pays WHERE pays_id = 'CHL')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1966),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'ENG')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1970),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'MEX')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1974),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'DEU_WEST')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1978),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'ARG')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1982),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'ESP')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1986),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'MEX')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1990),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'ITA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1994),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'USA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1998),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'FRA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2002),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'KOR')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2002),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'JPN')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2006), (SELECT pays_id FROM G16_Pays WHERE pays_id = 'DEU')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2010), (SELECT pays_id FROM G16_Pays WHERE pays_id = 'ZAF')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2014), (SELECT pays_id FROM G16_Pays WHERE pays_id = 'BRA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2018),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'RUS')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2022), (SELECT pays_id FROM G16_Pays WHERE pays_id = 'QAT')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1991),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'CHN')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1995),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'SWE')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 1999),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'USA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2003),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'USA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2007),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'CHN')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2011),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'DEU')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2015),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'CAN')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2019),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'FRA')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2023),(SELECT pays_id FROM G16_Pays WHERE pays_id ='AU')),
((SELECT année FROM G16_coupe_du_monde WHERE année = 2023),(SELECT pays_id FROM G16_Pays WHERE pays_id = 'NZ'));





