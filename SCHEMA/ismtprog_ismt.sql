-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Máquina: localhost:3306
-- Data de Criação: 09-Set-2018 às 16:48
-- Versão do servidor: 10.0.27-MariaDB-cll-lve
-- versão do PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `ismtprog_ismt`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avisos`
--

CREATE TABLE IF NOT EXISTS `avisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aviso` text NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `texto` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `avisos`
--

INSERT INTO `avisos` (`id`, `aviso`, `tipo`, `texto`, `created_at`, `updated_at`) VALUES
(1, 'AVISO Nº103/2018', 0, 'Informamos todos os alunos que a partir do dia 23/09/2018, o edifício localizado na rua Oliveira de Matos estará encerrado para obras. Todas as aulas deste edifício serão leccionadas no Edifício da rua Alburquerque.', '2018-07-16 22:04:27', '2018-09-09 18:19:54'),
(2, 'AVISO Nº103/2018', 0, 'Informamos todos os alunos que a partir do dia 23/09/2018, o edifício localizado na rua Oliveira de Matos estará encerrado para obras. Todas as aulas deste edifício serão leccionadas no Edifício da rua Alburquerque.', '2018-07-16 22:04:59', '2018-09-09 18:19:59'),
(3, 'AVISO Nº57/2018 - Reposição de aulas de Programação', 1, 'Informamos todos os alunos que a partir do dia 23/09/2018, o edifício localizado na rua Oliveira de Matos estará encerrado para obras. Todas as aulas deste edifício serão leccionadas no Edifício da rua Alburquerque.', '2018-07-17 13:24:02', '2018-09-09 18:20:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `docentes`
--

INSERT INTO `docentes` (`id`, `nome`, `professor`, `email`) VALUES
(1, 'Alcina Maria de Castro Martins', 'Professor Associado - Dedicação Exclusiva', 'docente@ismt.pt'),
(2, 'Ana Margarida Jorge Ferreira Galhardo', 'Professor Auxiliar (Equiparado) - Dedicação Exclusiva', 'docente@ismt.pt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprego`
--

CREATE TABLE IF NOT EXISTS `emprego` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `empresa` text NOT NULL,
  `funcao` text NOT NULL,
  `localizacao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `emprego`
--

INSERT INTO `emprego` (`id`, `data`, `empresa`, `funcao`, `localizacao`) VALUES
(1, '2018-08-28', 'Águedasoft', 'Multimédia', 'Águeda'),
(2, '2018-06-13', 'Águedasoft', 'Programador', 'Aveiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames`
--

CREATE TABLE IF NOT EXISTS `exames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anoEscolar` varchar(255) NOT NULL,
  `unidadeCurricular` varchar(255) NOT NULL,
  `docente` varchar(255) NOT NULL,
  `epocanormal` varchar(255) NOT NULL,
  `dianormal` varchar(255) NOT NULL,
  `horanormal` varchar(255) NOT NULL,
  `salanormal` varchar(255) NOT NULL,
  `epocarecurso` varchar(255) NOT NULL,
  `diarecurso` varchar(255) NOT NULL,
  `horarecurso` varchar(255) NOT NULL,
  `salarecurso` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `exames`
--

INSERT INTO `exames` (`id`, `anoEscolar`, `unidadeCurricular`, `docente`, `epocanormal`, `dianormal`, `horanormal`, `salanormal`, `epocarecurso`, `diarecurso`, `horarecurso`, `salarecurso`) VALUES
(1, '1º', 'Cibercultura', 'Inês de Oliveira Castilho e Albuquerque Amaral', 'Época de Av. Normal Final 2.ºS 2017/2018', '5 jul', '10h00-12h00', 'RASL2', 'Época de Recurso 2.ºS 2017/2018', '19 jul', '10h00-12h00', 'RASL2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diasemana` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `anoLetivo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`id`, `diasemana`, `hora`, `texto`, `anoLetivo`) VALUES
(1, 'Terça', '08:30-12:30', 'Programação I [RALINF2]', 1),
(2, 'Terça', '13:00-16:00', 'Tratamento da Imagem Digital [BASL2]', 1),
(3, 'Terça', '16:00-19:00', 'Teoria da Arte [RALINF1]', 1),
(4, 'Quarta', '14:00-18:00', 'Design Gráfico [RASL4]', 1),
(5, 'Quinta', '08:30-11:30', 'Cibercultura [RASL2]', 1),
(6, 'Quinta', '11:30-13:30', 'Televisão Interactiva [RASL2]', 1),
(7, 'Quinta', '14:00-17:00', 'Laboratório Multimédia I [RALINF1]', 1),
(8, 'Segunda', '14:00-18:00', 'Produção Áudio [BAETV]', 2),
(9, 'Segunda', '10:00-13:00', 'Projeto Multimédia [BASL3]', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `texto` text NOT NULL,
  `data` text NOT NULL,
  `imagem` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `data`, `imagem`, `created_at`, `updated_at`) VALUES
(4, 'Militares treinam com jogo do ISMT', 'Militares utilizam como base de treinamento um jogo que foi desenvolvido no Instituto Superior Miguel Torga...', 'Quart-Feira, Junho 27/06/2018', NULL, '2018-07-17 12:33:13', '2018-08-25 19:22:09'),
(6, 'O pai era "frio, cruel e desumano"', 'A mesma filha que rejeitou durante anos e que apenas começou a apoiar financeiramente por ordem...', 'Sexta-Feira, Junho 29/06/2018', NULL, '2018-07-17 13:04:49', '2018-08-29 19:38:24'),
(7, 'Visita de estudo a RTP', 'Alunos de multimédia fizeram uma aos estúdios da RTP', 'Quart-Feira, Setembro 30/08/2018', NULL, '2018-08-29 23:41:03', '2018-08-29 23:41:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `propinas`
--

CREATE TABLE IF NOT EXISTS `propinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anoLetivo` varchar(255) NOT NULL,
  `dataLimite` date NOT NULL,
  `tipoDePagamento` text NOT NULL,
  `valor` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `idUtilizador` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `propinas`
--

INSERT INTO `propinas` (`id`, `anoLetivo`, `dataLimite`, `tipoDePagamento`, `valor`, `estado`, `idUtilizador`) VALUES
(1, '2017/2018', '2018-05-02', 'Multa Propina Abril', '30 Euro(s)', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  `inicio` varchar(255) NOT NULL,
  `fim` varchar(255) NOT NULL,
  `texto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `semestre`
--

INSERT INTO `semestre` (`id`, `tipo`, `inicio`, `fim`, `texto`) VALUES
(1, 'Semestre', '18-09-2017', '19-01-2018', '1º'),
(2, 'Férias', '2017-12-18', '2018-01-01', 'Férias - Natal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@ismt.pt', '$2y$10$EiAjUNEflP6yAZrhdQ2Y1uB/t0etkatj9Og.TQ2cpPKm26v1RFGya', 'nbbVR5o0ThHEeu41d7q7gP8Aqu7cpXds3d5LyLF5P9Lt857iUmrhgnyJvLTx', '2018-07-17 00:15:30', '2018-07-17 00:15:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilegio` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `username`, `password`, `privilegio`, `created_at`, `updated_at`) VALUES
(2, 'teste', 'teste', 0, '2018-08-25 21:33:14', '2018-08-29 19:36:07'),
(3, 'teste2', 'teste2', 1, '2018-09-09 20:42:07', '2018-09-09 20:42:07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
