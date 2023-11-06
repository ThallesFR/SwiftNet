-- Inserir dados na tabela `2fa`
INSERT INTO `swiftnet_db`.`2fa` (`2fa_quest`) VALUES
('Qual o nome completo da sua mãe?'),
('Qual a sua data de nascimento?'),
('Qual o CEP do seu endereço?');

-- Inserir dados na tabela `usuario`
INSERT INTO `swiftnet_db`.`usuario` (`usuario_tipo`, `usuario_nome`, `usuario_mae`, `usuario_sexo`, `usuario_email`, `usuario_senha`, `usuario_login`, `usuario_cep`, `usuario_uf`, `usuario_cidade`, `usuario_bairro`, `usuario_rua`, `usuario_numero`, `usuario_complemento`, `usuario_telefone`, `usuario_cel`, `usuario_nascimento`, `usuario_cpf`) VALUES
('Tipo 1', 'Maria', 'Mãe 1', 'M', 'email1@example.com', 'senha1', 'login1', 12345, 'UF1', 'Cidade1', 'Bairro1', 'Rua1', 1, 'Complemento1', 12345678, 98765432, 19900101, '123.456.789-01'),
('Tipo 2', 'João', 'Mãe 2', 'F', 'email2@example.com', 'senha2', 'login2', 54321, 'UF2', 'Cidade2', 'Bairro2', 'Rua2', 2, 'Complemento2', 87654321, 12349876, 19891231, '987.654.321-02'),
('Tipo 2', 'Pedro', 'Mãe 3', 'F', 'email2@examçle.com', 'senha2', 'login2', 54321, 'UF2', 'Cidade2', 'Bairro2', 'Rua2', 2, 'Complemento2', 87654321, 12349876, 19891231, '987.654.328-02');

-- Inserir dados na tabela `contratos`
INSERT INTO `swiftnet_db`.`contratos` (`contratos_valor`, `contratos_vigencia`, `contratos_nome`, `contratos_user`) VALUES
(100.00, '2023-12-31', 'Contrato 1', 1),
(200.00, '2024-01-31', 'Contrato 2', 2);

-- Inserir dados na tabela `franquia_dados`
INSERT INTO `swiftnet_db`.`franquia_dados` (`franquia_dados_quantidade`) VALUES
('10 Gbs'),
('50 Gbs'),
('100 Gbs');

-- Inserir dados na tabela `franquia_minutos`
INSERT INTO `swiftnet_db`.`franquia_minutos` (`franquia_minutos_quantidade`) VALUES
('1000 minutos'),
('2000 minutos'),
('ilimitado');

-- Inserir dados na tabela `logs`
INSERT INTO `swiftnet_db`.`logs` (`log_login`, `log_logout`, `log_user`, `log_2fa`) VALUES
('2023-10-30 08:00:00', '2023-10-30 17:00:00', 1, 1),
('2023-10-30 09:30:00', '2023-10-30 18:30:00', 2, 2),
('2023-10-30 09:30:00', '2023-10-30 18:30:00', 2, 3),
('2023-10-30 09:30:00', '2023-10-30 18:30:00', 2, 2),
('2023-10-30 09:30:00', '2023-10-30 18:30:00', 2, 2),
('2023-10-30 09:30:00', '2023-10-30 18:30:00', 3, 3),;

-- Inserir dados na tabela `velocidade`
INSERT INTO `swiftnet_db`.`velocidade` (`velocidade_quantidade`) VALUES
('100 Mbps'),
('200 Mbps'),
('1Gbs');
-- Inserir dados na tabela `planos`
-- Plano Banda 1 - 100 GB
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_descricao`,`planos_detalhes`, `planos_vigencia, planos_tipo`, `planos_velocidade`, `planos_valor`)
VALUES ('Plano Banda 1', 'Plano básico de internet','O Plano Banda 1 da Swiftnet é a escolha perfeita para aqueles que buscam uma conexão à internet confiável. Com uma generosa franquia de 100 GB, este plano básico oferece velocidade e estabilidade a um preço acessível, apenas R$49,59 por mês. Ideal para tarefas do dia a dia e navegação na web.
', 'anual', 'Banda Larga', 1, 49.59);

-- Plano Banda 2 - 500 GB
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_descricao`,`planos_detalhes`, `planos_vigencia, planos_tipo`, `planos_velocidade`, `planos_valor`)
VALUES ('Plano Banda 2', 'Plano intermediário de internet','O Plano Banda 2 é a opção intermediária para quem precisa de mais dados. Com uma franquia de 500 GB, você pode transmitir, jogar online e trabalhar sem preocupações. Por R$99,99, este plano oferece uma conexão de qualidade para satisfazer suas necessidades de internet.', 'anual', 'Banda Larga', 2, 99.99);

-- Plano Banda 3 - 1 TB
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_descricao`,`planos_detalhes`, `planos_vigencia, planos_tipo`, `planos_velocidade`, `planos_valor`)
VALUES ('Plano Banda 3', 'Plano premium de internet','Para quem busca o máximo desempenho, o Plano Banda 3 é a escolha premium. Com uma incrível franquia de 1 TB, você pode fazer o que quiser, desde streaming 4K até transferência de arquivos pesados. Por apenas R$199,99, desfrute de uma experiência de internet imbatível.', 'anual', 'Banda Larga', 3, 199.99);

-- Plano Fixo 1 - 100 Minutos
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_descricao`,`planos_detalhes`, `planos_vigencia, planos_tipo`, `planos_fminutos`, `planos_valor`)
VALUES ('Plano Fixo 1', 'Plano básico de telefonia fixa','O Plano Fixo 1 oferece 100 minutos de chamadas de telefonia fixa por apenas R$29,99. É a opção básica para manter contato com amigos e familiares, sem gastar muito.', 'anual', 'Telefonia Fixa', 1, 29.99);

-- Plano Fixo 2 - 500 Minutos
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_descricao`,`planos_detalhes`, `planos_vigencia, planos_tipo`, `planos_fminutos`, `planos_valor`)
VALUES ('Plano Fixo 2', 'Plano intermediário de telefonia fixa', 'Com 500 minutos incluídos, o Plano Fixo 2 é a escolha intermediária para quem faz mais chamadas de telefonia fixa. Por R$39,99, você pode conversar à vontade com qualquer pessoa.','anual', 'Telefonia Fixa', 2, 39.99);

-- Plano Fixo 3 - Ilimitado
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_descricao`,`planos_detalhes`, `planos_vigencia, planos_tipo`, `planos_fminutos`, `planos_valor`)
VALUES ('Plano Fixo 3', 'Plano premium de telefonia fixa', 'O Plano Fixo 3 é o ápice da telefonia fixa. Chamadas ilimitadas por apenas R$49,99. Mantenha-se conectado sem limitações e desfrute da liberdade de conversar o quanto quiser.', 'anual', 'Telefonia Fixa', 3, 49.99);

-- Plano Móvel 1 - 10 GB e 100 Minutos
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_descricao`,`planos_detalhes`, `planos_vigencia, planos_tipo`, `planos_fdados`, `planos_fminutos`, `planos_valor`)
VALUES ('Plano Móvel 1', 'Plano básico de celular','O Plano Móvel 1 combina 10 GB de dados móveis e 100 minutos de chamadas. Por R$39,99, é a escolha ideal para quem busca uma solução econômica e completa para suas necessidades móveis.', 'anual', 'Telefonia Móvel', 1, 1, 39.99);

-- Plano Móvel 2 - 50 GB e 500 Minutos
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_descricao`,`planos_detalhes`, `planos_vigencia, planos_tipo`, `planos_fdados`, `planos_fminutos`, `planos_valor`)
VALUES ('Plano Móvel 2', 'Plano intermediário de celular','Com 50 GB de dados e 500 minutos de chamadas, o Plano Móvel 2 oferece uma opção intermediária para aqueles que desejam mais. Por apenas R$49,99, você pode aproveitar a internet e a telefonia móvel em grande estilo.', 'anual', 'Telefonia Móvel', 2, 2, 49.99);

-- Plano Móvel 3 - 100 GB e Ilimitado
INSERT INTO `swiftnet_db`.`planos` (`planos_nome`, `planos_descricao`,`planos_detalhes`, `planos_vigencia, planos_tipo`, `planos_fdados`, `planos_fminutos`, `planos_valor`)
VALUES ('Plano Móvel 3', 'Plano premium de celular', 'O Plano Móvel 3 é a oferta premium da Swiftnet, com 100 GB de dados e chamadas ilimitadas por apenas R$69,99. Seja produtivo, assista a vídeos em alta definição e mantenha-se conectado o tempo todo com este plano de celular de alto desempenho.', 'anual', 'Telefonia Móvel', 3, 3, 69.99);

