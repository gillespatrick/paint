# PAINT PROJECT

Paint project is a website that displays paintings

## Development Environment

### Getting Started

- PHP 7.4
- Composer
- Symfomy CLI
- Docker
- Docker-Compose

You can check all the getting started whitout Docker

```bash
symfony check:requirements
```

### Launch Development Environment

```bash
docker-compose up -d
symfony serve -d
```

### Launch Tests (It is not working)

```bash
php bin/phpunit --testdox
```