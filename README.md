# Sabor&Brasa - Website Empresarial

Site institucional de uma churrascaria desenvolvido com HTML, CSS, JavaScript e PHP com integração ao banco de dados MySQL.

## Páginas:
- **index.html** - Página Inicial
- **sobre.html** - Sobre Nós
- **produtos.php** - Produtos e Serviços (PHP + MySQL)
- **novidades.php** - Novidades (PHP + MySQL)
- **contato.html** - Contato

## 🛠️ Tecnologias Utilizadas:
- HTML5
- CSS3
- JavaScript
- PHP
- MySQL

## ⚙️ Pré-requisitos:
Para rodar este projeto você precisa ter instalado:
- [XAMPP](https://www.apachefriends.org/pt_br/index.html)
- [PHP](https://www.php.net/)

## 🚀 Como rodar o projeto?

### 1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/website-empresarial.git
```

### 2. Mova a pasta para o htdocs
Copie a pasta do projeto para dentro do diretório do XAMPP:
C:\xampp\htdocs\website-empresarial

### 3. Inicie o XAMPP
Abra o XAMPP Control Panel e dê "start" em:
- ✅ Apache
- ✅ MySQL

### 4. Configure o banco de dados
- Acesse [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
- Clique em **Importar**
- Selecione o arquivo `banco-empresa.sql` da pasta do projeto
- Clique em **Go**

### 5. Acesse o site
Abra o navegador e acesse:
http://localhost/website-empresarial/index.html

## 🗄️ Banco de Dados:
O projeto utiliza um banco de dados MySQL chamado `empresa` com duas tabelas:

**Tabela `produtos`**
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id_prod | INT | Chave primária |
| nome | VARCHAR(75) | Nome do produto |
| valor | FLOAT | Preço |
| qtdestoque | INT | Quantidade em estoque |
| descricao | TEXT | Descrição do produto |
| imagem | VARCHAR(255) | Caminho da imagem |
| badge | VARCHAR(50) | Badge (Bestseller, Favorito, Promoção) |

**Tabela `novidades`**
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id_nov | INT | Chave primária |
| resumo | VARCHAR(255) | Título da novidade |
| descricao | TEXT | Descrição da novidade |

## 📁 Estrutura do Projeto
website-empresarial/
├── index.html
├── sobre.html
├── contato.html
├── produtos.php
├── novidades.php
├── banco-empresa.sql
├── CSS/
│   └── estilo.css
├── imagens/
│   ├── logo-restaurante.png
│   ├── combo-premium.jpg
│   ├── prato1.jpg
│   ├── prato2.jpg
│   ├── prato3.jpg
│   ├── prato4.jpg
│   ├── prato5.jpg
│   └── prato6.jpg
└── js/
└── contato.js

## ⚠️ Observação!!
As páginas `produtos.php` e `novidades.php` **não funcionam** abrindo diretamente pelo navegador ou pelo VS Code. É necessário acessá-las através do servidor local do XAMPP conforme instruções acima.
