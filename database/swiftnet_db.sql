-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/11/2023 às 20:17
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `swiftnet_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `2fa`
--

CREATE TABLE `2fa` (
  `id_2fa` int(11) NOT NULL,
  `2fa_quest` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `2fa`
--

INSERT INTO `2fa` (`id_2fa`, `2fa_quest`) VALUES
(1, 'Qual o nome completo da sua mãe?'),
(2, 'Qual a sua data de nascimento?'),
(3, 'Qual o CEP do seu endereço?');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contratos`
--

CREATE TABLE `contratos` (
  `id_contratos` int(11) NOT NULL,
  `contratos_valor` decimal(10,2) NOT NULL,
  `contratos_vigencia` date NOT NULL,
  `contratos_nome` varchar(45) NOT NULL,
  `contratos_user` int(11) NOT NULL,
  `contratos_tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `contratos`
--

INSERT INTO `contratos` (`id_contratos`, `contratos_valor`, `contratos_vigencia`, `contratos_nome`, `contratos_user`, `contratos_tipo`) VALUES
(1, 100.00, '2023-12-31', 'Contrato 1', 1, 'Banda Larga'),
(2, 200.00, '2024-01-31', 'Contrato 2', 2, 'Banda Larga'),
(10, 49.99, '2024-11-10', 'Plano Fixo 3', 1, 'Telefonia Fixa'),
(11, 49.99, '2024-11-10', 'Plano Móvel 2', 1, 'Telefonia Móvel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `franquia_dados`
--

CREATE TABLE `franquia_dados` (
  `id_franquia_dados` int(11) NOT NULL,
  `franquia_dados_quantidade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `franquia_dados`
--

INSERT INTO `franquia_dados` (`id_franquia_dados`, `franquia_dados_quantidade`) VALUES
(1, '10 Gbs'),
(2, '50 Gbs'),
(3, '100 Gbs');

-- --------------------------------------------------------

--
-- Estrutura para tabela `franquia_minutos`
--

CREATE TABLE `franquia_minutos` (
  `id_franquia_minutos` int(11) NOT NULL,
  `franquia_minutos_quantidade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `franquia_minutos`
--

INSERT INTO `franquia_minutos` (`id_franquia_minutos`, `franquia_minutos_quantidade`) VALUES
(1, '1000 minutos'),
(2, '2000 minutos'),
(3, 'ilimitado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `log_data` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_user` int(11) NOT NULL,
  `log_tipo` varchar(45) NOT NULL,
  `log_2fa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `logs`
--

INSERT INTO `logs` (`id_log`, `log_data`, `log_user`, `log_tipo`, `log_2fa`) VALUES
(5, '2023-11-10 03:40:49', 1, 'login', 'Qual o nome da sua mãe?'),
(6, '2023-11-10 03:40:49', 1, 'logout', ''),
(7, '2023-11-10 03:40:49', 2, 'login', 'Qual o nome da sua mãe?'),
(8, '2023-11-10 03:40:49', 2, 'logout', ''),
(10, '2023-11-10 03:40:49', 1, 'login', 'Qual o nome da sua mãe?'),
(11, '2023-11-10 03:40:49', 1, 'logout', ''),
(12, '2023-11-10 03:40:49', 1, 'logout', ''),
(13, '2023-11-10 03:40:49', 1, 'login', 'Qual o nome da sua mãe?'),
(14, '2023-11-10 06:53:24', 1, 'login', 'Qual o CEP do seu endereço?'),
(15, '2023-11-10 06:57:32', 1, 'logout', NULL),
(16, '2023-11-10 06:58:29', 3, 'logout', NULL),
(17, '2023-11-10 07:00:50', 1, 'login', 'Qual o nome completo da sua mãe?'),
(18, '2023-11-10 07:00:58', 1, 'logout', NULL),
(19, '2023-11-10 07:15:57', 1, 'login', 'Qual a sua data de nascimento?'),
(20, '2023-11-10 07:16:28', 1, 'logout', NULL),
(21, '2023-11-10 13:54:29', 1, 'login', 'Qual o nome completo da sua mãe?'),
(22, '2023-11-10 15:07:43', 1, 'logout', NULL),
(23, '2023-11-10 15:40:45', 1, 'login', 'Qual o nome completo da sua mãe?'),
(24, '2023-11-10 15:43:44', 1, 'logout', NULL),
(25, '2023-11-10 16:03:57', 1, 'login', 'Qual o nome completo da sua mãe?'),
(26, '2023-11-10 17:39:36', 1, 'logout', NULL),
(27, '2023-11-10 19:17:05', 1, 'login', 'Qual o nome completo da sua mãe?'),
(28, '2023-11-10 19:17:11', 1, 'logout', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `id_planos` int(11) NOT NULL,
  `planos_nome` varchar(45) NOT NULL,
  `planos_descricao` varchar(45) NOT NULL,
  `planos_detalhes` text NOT NULL,
  `planos_vigencia` varchar(45) NOT NULL,
  `planos_tipo` varchar(45) NOT NULL,
  `planos_velocidade` int(11) DEFAULT NULL,
  `planos_fdados` int(11) DEFAULT NULL,
  `planos_fminutos` int(11) DEFAULT NULL,
  `planos_valor` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `planos`
--

INSERT INTO `planos` (`id_planos`, `planos_nome`, `planos_descricao`, `planos_detalhes`, `planos_vigencia`, `planos_tipo`, `planos_velocidade`, `planos_fdados`, `planos_fminutos`, `planos_valor`) VALUES
(1, 'Plano Banda 1', 'Plano básico de internet', 'O Plano Banda 1 da Swiftnet é a escolha perfeita para aqueles que buscam uma conexão à internet confiável. Com uma generosa franquia de 100 GB, este plano básico oferece velocidade e estabilidade a um preço acessível, apenas R$49,59 por mês. Ideal para tarefas do dia a dia e navegação na web.\n', 'anual', 'Banda Larga', 1, NULL, NULL, 49.59),
(2, 'Plano Banda 2', 'Plano intermediário de internet', 'O Plano Banda 2 é a opção intermediária para quem precisa de mais dados. Com uma franquia de 500 GB, você pode transmitir, jogar online e trabalhar sem preocupações. Por R$99,99, este plano oferece uma conexão de qualidade para satisfazer suas necessidades de internet.', 'anual', 'Banda Larga', 2, NULL, NULL, 99.99),
(3, 'Plano Banda 3', 'Plano premium de internet', 'Para quem busca o máximo desempenho, o Plano Banda 3 é a escolha premium. Com uma incrível franquia de 1 TB, você pode fazer o que quiser, desde streaming 4K até transferência de arquivos pesados. Por apenas R$199,99, desfrute de uma experiência de internet imbatível.', 'anual', 'Banda Larga', 3, NULL, NULL, 199.99),
(4, 'Plano Fixo 1', 'Plano básico de telefonia fixa', 'O Plano Fixo 1 oferece 100 minutos de chamadas de telefonia fixa por apenas R$29,99. É a opção básica para manter contato com amigos e familiares, sem gastar muito.', 'anual', 'Telefonia Fixa', NULL, NULL, 1, 29.99),
(5, 'Plano Fixo 2', 'Plano intermediário de telefonia fixa', 'Com 500 minutos incluídos, o Plano Fixo 2 é a escolha intermediária para quem faz mais chamadas de telefonia fixa. Por R$39,99, você pode conversar à vontade com qualquer pessoa.', 'anual', 'Telefonia Fixa', NULL, NULL, 2, 39.99),
(6, 'Plano Fixo 3', 'Plano premium de telefonia fixa', 'O Plano Fixo 3 é o ápice da telefonia fixa. Chamadas ilimitadas por apenas R$49,99. Mantenha-se conectado sem limitações e desfrute da liberdade de conversar o quanto quiser.', 'anual', 'Telefonia Fixa', NULL, NULL, 3, 49.99),
(7, 'Plano Móvel 1', 'Plano básico de celular', 'O Plano Móvel 1 combina 10 GB de dados móveis e 100 minutos de chamadas. Por R$39,99, é a escolha ideal para quem busca uma solução econômica e completa para suas necessidades móveis.', 'anual', 'Telefonia Móvel', NULL, 1, 1, 39.99),
(8, 'Plano Móvel 2', 'Plano intermediário de celular', 'Com 50 GB de dados e 500 minutos de chamadas, o Plano Móvel 2 oferece uma opção intermediária para aqueles que desejam mais. Por apenas R$49,99, você pode aproveitar a internet e a telefonia móvel em grande estilo.', 'anual', 'Telefonia Móvel', NULL, 2, 2, 49.99),
(9, 'Plano Móvel 3', 'Plano premium de celular', 'O Plano Móvel 3 é a oferta premium da Swiftnet, com 100 GB de dados e chamadas ilimitadas por apenas R$69,99. Seja produtivo, assista a vídeos em alta definição e mantenha-se conectado o tempo todo com este plano de celular de alto desempenho.', 'anual', 'Telefonia Móvel', NULL, 3, 3, 69.99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario_tipo` varchar(45) NOT NULL,
  `usuario_nome` varchar(45) NOT NULL,
  `usuario_mae` varchar(45) NOT NULL,
  `usuario_sexo` varchar(45) NOT NULL,
  `usuario_email` varchar(45) NOT NULL,
  `usuario_senha` varchar(45) NOT NULL,
  `usuario_login` varchar(45) NOT NULL,
  `usuario_cep` int(11) NOT NULL,
  `usuario_uf` varchar(45) NOT NULL,
  `usuario_cidade` varchar(45) NOT NULL,
  `usuario_bairro` varchar(45) NOT NULL,
  `usuario_rua` varchar(45) NOT NULL,
  `usuario_numero` int(11) NOT NULL,
  `usuario_complemento` varchar(45) DEFAULT NULL,
  `usuario_telefone` int(11) NOT NULL,
  `usuario_cel` int(11) NOT NULL,
  `usuario_nascimento` date NOT NULL,
  `usuario_cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario_tipo`, `usuario_nome`, `usuario_mae`, `usuario_sexo`, `usuario_email`, `usuario_senha`, `usuario_login`, `usuario_cep`, `usuario_uf`, `usuario_cidade`, `usuario_bairro`, `usuario_rua`, `usuario_numero`, `usuario_complemento`, `usuario_telefone`, `usuario_cel`, `usuario_nascimento`, `usuario_cpf`) VALUES
(1, 'comum', 'Maria', 'Mãe 1', 'M', 'email1@example.com', 'comum', 'comum', 12345, 'UF1', 'Cidade1', 'Bairro1', 'Rua1', 1, 'Complemento1', 12345678, 98765432, '1990-01-01', '123.456.789-01'),
(2, 'comum', 'comum', 'Mãe 2', 'F', 'email2@example.com', 'senha2', 'login2', 54321, 'UF2', 'Cidade2', 'Bairro2', 'Rua2', 2, 'Complemento2', 87654321, 12349876, '1989-12-31', '987.654.321-02'),
(3, 'master', 'master', 'Mãe 3', 'F', 'email2@examçle.com', 'master', 'master', 54321, 'UF2', 'Cidade2', 'Bairro2', 'Rua2', 2, 'Complemento2', 87654321, 12349876, '1989-12-31', '987.654.328-02'),
(5, 'comum', 'comum', 'Mãe 2', 'F', 'email2@example.comh', 'senha2', 'login2h', 54321, 'UF2', 'Cidade2', 'Bairro2', 'Rua2', 2, 'Complemento2', 87654321, 12349876, '1989-12-31', '987.654.321-05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `velocidade`
--

CREATE TABLE `velocidade` (
  `id_velocidade` int(11) NOT NULL,
  `velocidade_quantidade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `velocidade`
--

INSERT INTO `velocidade` (`id_velocidade`, `velocidade_quantidade`) VALUES
(1, '100 Mbps'),
(2, '200 Mbps'),
(3, '1Gbs');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `2fa`
--
ALTER TABLE `2fa`
  ADD PRIMARY KEY (`id_2fa`),
  ADD UNIQUE KEY `id_2fa_UNIQUE` (`id_2fa`);

--
-- Índices de tabela `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id_contratos`),
  ADD UNIQUE KEY `id_contratos_UNIQUE` (`id_contratos`),
  ADD KEY `contratos_user_idx` (`contratos_user`);

--
-- Índices de tabela `franquia_dados`
--
ALTER TABLE `franquia_dados`
  ADD PRIMARY KEY (`id_franquia_dados`),
  ADD UNIQUE KEY `id_franquia_dados_UNIQUE` (`id_franquia_dados`);

--
-- Índices de tabela `franquia_minutos`
--
ALTER TABLE `franquia_minutos`
  ADD PRIMARY KEY (`id_franquia_minutos`),
  ADD UNIQUE KEY `id_franquia_minutos_UNIQUE` (`id_franquia_minutos`);

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`),
  ADD UNIQUE KEY `id_log_UNIQUE` (`id_log`),
  ADD KEY `log_user_idx` (`log_user`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id_planos`),
  ADD UNIQUE KEY `id_planos_UNIQUE` (`id_planos`),
  ADD KEY `planos_velocidade_idx` (`planos_velocidade`),
  ADD KEY `planos_fdados_idx` (`planos_fdados`),
  ADD KEY `planos_fminutos_idx` (`planos_fminutos`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`usuario_cpf`),
  ADD UNIQUE KEY `usuario_email_UNIQUE` (`usuario_email`),
  ADD UNIQUE KEY `usuario_login_UNIQUE` (`usuario_login`);

--
-- Índices de tabela `velocidade`
--
ALTER TABLE `velocidade`
  ADD PRIMARY KEY (`id_velocidade`),
  ADD UNIQUE KEY `id_velocidade_UNIQUE` (`id_velocidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `2fa`
--
ALTER TABLE `2fa`
  MODIFY `id_2fa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id_contratos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `franquia_dados`
--
ALTER TABLE `franquia_dados`
  MODIFY `id_franquia_dados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `franquia_minutos`
--
ALTER TABLE `franquia_minutos`
  MODIFY `id_franquia_minutos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id_planos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `velocidade`
--
ALTER TABLE `velocidade`
  MODIFY `id_velocidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_user` FOREIGN KEY (`contratos_user`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `log_user` FOREIGN KEY (`log_user`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `planos`
--
ALTER TABLE `planos`
  ADD CONSTRAINT `planos_fdados` FOREIGN KEY (`planos_fdados`) REFERENCES `franquia_dados` (`id_franquia_dados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `planos_fminutos` FOREIGN KEY (`planos_fminutos`) REFERENCES `franquia_minutos` (`id_franquia_minutos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `planos_velocidade` FOREIGN KEY (`planos_velocidade`) REFERENCES `velocidade` (`id_velocidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
