# Silex API Skeleton

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/57726bad38a349c1b01083c11706fb8f)](https://www.codacy.com/app/matheus-marabesi/silex-api-skeleton?utm_source=github.com&utm_medium=referral&utm_content=marabesi/silex-api-skeleton&utm_campaign=badger)
[![Build Status](https://travis-ci.org/marabesi/silex-api-skeleton.svg?branch=master)](https://travis-ci.org/marabesi/silex-api-skeleton)

A simple and up to date silex skeleton to build your API.

# Packages

- Monolog
  - Monolog is a easy way to keep logs in your application, it's easy to use and is possible to create graphs to analyze better your logs.
- Doctrine
  - Database abstraction layer
- CORS
  - Add CORS validation into your API
- PHPDOTENV
  - Allow us to use **.env** files instead of static PHP files to store configurations
- Annotation
  - Uses annotation to create routes to be used in the application, you no longer need 
    a huge routes files 

# Executables

This skeleton provides to you all executables need to run you tests for example or
to run the composer to install the dependencies, usually you must have those
installed in your machine but here it is easier as well.

|Executable|Description|
|----------|-----------|
|php bin/codeception.phar  |  Executes all the existing tests    |
|php bin/composer.phar  |  Install all dependencies needed |
|php bin/phpcs.phar  |   Execute the code sniffer to check the code quality   |

### Running composer

```
git clone https://github.com/marabesi/silex-api-skeleton.git && cd silex-api-skeleton

php bin/composer.phar install
```

### Running phpcs

```
git clone https://github.com/marabesi/silex-api-skeleton.git && cd silex-api-skeleton

php bin/phpcs.phar -h
```

### Running codeception

```
git clone https://github.com/marabesi/silex-api-skeleton.git && cd silex-api-skeleton

php bin/codecept.phar -h
```

# Configuration

Often we do need to define configurations to be used through the application,
to provide that in this skeleton we use the **.env** pattern. This pattern
allow us to define environment variables outside the project structure.

URL, database connection, log level are the most common configurations used
across the project.

The **env.example** inside this project has some default keys to be used, but to use them
you need first rename the file in the project root. To do that just run the following command
inside the project's folder

```
mv env.example .env
```

Now you're ready to go, of course you need to provide valid values to your application to work

```
DEBUG=true
ENV=development
URL=http://localhost:8000
APP_NAME=SILEX_API_SKELETON

DB_DRIVER=pdo_mysql
DB_HOST=localhost
DB_USER=homestead
DB_PASSWORD=secret
DB_DATABASE=silex
```

To get you going smooth into the skeleton, here goes what each of the variables inside the **.env** file means

|Key|Default value|Description|
|---|-------------|-----------|
|ENV| development | Define in which environment the application is running |
|URL| http://localhost:8000 | The absolute URL where the application is running |
|APP_NAME| SILEX_API_SKELETON | The name used by monolog, this name identifies the application in the log files |
|DEBUG| true | When true enables the debug logging |
|DB_DRIVER| pdo_mysql | Which driver you want to use with doctrine ORM |
|DB_HOST| localhost | Where your database is located |
|DB_USER| homestead | The user name to access the database |
|DB_PASSWORD| secret| The password needed to access the database |
|DB_DATABSE| silex | The database which the application talks to |

# Directory structure

In this section you can know more about the structure being used

```
|__bin                           # executables
    |__ codecept.phar            #
    |__ composer.phar            #  
    |__ phpcs.phar               #
|__resources                     # The resources folder is the right place to add configurations, sql scripts, or other possible "assets" of the project            
   |_ config                     #
   |_sql                         #
|__src                           # source of your application, you should store all your custom classes here
|__storage                       # stores files generated by the application
      |__ cache                  # store cache files
      |__ logs                   # store logs files
|__tests                         #
     |__acceptance               # acceptance folder test
     |__functional               # functional folder test
     |__unit                     # unit folder test
|__web                           # public directory where all the request come from

```

# Tests

This project uses the [codeception](http://codeception.com/) framework to run the tests. Codeception is a easy
and a complete solution to run unit, function and acceptance test all at once and with one tool.


# Docker container

Make sure to have the right permissions before start the API, follow
the table shown below to know which permission you should apply

|Path|Permission|Command|
|---|-----------|-------|
|storage/| Read and Write | chmod -R 777 storage/|

This API skeleton ships with a docker file to speed up your environment setup, basically you must have
docker installed in your machine and then run the following commands in your terminal

```
git clone https://github.com/marabesi/silex-api-skeleton.git && cd silex-api-skeleton

cd docker && docker build . -t acme-api

docker run -d -v WHERE_YOUR_SILEX_API_IS:/var/www/html -p 80:80 acme-api
```

