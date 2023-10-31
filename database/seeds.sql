-- Inserir dados na tabela `2fa`
INSERT INTO `swiftnet_db`.`2fa` (`2fa_quest`) VALUES
('Qual o nome completo da sua mãe?'),
('Qual a sua data de nascimento?'),
('Qual o CEP do seu endereço');

-- Inserir dados na tabela `usuario`
INSERT INTO `swiftnet_db`.`usuario` (`usuario_tipo`, `usuario_nome`, `usuario_mae`, `usuario_sexo`, `usuario_email`, `usuario_senha`, `usuario_login`, `usuario_cep`, `usuario_uf`, `usuario_cidade`, `usuario_bairro`, `usuario_rua`, `usuario_numero`, `usuario_complemento`, `usuario_telefone`, `usuario_cel`, `usuario_nascimento`, `usuario_cpf`) VALUES
('Tipo 1', 'Maria', 'Mãe 1', 'M', 'email1@example.com', 'senha1', 'login1', 12345, 'UF1', 'Cidade1', 'Bairro1', 'Rua1', 1, 'Complemento1', 12345678, 98765432, 19900101, '123.456.789-01'),
('Tipo 2', 'João', 'Mãe 2', 'F', 'email2@example.com', 'senha2', 'login2', 54321, 'UF2', 'Cidade2', 'Bairro2', 'Rua2', 2, 'Complemento2', 87654321, 12349876, 19891231, '987.654.321-02');

-- Inserir dados na tabela `contratos`
INSERT INTO `swiftnet_db`.`contratos` (`contratos_valor`, `contratos_vigencia`, `contratos_nome`, `contratos_user`) VALUES
(100.00, '2023-12-31', 'Contrato 1', 1),
(200.00, '2024-01-31', 'Contrato 2', 2);

-- Inserir dados na tabela `franquia_dados`
INSERT INTO `swiftnet_db`.`franquia_dados` (`franquia_dados_quantidade`) VALUES
('10 GB'),
('20 GB');

-- Inserir dados na tabela `franquia_minutos`
INSERT INTO `swiftnet_db`.`franquia_minutos` (`franquia_minutos_quantidade`) VALUES
('1000 minutos'),
('2000 minutos');

-- Inserir dados na tabela `logs`
INSERT INTO `swiftnet_db`.`logs` (`log_login`, `log_logout`, `log_user`, `log_2fa`) VALUES
('2023-10-30 08:00:00', '2023-10-30 17:00:00', 1, 1),
('2023-10-30 09:30:00', '2023-10-30 18:30:00', 2, 2);

-- Inserir dados na tabela `velocidade`
INSERT INTO `swiftnet_db`.`velocidade` (`velocidade_quantidade`) VALUES
('100 Mbps'),
('200 Mbps');

-- Inserir dados na tabela `planos`
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_detalhes`, `planos_descricao`, `planos_vigencia`, `planos_tipo`, `planos_velocidade`, `planos_fdados`, `planos_fminutos`) VALUES
('Plano 1', 'Detalhes 1', 'Descrição 1', 'Anual', 'Tipo A', 1, 1, 1),
('Plano 2', 'Detalhes 2', 'Descrição 2', 'Mensal', 'Tipo B', 2, 2, 2);
