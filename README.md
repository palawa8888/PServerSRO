# PSeverSRO extension for PServerCMS

## SYSTEM REQUIREMENTS

requires PHP 5.6 or later; we recommend using the latest PHP version whenever possible.

## INSTALLATION

### Composer

Installation of this module uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

```sh
php composer.phar require kokspflanze/p-server-sro
# (When asked for a version, type `dev-master`)
```

Then add `PServerSRO`, `DoctrineModule`, `DoctrineORMModule`, `PDODblibModule`, `GameBackend`, `PServerCore` and `PServerRanking`
 to your `config/application.config.php` and create directory
`data/cache` and make sure your application has write access to it.

Installation without composer is not officially supported and requires you to manually install all dependencies
that are listed in `composer.json`

## Features

- fortresswar information [view-helper, `fortressGuildViewSro`]
- ranking of the different jobs information [view-helper, `rankingJobTraderViewSro`, `rankingJobHunterViewSro`, `rankingJobThievesViewSro`]
- also own ranking pages for the jobs [route, `PServerRanking/sro_ranking_job` with action `top-trader`, `top-hunter` or `top-hieves`]
- unstuck feature in the character panel


## Problems or improvements

Please write an issue or create a pull-request @ GitHub