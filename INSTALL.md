## How to install and run Gentelella

To install and run Gentelella application you must have installed:

- MySQL or related
- PHP ^7.0
- Composer
- Bower

Before installing the application you must run your database e.g. running the shell command:

```shell
$ mysql start
```

Then run the commands:

```shell
$ composer create-project krzysiekpiasecki/gentelella gentelella "dev-master"
$ cd gentelella
$ composer setup
$ composer test
$ php bin/console fos:user:create --super-admin
$ php bin/console server:run 127.0.0.1:8080 --env=dev
```

After successfully running all commands navigate to:

```
http://127.0.0.1:8080
```

### Window notes

Start the mysql server first. Then run the commands in the terminal:

```shell
$ composer create-project krzysiekpiasecki/gentelella gentelella "dev-master"
$ cd gentelella
$ .\vendor\bin\phing.bat setup
$ .\vendor\bin\phpunit.bat
$ php bin\console fos:user:create --super-admin
$ php bin\console server:run 127.0.0.1:8080 --env=prod
```


To install PHP as CLI follow the article:
[Command Line PHP on Microsoft Windows](http://php.net/manual/pl/install.windows.commandline.php)
