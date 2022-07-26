<p align="center">
  <a href="" rel="noopener">
 <img width=200px height=200px src="https://www.uello.com.br/dist/images/logo.png" alt="Uello logo"></a>
</p>

# <h3 align="center">Uello - Teste Back-End</h3>

---

<p align="center"> API para realizar o teste desenvolvedor Back-end na Uello.
    <br> 
</p>

## 📝 Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Authors](#authors)

## 🧐 About <a name = "about"></a>

API para realizar o teste desenvolvedor Back-end na Uello. No teste deve-se importar um arquivo CSV e gravar no sistema, esse processo foi desenvolvido para importar o CSV através da queue do Laravel, junto com jobs, com o auxílio da lib Laravel/Excel.

Para realizar a importação, deve-se estar logado no sistema, e passar junto da requisição o token do usuário logado, retornando quando realiza o login.

## 🏁 Getting Started <a name = "getting_started"></a>

Essas instruções fornecerão a você uma cópia do projeto em execução em sua máquina local para execução do teste.

### Prerequisites

```
Docker e docker-compose.
```

### Installing

Para iniciar o processo de instalação, se torna necessário clonar o repositório, e criar uma cópia do .env.exemple para .env

Rodar o Build do Docker e subir os containers do PHP, NGINX e MYSQL:

```
docker-compose up -d || docker-compose build, after docker-compose up -d
```
Executar o container PHP para trabalhar com o composer:

```
docker exec -it testello-php /bin/bash
```
Gerar a key do projeto dentro do container

```
php artisan key:generate
```

Instalar dependências do composer

```
composer install
```

Rodar migrations e seeds (para criar o usuário Admin):

```
php artisan migrate --seed
```

Criar a jwt:secret no .env:

```
php artisan jwt:secret
```

Iniciar a fila para trabalhar com as importações: 

```
php artisan queue:work
```

http://localhost:80/api/

Para visualizar as rotas e requisições, segue o arqivo <b>Testello.postman_collection.json</b>, para importação no Postman.

## ⛏️ Built Using <a name = "built_using"></a>

- [MYSQL](https://www.mysql.com/) - Database
- [Laravel 9.x](https://laravel.com/) - Server Framework
- [PHP](https://php.net/) - Server Environment

## ✍️ Authors <a name = "authors"></a>

- [@julioolver](https://github.com/julioolver) - Idea & Initial work