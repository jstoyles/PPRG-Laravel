# PPRG-Laravel
Using Laravel 8 to get the top 100 PHP repos on Github

## Installation

```bash
Follow the steps to install Laravel 8 at:
https://laravel.com/docs/8.x/installation

I used the composer option...
https://laravel.com/docs/8.x/installation#installation-via-composer

Once you have Laravel up and running just copy the files in this repo
to their respective locations in the Laravel file structure in your instance of Laravel
```

## Requirements
```bash
- Web Server - Tested on Apache with mod_rewrite enabled
    If a different server is used, 
    some sort of URL rewrite rules will need to be in place to manage dynamic routing
- PHP - 7.4 (tested on 7.4.1)
- MySQL 5.7+
- Laravel 8.x
```

## Basic Architecture
This app leverages Laravel 8

Database configuration can be set up in the Laravel .env file

Use the github_popular_php_repos.sql to create the necessary database table

The core app logic is in the /app/Http/Controllers/RepoController.php file

URL routes can be found in the /routes/web.php file

To reset the data in the database table you can simply call the 
/reset-repos/ route from a browser

All views for this app are in the /resources/views folder

## Considerations
The endpoint to handle resetting of the database table is in no way protected against something like a DDoS attack. Under normal circumstances I would prevent this endpoint from being reached by the outside world, but it seemed like overkill for the needs of this example project.
