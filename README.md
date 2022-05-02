### Requisitos

Será necessário ter instalado na máquina:
- [API do projeto de teste](https://github.com/ejuniorls/teste-api-l5).
- [Laragon](https://laragon.org/download/).
- Banco de dados MySql.

### Instalação
- Clone o projeto no diretório `www` do Laragon.
- Crie uma base no MySql (`l5_database`).

Abra o terminal no diretório do projeto e execute o comando abaixo:
```bash
composer install
```
Copie o arquivo `.env.example` e renomeie para `.env`. E preencha os dados abaixo:

```bash
DB_DATABASE=l5_database
DB_USERNAME=usuário
DB_PASSWORD=senha
```
Execute os comandos abaixo.
```bash
php artisan key:generate
php artisan migrate
```

Execute o comando abaixo para rodar a aplicação.
```bash
php artisan serve
```
