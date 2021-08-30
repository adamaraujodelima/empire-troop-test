# The Problem

Every player in Empire has a castle. To let players attack another player’s castle, we need you to create armies of randomly distributed troops (a troop is a formation of soldiers with the same skill, such as Spearmen, Swordsmen, Archers, etc.)

For example, we'll call your code telling it we need a random army that's 167 men strong. Assuming our available unit types to be, for example, Spearmen, Swordsmen and Archers, what we want from you is that you tell us what such a random army would look like, e.g.

- Our Input: 167

Example result:

- 63 Spearmen
- 57 Swordsmen
- 47 Archers

(The "text output" above is just an example; we need this as structured data)

# Setup

## Requirements using Docker

- Docker (https://docs.docker.com/engine/install/)
- Docker compose (https://docs.docker.com/compose/install/)

## Installing with Docker

```bash
git clone git@github.com:adamaraujodelima/empire-troop-test.git
cd empire-troop-test && docker-compose up -d
docker exec empire-application sh -c "cd /application && composer install"
```

# Usage

## Runing with docker

### Running tests
```bash
docker exec empire-application sh -c "cd /application && ./vendor/bin/phpunit tests/" 
```

### Command structure

The application provide a command that generate a JSON output. The command needs be to the following syntax:

- php main.php -> The script that is running command in PHP
- Argument `--n` -> Number of total soldiers to divide in troops
- Agument `--t` -> Number of desired troops for division

### Example 

`php main.php --n {value of total soldiers} --t {value of total troops}`

### Running inside docker

```bash
docker exec empire-application sh -c "cd /application && php main.php --n 200 --t 3"
```