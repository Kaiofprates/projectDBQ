-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Set-2019 às 17:04
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_genexam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `idIp` int(11) NOT NULL,
  `ipIp` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ipIpDate` date NOT NULL,
  `ipIpMsg` varchar(300) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alternatives`
--

CREATE TABLE `tb_alternatives` (
  `idAlternative` int(11) NOT NULL,
  `aAlternativesText` text COLLATE latin1_general_ci NOT NULL,
  `aAnswerText` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `tb_alternatives`
--

INSERT INTO `tb_alternatives` (`idAlternative`, `aAlternativesText`, `aAnswerText`) VALUES
(13, 'a) teste de adicionar alternativas.\r\nb) teste de editar alternativas.', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questions`
--

CREATE TABLE `tb_questions` (
  `idQuestion` int(11) NOT NULL,
  `qQuestionText` text COLLATE latin1_general_ci NOT NULL,
  `qLevel` text COLLATE latin1_general_ci NOT NULL,
  `qDiscipline` text COLLATE latin1_general_ci NOT NULL,
  `qSkill` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `tb_questions`
--

INSERT INTO `tb_questions` (`idQuestion`, `qQuestionText`, `qLevel`, `qDiscipline`, `qSkill`) VALUES
(13, 'QUESTÃO 01: teste de adicionar questão. teste de editar questão\r\n', 'Difícil', 'Matemática', 'Matemática e suas tecnologias');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@padrao.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 1),
(2, 'suporte', 'suporte@padrao.com', '4ab79fdaa7205f3f3a09a75ea19fe264915a87c6', 1),
(3, 'user', 'user@padrao.com', '60bddb16409a2baf76936619afecf778dabe68de', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idIp`);

--
-- Índices para tabela `tb_alternatives`
--
ALTER TABLE `tb_alternatives`
  ADD PRIMARY KEY (`idAlternative`);

--
-- Índices para tabela `tb_questions`
--
ALTER TABLE `tb_questions`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `idIp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;

--
-- AUTO_INCREMENT de tabela `tb_alternatives`
--
ALTER TABLE `tb_alternatives`
  MODIFY `idAlternative` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_questions`
--
ALTER TABLE `tb_questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_alternatives`
--
ALTER TABLE `tb_alternatives`
  ADD CONSTRAINT `idquest_fk` FOREIGN KEY (`idAlternative`) REFERENCES `tb_questions` (`idQuestion`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
