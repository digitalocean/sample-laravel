CREATE TABLE `abastecimentos` (
  `id` int(11) NOT NULL,
  `_id` varchar(24) NOT NULL,
  `ibm` varchar(14) NOT NULL,
  `chv` varchar(45) NOT NULL,
  `dtHr` datetime NOT NULL,
  `enc` decimal(10,3) NOT NULL,
  `hex` varchar(2) NOT NULL,
  `lmc` int(11) NOT NULL,
  `ori` int(11) NOT NULL,
  `ppl` decimal(10,3) NOT NULL,
  `val` decimal(10,2) NOT NULL,
  `ven` int(11) NOT NULL,
  `vol` decimal(10,3) NOT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL
  PRIMARY KEY (id) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO abastecimentos (id, _id, ibm, chv, dtHr, enc, hex, lmc, ori, ppl, val, ven, vol) VALUES 
(60, '603421edc8a2a1f48a16baa1', '00000000008301', '11070070274604100060', '2021-02-22T18:27:00', 30000.070, '04', 11, 0, 3.500, 0.24, 0, 0.070);

DROP TABLE lojas;
CREATE TABLE `lojas` (
  `id` int NOT NULL  AUTO_INCREMENT,
  `_id` varchar(24) NOT NULL,
  `ibm` varchar(14) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `dtUltPost` datetime NOT NULL,
  `nome` varchar(20) NOT NULL,
  `razao` varchar(45) NOT NULL,
  `verApp` varchar(20) NOT NULL,
  `verAut` varchar(20) NOT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (id) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO lojas (`_id`, ibm, cnpj, dtUltPost, nome, razao, verApp, verAut) VALUES 
('5f2d72401b97bace4daed7c2', '00000000009501', '41.705.211/0002-98', '2021-08-15T09:14:06', 'CONTAGEM', 'POSTO R.E.M. LTDA', '1.1.0.10062021', '35.04' );

DROP TABLE posicao_bicos;
CREATE TABLE `posicao_bicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `_id` varchar(24) NOT NULL,
  `hex` varchar(2) NOT NULL,
  `ibm` varchar(14) NOT NULL,
  `dtHr` datetime NOT NULL,
  `encL` decimal(10,3) NOT NULL,
  `lmc` int NOT NULL,
  `pen` int NOT NULL,
  `ppl` decimal(10,3) NOT NULL,
  `pplC` decimal(10,3) NOT NULL,
  `pplS` decimal(10,3) NOT NULL,
  `st` VARCHAR(20) NULL,
  `val` decimal(10,2) NOT NULL,
  `vol` decimal(10,3) NOT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (id) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO posicao_bicos (`_id`, hex, ibm, dtHr, encL, lmc, pen, ppl, pplC, pplS, st, val, vol) VALUES 
( '603421edc8a2a1f48a16ba8d', '04', '00000000008301', '2021-08-15T06:44:00', 
  '443215.930', '11', '16058', '4.389', '4.389', '4.389', '', '15.00', '3.410' );


DROP TABLE usuarios;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `usuario_tipos_id` int NOT NULL,
  `email` varchar(45) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `confirma_email` tinyint NOT NULL DEFAULT '0',
  `confirma_celular` tinyint NOT NULL DEFAULT '0',
  `notificacoes_email` tinyint NOT NULL DEFAULT '1',
  `notificacoes_sms` tinyint NOT NULL DEFAULT '0',
  `senha` varchar(45) DEFAULT 'eaeb46ed51a69f0461f1065d54287ffec8077b60',
  `token` varchar(45) NOT NULL DEFAULT 'eaeb46ed51a69f0461f1065d54287ffec8077b60',
  `codigo_ativacao` varchar(6) NOT NULL DEFAULT '999999',
  `cpf` varchar(14) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `sexo` enum('m','f') DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `figura` varchar(30) DEFAULT 'usuario-default.png',
  `primeiro_acesso` datetime DEFAULT NULL,
  `preferencias` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_USUARIO` (`usuario`),
  UNIQUE KEY `UNQ_EMAIL` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS usuario_tipos;
CREATE TABLE `usuario_tipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `figura` varchar(30) DEFAULT 'usuario-default.png',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_NOME` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS dispositivos;
CREATE TABLE `dispositivos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rede_id` int NOT NULL,
  `identifcacao` varchar(45) NOT NULL,
  `chave` varchar(45) NOT NULL,
  `codigoAtivacaoSms` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS redes;
CREATE TABLE `redes` (
  `id` int NOT NULL  AUTO_INCREMENT,
  `_id` varchar(24) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `razao` varchar(45) NOT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (id) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;