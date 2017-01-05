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

Go to `config/application.config.php`and add `PServerSRO` in the `modules` section, after this create directory
`data/cache` and make sure your application has write access to it.

### Update PServerCMS ACL

Now let's begin with installation, In order to make the pages accessible we have to edit the ACL file, to do so open page `config/autoload/bjyauthorize.global.php` 

Now we have to add resources so under the `resource_providers` add: 
```php
 'PServerRanking/sro_ranking_job' => [],
 'PServerSRO/un_stuck' => [],
 'PServerSRO/admin_character' => [],
 'PServerSRO/admin_smc_log' => [],
 'PServerSRO/admin_job_name_history' => [],
```

Now let’s add some rule providers in order to setup permissions. Let’s head to `rule_providers` and add these lines: 
```php
[[], 'PServerRanking/sro_ranking_job'],
[['user'],  'PServerSRO/un_stuck'],
[['admin'], 'PServerSRO/admin_character'],
[['admin'], 'PServerSRO/admin_smc_log'],
[['admin'], 'PServerSRO/admin_job_name_history'],
```

The last thing you have to do is to setup the usage of the controllers, and to do this let’s head to `guards` and add these lines: 
```php
['controller' => \PServerSRO\Controller\RankingJobController::class, 'roles' => []],
['controller' => \PServerSRO\Controller\UnStuckController::class, 'roles' => ['user']],
['controller' => \PServerSRO\Controller\AdminCharacterController::class, 'roles' => ['admin']],
['controller' => \PServerSRO\Controller\AdminSMCLogController::class, 'roles' => ['admin']],
['controller' => \PServerSRO\Controller\AdminJobNameHistoryController::class, 'roles' => ['admin']],
```

Than the file should looks something like the [Example-File](https://github.com/kokspflanze/PServerSRO/blob/master/doc/bjyauthorize.global.php).
Please don’t copy this file, it is possible that this does not include the latest version of the PServerCMS.


### How to add a View-Helper

First of all you need your own template files, a guide you can find [here](https://github.com/kokspflanze/pserverCMSFull/blob/master/doc/CUSTOMIZE.md#how-to-change-the-layout).

Than you have to add in a twig template file something like `{{ fortressGuildViewSro() }}` as example for the fortress-war information.
In a phtml file it will looks like `<?= $this->fortressGuildViewSro() ?>`. You can add it every where, in the sidebar, or directly in the layout. 

## Features

This fancy extension provides a lot of helpful tools for your system such as: 

- Job ranking (Hunters | Traders | Thieves) accessible from the ranking pages

- Unstuck character (Teleport the buggy char back to town, default hotan) accessible from the character panel

- Character options (Ability to view characters in your DB) accessible from admin panel

- Job name history (Ability to view original job names & changed ones) accessible from admin panel

- SMC Log (Shows the GM/SMC logs on your website) accessible from admin panel 

- Fortress owners guilds (Can be shown anywhere you want, and for every role) as ViewHelper `fortressGuildViewSro`

- Job ranking widgets (Can be shown anywhere you want, and for every role) as ViewHelper `rankingJobTraderViewSro`, `rankingJobHunterViewSro`, `rankingJobThievesViewSro`

- Job type to name mapper (For your own customize parts, if you want to show the job of a character) as ViewHelper `jobType2Name`

## Problems or improvements

Please write an issue or create a pull-request @ GitHub
