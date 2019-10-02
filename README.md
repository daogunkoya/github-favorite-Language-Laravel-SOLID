# Laravel Docker Boilerplate

This repository contains the latest Laravel 5.8 framework bundled inside a docker container running on Alpine linux OS with Apache2 and PHP 7.2.

### Installation

1. git clone git@bitbucket.org:mvfglobal/laravel-docker-boilerplate.git
2. cd laravel-docker-boilerplate
3. make rebuild

> The application will be accessible via this url: http://localhost:11111

### Documentation / Notes

* Laravel specific files are placed inside `src` folder
* Docker specific files are stored inside `docker` folder
* Most of the automation are done via the `Makefile` - see below for available commands
* The public port of the application can be changed from `11111` to anything you need by editing the `docker/docker-compose.yml` file
* Apache configuration can be tweaked by editing `docker/apache2.conf`
* PHP configuration can be overloaded by editing `docker/php.ini`
* We don't use laravel's `.env` file, instead we use the docker environment file from `docker/.env-dev`
* The docker container's entrypoint is the `docker/web.sh` file (which is copied into the container to `/run/web.sh`)

### Available Make Commands

* **rebuild** - Rebuild the container and start it up again
* **down** - Brings down the container
* **restart** - Restarts the container
* **status** - Shows current status of the container, e.g. _Name, Command, State and Ports_
* **shell** - Drops you into a bash shell inside the container
* **stats** - Shows statistics (e.g. CPU utilisation, memory usage, net I/O etc...) of your container
* **logs** - Trails the stdout/stderr and other logs out of your container
* **unit-tests** - Executes the unit tests within your container
* **feature-tests** - Executes the feature tests within your container