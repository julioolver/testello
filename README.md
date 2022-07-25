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
- [Usage](#usage)
- [Built Using](#built_using)
- [TODO](../TODO.md)
- [Authors](#authors)

## 🧐 About <a name = "about"></a>

API para realizar o teste desenvolvedor Back-end na Uello.

## 🏁 Getting Started <a name = "getting_started"></a>

Essas instruções fornecerão a você uma cópia do projeto em execução em sua máquina local para execução do teste.

### Prerequisites

```
Docker e docker-compose.
```

### Installing

Rodar o Build do Docker e subir os containers do PHP, NGINX e MYSQL:

```
docker-compose up -d || docker-compose build, after doker-compose up -d
```
Executar o container PHP para trabalhar com o composer:

```
docker exec -it uello-test-php /bin/bash
```
Gerar a key do projeto dentro do container

```
php artisan key:generate
```

Instalar dependências do composer

```
composer install
```

Rodar migrations e seeds:

```
php artisan migrate --seed
```

Criar a jwt:secret no .env:

```
php artisan jwt:secret
```
http://localhost:80/api/

## 🔧 Running the tests <a name = "tests"></a>

## 🎈 Usage <a name="usage"></a>

## ⛏️ Built Using <a name = "built_using"></a>

- [MYSQL](https://www.mysql.com/) - Database
- [Laravel 9.x](https://laravel.com/) - Server Framework
- [PHP](https://php.net/) - Server Environment

## ✍️ Authors <a name = "authors"></a>

- [@julioolver](https://github.com/julioolver) - Idea & Initial work