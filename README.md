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

```

## 📚 Rotas Principais

📝 Tarefas

| Método | Rota                             | Descrição                    |
| ------ | -------------------------------- | ---------------------------- |
| GET    | /api/tarefas                     | Listar todas as tarefas      |
| POST   | /api/tarefas                     | Criar uma nova tarefa        |
| GET    | /api/tarefas/{id}                | Exibir uma tarefa específica |
| PUT    | /api/tarefas/{id}                | Atualizar uma tarefa         |
| PATCH  | /api/tarefas/{id}/alterar-status | Alterar status de uma tarefa |
| DELETE | /api/tarefas/{id}                | Deletar uma tarefa           |
| DELETE | /api/tarefas                     | Deletar todas as tarefas |



📝 Subtarefas

| Método | Rota                                | Descrição                       |
| ------ | ----------------------------------- | ------------------------------- |
| GET    | /api/subtarefas                     | Listar todas as subtarefas      |
| POST   | /api/subtarefas                     | Criar uma nova subtarefa        |
| GET    | /api/subtarefas/{id}                | Exibir uma subtarefa específica |
| PUT    | /api/subtarefas/{id}                | Atualizar uma subtarefa         |
| PATCH  | /api/subtarefas/{id}/alterar-status | Alterar status de uma subtarefa |
| DELETE | /api/subtarefas/{id}                | Deletar uma subtarefa           |
| DELETE | /api/subtarefas                     | Deletar todas as subtarefas |

---

## 💡 Aprendizados

- Uso do Laravel como framework backend

- Boas práticas de versionamento com Git

- Controle manual de atualização de dados

- Criação de APIs RESTful

---

## 🖊️ Autora
Lívia Oliveira
[GitHub](https://github.com/livia-oliveira)

---

## 📄 Licença
Este projeto está sob a licença MIT.





