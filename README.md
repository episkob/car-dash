# Car-Dash — Bacheca Annunci Auto

Piattaforma di annunci per la vendita di automobili, costruita con **Laravel 13** e pannello di amministrazione **Filament v5**.

## Stack tecnologico

- **PHP 8.4** / **Laravel 13**
- **Filament v5** — pannello admin
- **MariaDB** — database relazionale
- **Vite** — frontend build tool

## Funzionalità implementate

### Pannello di amministrazione (`/admin`)

- **Localizzazione** — gestione della gerarchia geografica italiana:
  - Paesi (con codice ISO)
  - Regioni
  - Province
  - Comuni
  - Città / Frazioni (con tipo: Città o Frazione)
  - Selezioni a cascata nella form Città: Paese → Regione → Provincia → Comune

## Installazione locale

```bash
git clone https://github.com/episkob/car-dash.git
cd car-dash

composer install
cp .env.example .env
php artisan key:generate

# configurare il database in .env, poi:
php artisan migrate
php artisan make:filament-user
```

## Licenza

MIT
