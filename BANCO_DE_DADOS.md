# Banco de Dados — Teste Comportamental

## 1. Objetivo

Este documento orienta a configuração do banco de dados necessário para executar o sistema Teste Comportamental, desenvolvido em PHP.

## 2. Tecnologias utilizadas

- PHP
- MySQL
- PDO para conexão com o banco de dados
- XAMPP para ambiente de desenvolvimento local
- phpMyAdmin para administração do banco

## 3. Nome do banco de dados

O sistema utiliza o banco de dados:

`teste_comportamental`

## 4. Estrutura da tabela usuarios

A tabela `usuarios` armazena os dados necessários para cadastro e autenticação.

| Campo | Tipo | Descrição |
|---|---|---|
| id | INT | Identificador único do usuário, com incremento automático |
| nome | VARCHAR(100) | Nome do usuário |
| email | VARCHAR(150) | E-mail utilizado no login, único |
| senha | VARCHAR(255) | Hash da senha do usuário |
| criado_em | TIMESTAMP | Data e hora do cadastro |

## 5. Criação do banco de dados

No phpMyAdmin, acesse a aba SQL e execute:

```sql
CREATE DATABASE IF NOT EXISTS teste_comportamental
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE teste_comportamental;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

O comando cria o banco e a tabela caso ainda não existam.

Se a tabela já existir, confira sua estrutura antes de executar alterações. Não é necessário recriar os dados existentes.

## 6. Configuração da conexão

O arquivo `conexao.php` utiliza PDO para estabelecer a conexão com o MySQL.

Configuração do ambiente local padrão do XAMPP:

- Servidor: `localhost`
- Banco: `teste_comportamental`
- Usuário: `root`
- Senha: vazia, conforme a configuração padrão local

Em ambientes diferentes, os dados de conexão devem ser ajustados conforme a configuração do servidor.

## 7. Cadastro e segurança das senhas

O arquivo `cadastro.php` registra novos usuários no banco.

A senha é protegida com `password_hash()` antes de ser armazenada. O sistema não deve guardar senhas em texto puro.

O e-mail deve ser único para evitar cadastros duplicados.

## 8. Autenticação

O arquivo `login.php` consulta o usuário pelo e-mail e valida a senha com `password_verify()`.

Após a autenticação, o sistema registra na sessão:

- `usuario_id`
- `usuario_nome`

O arquivo `verificar_login.php` verifica se existe um usuário autenticado antes de permitir o acesso às páginas protegidas.

O arquivo `logout.php` encerra a sessão do usuário.

## 9. Procedimento para executar o projeto

1. Instalar e iniciar o XAMPP.
2. Iniciar os serviços Apache e MySQL.
3. Copiar o projeto para a pasta `htdocs`.
4. Abrir o phpMyAdmin em `http://localhost/phpmyadmin`.
5. Criar o banco e a tabela conforme as instruções deste documento.
6. Conferir os dados de conexão no arquivo `conexao.php`.
7. Acessar `http://localhost/teste-comportamental/`.
8. Criar uma conta e testar o login.

## 10. Observações

- Não publicar senhas reais de bancos de dados no GitHub.
- Em ambientes de produção, utilizar credenciais próprias e permissões restritas.
- O banco atualmente documentado armazena os usuários. A persistência dos resultados comportamentais não está descrita como implementada neste documento.
- Antes de importar ou executar scripts em um banco existente, realizar backup dos dados importantes.
