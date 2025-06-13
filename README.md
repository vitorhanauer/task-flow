# Task Flow 🗂️

![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![License](https://img.shields.io/badge/license-MIT-green)
![Status](https://img.shields.io/badge/status-Em%20desenvolvimento-yellow)

---

## 📖 Sobre o Projeto

O **Task Flow** é uma aplicação fullstack desenvolvida com o framework **Laravel** com o objetivo de praticar e consolidar diversos conceitos fundamentais do ecossistema PHP moderno.  
O sistema permite que usuários:

- Criem e gerenciem suas tarefas;
- Organizem tarefas em grupos;
- Convidem outros usuários para colaborar em grupos;
- Realizem o gerenciamento completo de suas atividades.

Este projeto foi desenvolvido simulando um cenário de aplicação real, com uso extensivo das práticas recomendadas pelo Laravel, padrões de arquitetura e separação de responsabilidades.

---

## 🚀 Funcionalidades

- ✅ Cadastro de usuários com verificação de e-mail (Account Activation)
- ✅ Login e autenticação com proteção de rotas
- ✅ CRUD completo de tarefas:
  - Criar
  - Editar
  - Visualizar
  - Excluir
  - Marcar como concluída
- ✅ Criação e gerenciamento de grupos de tarefas
- ✅ Convite e associação de usuários aos grupos
- ✅ Permissões baseadas em membros de grupos

---

## 🧪 Conceitos Técnicos Aplicados

### 🔧 Arquitetura e Design

- **MVC (Model-View-Controller)**
- **Repository Pattern** (acesso a dados desacoplado)
- **Events & Listeners** (para eventos como verificação de conta, envio de e-mail, etc.)
- **Middlewares** (controle de autenticação, autorização e filtros)

### 🔨 Recursos Laravel

- Eloquent ORM
- Blade Templating Engine
- Laravel Mail (Mailtrap no desenvolvimento)
- Laravel Migrations & Seeders
- Validações Server-side
- Laravel Policies (controle de permissões)

### 🛡️ Boas Práticas

- Código limpo e organizado
- Separação clara de responsabilidades
- Escalabilidade e manutenibilidade
- Preparação para testes automatizados

---

## 🧱 Diagrama Simplificado da Arquitetura

```txt
Usuário
  │
  ▼
Auth Controller ──► Middleware ──► Rotas Protegidas
  │                                 │
  ▼                                 ▼
Cadastro ──► Verificação por E-mail ──► Acesso liberado
  │
  ▼
CRUD de Tarefas ──► Repository ──► Models ──► Database
  │
  ▼
Grupos ──► Controle de membros ──► Tarefas em Grupo
```
## ⚙️ Como Executar o Projeto Localmente
###Pré-requisitos
PHP 8.x
Composer
MySQL
Node.js e NPM (para assets)

###Passo a Passo

#### Clone o repositório
git clone https://github.com/seu-usuario/task-flow.git

#### Acesse o diretório
cd task-flow

#### Instale as dependências PHP
composer install

#### Instale as dependências JS
npm install && npm run dev

#### Copie o arquivo de configuração de ambiente
cp .env.example .env

#### Gere a chave da aplicação
php artisan key:generate

#### Configure o .env com as credenciais do banco e serviço de e-mail (ex: Mailtrap)

#### Rode as migrations
php artisan migrate

#### Suba o servidor local
php artisan serve

## 🎯 Melhorias Futuras
Testes automatizados com PHPUnit
Implementação de notificações in-app
Upload de arquivos para tarefas
Logs e auditoria de atividades
Melhorias de UI com TailwindCSS ou Inertia.js + Vue.js
CI/CD integrado ao GitHub Actions

## 💻 Tecnologias Utilizadas
Stack	Descrição
Backend	PHP 8.3 / Laravel 10.x
Banco de Dados	MySQL
ORM	Eloquent
Templating	Blade
Autenticação	Laravel Breeze / Sanctum (dependendo da implementação)
Envio de E-mails	Mailtrap
Gerenciamento de Dependências	Composer / NPM
Controle de versão	Git e GitHub

## 📩 Contato
LinkedIn: https://www.linkedin.com/in/vitorhanauer/
E-mail: hanauer.fo@gmail.com

## ⭐ Este projeto foi desenvolvido com foco no aprendizado, boas práticas de desenvolvimento backend e arquitetura escalável.

