-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 31-Dez-2020 às 20:36
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `politicos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_politicos`
--

CREATE TABLE `tb_politicos` (
  `pol_codigo` int(11) NOT NULL,
  `pol_nome` varchar(50) NOT NULL,
  `pol_numero` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_politicos`
--

INSERT INTO `tb_politicos` (`pol_codigo`, `pol_nome`, `pol_numero`) VALUES
(9, 'Carlos Souza Fernandes', '45'),
(10, 'Vitoria Ferreira Alves', '65'),
(11, 'Bianca Almeida Cavalcanti', '30'),
(12, 'Professor Ari', '99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_promessas`
--

CREATE TABLE `tb_promessas` (
  `pro_codigo` int(11) NOT NULL,
  `pro_tema` varchar(50) NOT NULL,
  `pro_descricao` text NOT NULL,
  `pro_data` date NOT NULL,
  `pro_cumprida` tinyint(1) NOT NULL,
  `pro_pol_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_promessas`
--

INSERT INTO `tb_promessas` (`pro_codigo`, `pro_tema`, `pro_descricao`, `pro_data`, `pro_cumprida`, `pro_pol_codigo`) VALUES
(29, 'Esporte', 'Reforma no estádio da cidade. ', '2020-11-23', 1, 9),
(30, 'Infraestrutura', 'Ampliação da Avenida Doutor Arnaldo.', '2020-09-01', 0, 9),
(31, 'Economia', 'Privatizar a instituição de fornecimento de energia elétrica', '2020-12-08', 0, 9),
(32, 'Educação', 'Reforma na escola municipal', '2020-08-03', 1, 9),
(33, 'Educação', 'Passar todos os alunos', '2020-12-01', 1, 12),
(34, 'Economia', 'Gerar 100 empregos', '2020-09-01', 0, 9),
(35, 'Educação', 'Aumentar a verba da educação', '2021-01-15', 1, 9),
(36, 'Esportes', 'Criar mais áreas de esportes', '2021-03-18', 1, 10),
(37, 'Educação', 'Reformar as quadras da cidade', '2020-12-14', 0, 11),
(38, 'Educação', 'Corrigir os projetos finais dentro do prazo', '2020-12-01', 0, 12),
(39, 'Saúde', 'Construção de hospital', '2020-10-01', 0, 11),
(40, 'Economia', 'Gerar 50 empregos', '2020-12-15', 1, 10),
(41, 'Segurança', 'Aumentar a verba de segurança', '2020-11-09', 1, 10),
(42, 'Saúde', 'Reformar hospital', '2020-12-01', 1, 10),
(43, 'Educação', 'Aumentar a verba da educação', '2020-12-02', 1, 11),
(44, 'Infraestrutura', 'Tapar os buracos da Avenida Coronel Velho', '2020-12-15', 1, 11),
(45, 'Educação', 'Construir uma nova escola', '2020-12-24', 0, 11),
(46, 'Educação', 'Aumentar verba da educação', '2020-12-06', 1, 10),
(47, 'Infraestrutura', 'Tapar os buracos da cidade', '2020-12-15', 1, 10),
(48, 'Saúde', 'Aumentar a verba da saúde', '2020-12-08', 1, 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_politicos`
--
ALTER TABLE `tb_politicos`
  ADD PRIMARY KEY (`pol_codigo`);

--
-- Índices para tabela `tb_promessas`
--
ALTER TABLE `tb_promessas`
  ADD PRIMARY KEY (`pro_codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_politicos`
--
ALTER TABLE `tb_politicos`
  MODIFY `pol_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_promessas`
--
ALTER TABLE `tb_promessas`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
