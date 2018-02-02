## General Information

This is a boilerplate template for developing applications using Slim Framework. Slim Framework comes handing with multiple extensions such as request/response handling, routing, middleware support, and dependency injection capabilities. 

I have integrated a set of components which would be applicable for many sort of projects. The integrations include:
* Twig Views
* Authentication with Session
* Eloquent ORM
* Database Migrations with Phinx
* Input validation with Respect Validation

## Installation

1. Clone the repository. Rename the repository as you wish.
2. Move `index.php` and `.htaccess` to your server's root. Adjust reference to `app.php` from your `index.php`.
3. Edit create `.env` file and configure environment variables.
4. Enjoy the development of your Web API/Application.

## FAQ

#### How can I create a migration?
Use `./vendor/bin/phinx create YourMigrationClassName` command to create a migration.  

#### How can I commit my migration classes?
Use `./vendor/bin/phinx migrate` command to commit a migration to your database. 

#### How can I rollback a commit?
Use `./vendor/bin/phinx rollback` command to rollback a commit. 

#### How can I create an Eloquent Model?
Create a class in `app/Models/` directory that extends `Illuminate\Database\Eloquent\Model` class.

## Contributors

Javid Museyibli - Software Developer, OnePlate

## License

MIT licensed, (c) [@jmuseyli](http://twitter.com/jmuseyibli)