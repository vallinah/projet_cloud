/*insert into admin values('ADM001','admin','otisoavallinah@gmail.com','admin');*/
insert into admin values('ADM001','admin','antsamadagascar@gmail.com','admin');

/*insert into users(first_name,last_name,email,password,date_of_birth,created_date,is_valid) values('otisoa','vallinah','otisoavallinah@gmail.com','vallinah','2001-12-19','2024-12-19',true);
*/


-- Insertion de données de test
INSERT INTO users (user_id, first_name, last_name, email, password, date_of_birth, created_date, is_valid) VALUES
('USE-00001', 'jean', 'Smith', 'smith@example.com', '1234', '1990-05-15', NOW(), TRUE),
('USE-00002', 'Alice', 'Smith', 'alice.smith@example.com', '1234', '1990-05-15', NOW(), TRUE),
('USE-00003', 'Bob', 'Johnson', 'bob.johnson@example.com', '1234', '1985-09-20', NOW(), TRUE),
('USE-00004', 'Charlie', 'Williams', 'charlie.williams@example.com', '1234', '1992-03-10', NOW(), TRUE),
('USE-00005', 'David', 'Brown', 'david.brown@example.com', '1234', '1988-12-25', NOW(), TRUE),
('USE-00006', 'Eve', 'Jones', 'eve.jones@example.com', '1234', '1995-07-08', NOW(), TRUE),
('USE-00007', 'Frank', 'Garcia', 'frank.garcia@example.com', '1234', '1983-11-13', NOW(), TRUE),
('USE-00008', 'Grace', 'Miller', 'grace.miller@example.com', '1234', '1991-01-30', NOW(), TRUE),
('USE-00009', 'Hannah', 'Davis', 'hannah.davis@example.com', '1234', '1997-06-21', NOW(), TRUE),
('USE-00010', 'Isaac', 'Martinez', 'isaac.martinez@example.com', '1234','1997-06-21', NOW(), TRUE);

INSERT INTO session_config (minute_timeout)
VALUES (5);

/*section theme 3 */

INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Bitcoin','BTC',45000);
INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Ethereum','ETH',2500);
INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Binance Coin','BNB',300);
INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Cardano','ADA',1.2);
INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Solana','SOL',150);
INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Ripple','XRP',0.8);
INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Polkadot','DOT',25);
INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Dogecoin','DOGE',0.15);
INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Avalanche','AVAX',80);
INSERT INTO cryptocurrencies (name,symbol,current_price) VALUES('Chainlink','LINK',20);


INSERT INTO crypto_wallets (user_id, crypto_id, amount)
VALUES 
('USE-00001', 'CRY-00001', 1.23456789), -- Bitcoin
('USE-00001', 'CRY-00002', 2.34567890), -- Ethereum
('USE-00001', 'CRY-00003', 3.45678901), -- Litecoin
( 'USE-00001', 'CRY-00004', 4.56789012), -- Cardano
( 'USE-00001', 'CRY-00005', 5.67890123); -- Ripple

INSERT INTO admin(login,email,password) values('admin','admin@gmail.com','admin');

-- Exemple de données pour la table mouvement_crypto
INSERT INTO mouvement_crypto (nombre, cours, vente, achat, crypto_id, user_id, date_mouvement, is_valid)
VALUES
  (0.5000000, 53390.96, 1, 0, 'CRY-00001', 'USE-00001', '2025-02-06 10:00:00', FALSE),  -- Vente de Bitcoin
  (1.2000000, 641.11, 0, 1, 'CRY-00002', 'USE-00001', '2025-02-06 11:30:00', FALSE),  -- Achat d'Ethereum
  (0.1000000, 0.182338, 1, 0, 'CRY-00006', 'USE-00001', '2025-02-06 12:45:00', FALSE),  -- Vente de Ripple
  (3.5000000, 307.67, 0, 1, 'CRY-00003', 'USE-00001', '2025-02-06 14:00:00', FALSE),  -- Achat de Binance Coin
  (2.0000000, 0.611282, 1, 0, 'CRY-00004', 'USE-00001', '2025-02-06 15:15:00', FALSE);  -- Vente de Cardano

INSERT INTO mouvement_fond (montant_depot, date_mouvement_fond, montant_retrait, user_id, is_valid)
VALUES
(500.00, '2024-02-05 10:15:00', NULL, 'USE-00001',FALSE),
(1000.00, '2024-02-05 12:30:00', NULL, 'USE-00001',FALSE),
(250.50, '2024-02-06 08:45:00', NULL, 'USE-00001',FALSE),
(750.00, '2024-02-06 14:20:00', NULL, 'USE-00001',FALSE),
(1200.75, '2024-02-07 09:10:00', NULL, 'USE-00001',FALSE);

INSERT INTO mouvement_fond (montant_retrait, date_mouvement_fond, montant_depot, user_id, is_valid)
VALUES
(200.00, '2024-02-05 11:00:00', NULL, 'USE-00001',FALSE),
(500.00, '2024-02-05 13:15:00', NULL, 'USE-00001',FALSE),
(100.75, '2024-02-06 09:30:00', NULL, 'USE-00001',FALSE),
(350.00, '2024-02-06 16:00:00', NULL, 'USE-00001',FALSE),
(900.00, '2024-02-07 10:45:00', NULL, 'USE-00001',FALSE);

