-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2021 às 20:12
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `paymoney`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `transferencia` (IN `containi` VARCHAR(100), IN `contadest` VARCHAR(100), IN `valor` FLOAT)  BEGIN 
DECLARE saldototal FLOAT DEFAULT -10;

START TRANSACTION;
SAVEPOINT P1;
UPDATE contas
	SET saldo = saldo - valor WHERE numeroConta = containi;
SAVEPOINT P2;
SET saldototal = (SELECT saldo FROM contas WHERE numeroConta = containi);

IF saldototal < 0 THEN
	ROLLBACK TO SAVEPOINT P2;
ELSE
	UPDATE contas
	SET saldo = concat(saldo + valor) WHERE numeroConta = contadest;
	COMMIT;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `numeroConta` varchar(20) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `localidade` varchar(100) NOT NULL,
  `saldo` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id`, `nome`, `sobrenome`, `cpf`, `senha`, `numeroConta`, `celular`, `localidade`, `saldo`) VALUES
(2, 'Lorran', 'Rodrigues', '15463096759', '12345', '63400867', '21964754771', 'Rio de Janeiro', 14827.54),
(3, 'Naiane', 'Ribeiro', '11235787646', '12345', '06172596', '2143567788', 'Espírito Santo', 3442.76),
(4, 'Lohany', 'Ribeiro', '44433256789', '12345', '54168637', '2143567788', 'Rio de Janeiro', 200.00),
(5, 'Naruto ', 'Uzumaki', '55577787639', '12345', '98550187', '2143567788', 'Rio de Janeiro', 140.00),
(10, 'Son Goku', 'Kakarotto', '22466547312', '12345', '40651825', '6788894321', 'Rio de Janeiro', 0.00),
(35, 'User', 'Teste', '12345678900', '12345', '22364794', '', '', 500.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localidades`
--

CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `localidades`
--

INSERT INTO `localidades` (`id`, `nome`, `sigla`) VALUES
(1, 'Rio de Janeiro', 'RJ'),
(2, 'São Paulo', 'SP'),
(3, 'Rio Grande do Norte', 'RN'),
(4, 'Pernanbuco', 'PE'),
(5, 'Piauí', 'PI'),
(6, 'Espírito Santo', 'ES'),
(7, 'Acre', 'AC'),
(8, 'Amapá', 'AP'),
(9, 'Bahia', 'BA'),
(10, 'Goiás', 'GO'),
(11, 'Alagoas', 'AL'),
(12, 'Amazonas', 'AM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `subLocalidade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sublocalidade`
--

CREATE TABLE `sublocalidade` (
  `id_sublocalidade` int(11) NOT NULL,
  `subLocalidade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `numeroConta` (`numeroConta`);

--
-- Índices para tabela `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Índices para tabela `sublocalidade`
--
ALTER TABLE `sublocalidade`
  ADD PRIMARY KEY (`id_sublocalidade`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sublocalidade`
--
ALTER TABLE `sublocalidade`
  MODIFY `id_sublocalidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sublocalidade`
--
ALTER TABLE `sublocalidade`
  ADD CONSTRAINT `sublocalidade_ibfk_1` FOREIGN KEY (`id_sublocalidade`) REFERENCES `localidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
