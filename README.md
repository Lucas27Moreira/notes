# 📝 Notes

Aplicação web de anotações pessoais com autenticação de usuários, construída com **Laravel 13** e **Bootstrap 5**.

---

## 📖 Sobre o Projeto

O **Notes** é um sistema simples e funcional para criação e gerenciamento de anotações pessoais. Cada usuário possui suas próprias notas, protegidas por autenticação baseada em sessão. O projeto utiliza criptografia de IDs nas rotas para maior segurança.

### ✨ Funcionalidades

- 🔐 **Autenticação** — Login e logout com validação de formulário e mensagens de erro em português
- 📋 **Listagem de notas** — Visualização de todas as notas do usuário logado
- ➕ **Criar nota** — Formulário com validação para título (3–200 caracteres) e conteúdo (3–3000 caracteres)
- ✏️ **Editar nota** — Edição de notas existentes (em desenvolvimento)
- 🗑️ **Excluir nota** — Remoção de notas (em desenvolvimento)
- 🔒 **IDs criptografados** — Proteção das rotas com criptografia/descriptografia de IDs via `Illuminate\Support\Facades\Crypt`
- 🕐 **Registro de último login** — Armazena a data/hora do último acesso do usuário
- 🗃️ **Soft Deletes** — Exclusão lógica em usuários e notas

---

## 🛠️ Tecnologias

| Camada       | Tecnologia                        |
| ------------ | --------------------------------- |
| **Backend**  | PHP 8.3+ / Laravel 13             |
| **Frontend** | Blade / Bootstrap 5 / Font Awesome |
| **Banco**    | SQLite (padrão) ou MySQL          |
| **Build**    | Vite 8 / Tailwind CSS 4           |
| **Servidor** | Laragon (ambiente local)          |

---

## 📁 Estrutura do Projeto

```
notes/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php      # Login, logout e validação
│   │   │   └── MainController.php      # CRUD de notas
│   │   └── Middleware/
│   │       ├── CheckIsLogged.php       # Protege rotas autenticadas
│   │       └── CheckIsNotLogeed.php    # Protege rotas de visitantes
│   ├── Models/
│   │   ├── Note.php                    # Model de notas (belongsTo User)
│   │   └── User.php                    # Model de usuário (hasMany Notes)
│   └── Services/
│       └── Operations.php              # Criptografia/descriptografia de IDs
├── database/
│   └── migrations/
│       ├── create_users_table.php      # username, password, last_login
│       └── create_notes_table.php      # user_id, title, content
├── resources/
│   └── views/
│       ├── layout/
│       │   └── main_layout.blade.php   # Layout base (Bootstrap + Font Awesome)
│       ├── home.blade.php              # Listagem de notas
│       ├── login.blade.php             # Página de login
│       ├── new_note.blade.php          # Formulário de nova nota
│       ├── note.blade.php              # Componente de nota individual
│       └── top_bar.blade.php           # Barra de navegação superior
├── routes/
│   └── web.php                         # Rotas da aplicação
└── ...
```

---

## 🗄️ Banco de Dados

### Tabela `users`

| Coluna       | Tipo         | Descrição                |
| ------------ | ------------ | ------------------------ |
| `id`         | INTEGER (PK) | Auto incremento          |
| `username`   | VARCHAR(50)  | Email do usuário         |
| `password`   | VARCHAR(200) | Senha com hash (bcrypt)  |
| `last_login` | DATETIME     | Último acesso            |
| `deleted_at` | TIMESTAMP    | Soft delete              |

### Tabela `notes`

| Coluna       | Tipo           | Descrição              |
| ------------ | -------------- | ---------------------- |
| `id`         | INTEGER (PK)   | Auto incremento        |
| `user_id`    | INTEGER (FK)   | Referência ao usuário  |
| `title`      | VARCHAR(200)   | Título da nota         |
| `content`    | VARCHAR(3000)  | Conteúdo da nota       |
| `deleted_at` | TIMESTAMP      | Soft delete            |

---

## 🚀 Instalação

### Pré-requisitos

- **PHP** >= 8.3
- **Composer**
- **Node.js** e **npm**
- **SQLite** (ou MySQL)

### Passo a passo

```bash
# 1. Clonar o repositório
git clone https://github.com/Lucas27Moreira/notes.git
cd notes

# 2. Instalar dependências (método rápido)
composer run setup

# Ou manualmente:
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

### Executando localmente

```bash
# Iniciar todos os serviços (servidor, queue, logs e Vite)
composer run dev
```

Esse comando inicia simultaneamente:
- 🌐 `php artisan serve` — Servidor HTTP
- 📬 `php artisan queue:listen` — Worker de filas
- 📜 `php artisan pail` — Logs em tempo real
- ⚡ `npm run dev` — Vite (hot reload)

Acesse a aplicação em **http://localhost:8000**

---

## 🔗 Rotas

| Método | URI                  | Ação                          | Middleware       |
| ------ | -------------------- | ----------------------------- | ---------------- |
| GET    | `/login`             | Exibe formulário de login     | CheckIsNotLogged |
| POST   | `/loginSubmit`       | Processa login                | CheckIsNotLogged |
| GET    | `/`                  | Página inicial (listar notas) | CheckIsLogged    |
| GET    | `/new-note`          | Formulário de nova nota       | CheckIsLogged    |
| POST   | `/newNoteSubmit`     | Salvar nova nota              | CheckIsLogged    |
| GET    | `/edit-note/{id}`    | Editar nota (em dev)          | CheckIsLogged    |
| GET    | `/delete-note/{id}`  | Excluir nota (em dev)         | CheckIsLogged    |
| GET    | `/logout`            | Encerrar sessão               | CheckIsLogged    |

---

## 🧪 Testes

```bash
composer run test
```

---

## 📄 Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).
