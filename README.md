# 📌 Tarefas API

Uma API RESTful desenvolvida em Laravel para gerenciar tarefas e subtarefas de forma prática e eficiente.

---

## 📖 Descrição

Este projeto é uma aplicação backend desenvolvida com Laravel que permite:

✅ Criar, listar, atualizar e deletar tarefas.  
✅ Criar, listar, atualizar e deletar subtarefas.  
✅ Atualizar o status de conclusão de forma manual, mantendo o histórico.

Ideal para treinar conceitos de API REST, validação, controle manual e versionamento de código!

---

## 🚀 Tecnologias Utilizadas

- PHP ^8.x  
- Laravel ^10.x  
- MySQL  
- Postman (para testes de API)  
- Git & GitHub  

---

## ⚙️ Instalação

```bash
# Clone o repositório
git clone https://github.com/livia-oliveira/tarefas-api.git

# Acesse a pasta do projeto
cd tarefas-api

# Instale as dependências
composer install

# Copie o arquivo de exemplo do ambiente
cp .env.example .env

# Gere a key da aplicação
php artisan key:generate

# Execute as migrations
php artisan migrate

# Suba o servidor
php artisan serve



