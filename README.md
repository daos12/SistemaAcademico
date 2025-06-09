# 📘 Sistema Acadêmico com PHP e MySQL

Este projeto foi desenvolvido como parte das aulas do curso **Técnico em Informática – Senac Patrocínio/MG**, com o objetivo de aplicar os fundamentos de desenvolvimento web com **PHP** e **MySQL**. O sistema simula o controle de matrículas de alunos em cursos.

---

## 🎯 Objetivo

Criar um sistema acadêmico funcional com as operações básicas de **cadastro, leitura, edição e exclusão de dados** (CRUD), utilizando PHP para o back-end e MySQL para persistência de dados, com interface estilizada em Bootstrap.

---

## 🔧 Funcionalidades

- Tela de **login** com verificação no banco de dados;
- Controle de **sessão** com `$_SESSION`;
- Cadastro de alunos (nome e curso);
- Listagem dos registros cadastrados;
- Edição de dados com formulário;
- Exclusão de registros com confirmação;
- Menu bloqueado até login válido;
- Interface moderna com **Bootstrap 5**.

---

## 🛠️ Tecnologias Utilizadas

- HTML5  
- CSS3 (Bootstrap)  
- PHP 7+  
- MySQL / phpMyAdmin  
- XAMPP (servidor local)

---

## 🗃️ Banco de Dados

### Banco: `sistemaAcademico`

#### Tabela: `matricula`

```sql
CREATE TABLE matricula (
    idMatricula INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    curso VARCHAR(100) NOT NULL
);
```

#### Tabela: `usuarios` (login)

```sql
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL
);
```

---

## 📂 Organização do Projeto

| Arquivo          | Função                             |
|------------------|------------------------------------|
| `index.php`      | Página principal + login           |
| `cadastro.php`   | Cadastro de alunos                 |
| `atualizar.php`  | Edição de registros                |
| `lendoDados.php` | Visualização de dados              |
| `apagar.php`     | Exclusão de registros              |
| `logout.php`     | Encerramento da sessão             |
| `conexao.php`    | Conexão com banco de dados         |

---

## 🚀 Como Executar Localmente

1. Instale e inicie o **XAMPP** (Apache + MySQL).
2. Copie os arquivos para a pasta `htdocs`.
3. No phpMyAdmin, crie o banco `sistemaAcademico`.
4. Execute os comandos SQL acima para criar as tabelas.
5. Insira um usuário na tabela `usuarios` para login:

```sql
INSERT INTO usuarios (email, senha) VALUES ('admin@teste.com', '1234');
```

6. Acesse o sistema via navegador:

```
http://localhost/nomedapasta/index.php
```

---

## 📚 Base Didática

Este sistema foi baseado no conteúdo do material **“06.0 - PHP.pdf”**, que aborda:

- Introdução ao PHP
- Estruturas de controle
- Manipulação de formulários
- Conexão com banco de dados
- Desenvolvimento de CRUD com HTML/PHP

---

> Projeto educacional – Desenvolvido por Diego Antonio com fins didáticos para o Senac Patrocínio/MG.
