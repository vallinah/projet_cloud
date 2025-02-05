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
