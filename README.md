# Symfony API Project Example

This project represents the online course "Criando uma API Rest com Symfony 4" from School of Net. It work from entities Movies and relation with Categories, providing an API examples with filters, pagination and grouping results.

# Run project

1. Installing dependencies (delete composer.lock) `composer install`
2. Config and initialize database
- Edit conection data in file `.env`, string DATABASE_URL with your `user:pass@host:port`
- Create a database with default config: `php bin/console doctrine:database:create` 
- Create the structure using migrations: `php bin/console doctrine:migrations:migrate` 
2. Run server `php -S 127.0.0.1:8000 -t public`
3. Generate the public and private keys used for signing JWT tokens. [See more Lexik:Jwt:Bundle](https://github.com/lexik/LexikJWTAuthenticationBundle/blob/3.x/Resources/doc/index.rst#getting-started)

```shell
php bin/console lexik:jwt:generate-keypair
# Linux only
setfacl -R -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt
setfacl -dR -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt
```

4. Create an user to application, in browser: `http://localhost:8000/register`
5. Generate a token to use apis with user created: `php bin/console lexik:jwt:generate-token username`
6. Use the APIs Endpoints with `Authorization: Bearer {token}` header
 
# Built With

* [Symfony 4](https://symfony.com/) - The web framework used
* [API Plataform](https://api-platform.com/) - API Plugin
* [JWT](https://api-platform.com/docs/core/jwt/) - The Auth method used

# Authors

* **Fhabiana Machado** - *Reproducer* - [Github](https://github.com/ftmachado)
