# PSeverSRO extension for PServerCMS

## SYSTEM REQUIREMENTS

requires PHP 5.6 or later; we recommend using the latest PHP version whenever possible.

## INSTALLATION

### Composer

Installation of this module uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

Step #1 (Install the extension to your system): 
php composer.phar require kokspflanze/p-server-sro

Step #2: Now let's begin with installation, In order to make the pages accessible we have to edit the ACL file, to do so open page/config/autoload/bjyauthorize.global.php 

Step #3: at the very beginning of your file you have to add use the PServerSRO Controller to do so add:
```
 use PServerSRO\Controller as PServerSRO;
```
Step #4: Now we have to add resources so under the ‘resource_providers’ add: 
```
 'PServerRanking/sro_ranking_job' => [],
 'PServerSRO/un_stuck' => [],
 'PServerSRO/admin_character' => [],
 'PServerSRO/admin_smc_log' => [],
 'PServerSRO/admin_job_name_history' => [],
```

Step #5: Now let’s add some rule providers in order to setup permissions. Let’s head to ‘rule_providers’ and add these lines: 
```
[[], 'PServerRanking/sro_ranking_job'],
[['user'],  'PServerSRO/un_stuck'],
[['admin'], 'PServerSRO/admin_character'],
[['admin'], 'PServerSRO/admin_smc_log'],
[['admin'], 'PServerSRO/admin_job_name_history'],
```

Step #6: The last thing you have to do is to setup the usage of the controllers, and to do this let’s head to ‘guards’ and add these lines: 
```
['controller' => PServerSRO\RankingJobController::class, 'roles' => []],
['controller' => PServerSRO\UnStuckController::class, 'roles' => ['user']],
['controller' => PServerSRO\AdminCharacterController::class, 'roles' => ['admin']],
['controller' => PServerSRO\AdminSMCLogController::class, 'roles' => ['admin']],
['controller' => PServerSRO\AdminJobNameHistoryController::class, 'roles' => ['admin']],
```

Step #7: Fortress war guilds view function is {{ fortressGuildViewSro() }} just add it to your sidebar, or where-ever you want. 

Note: if you haven’t installed the full CMS you will have to add 
PServerSRO, 
DoctrineModule, 
DoctrineORMModule, 
PDODblibModule,
GameBackend, 
PServerCore, and
PServerRanking to your config/application.config.php and create directory
`data/cache` and make sure your application has write access to it.

Installation without composer is not officially supported and requires you to manually install all dependencies
that are listed in `composer.json`

## Features

This fancy extension provides a lot of helpful tools for your system such as: 

-Job ranking (Hunters | Traders | Thieves) accessible from the ranking pages

-Unstuck character (Teleport the buggy char back to town) accessible from the character panel

-Character options (Ability to view characters in your DB) accessible from admin panel

-Job name history (Ability to view original job names & changed ones) accessible from admin panel

-SMC Log (Shows the GM/SMC logs on your website) accessible from admin panel 

-Fortress owners guilds (Can be shown anywhere you want, and for every role)

## Problems or improvements

Please write an issue or create a pull-request @ GitHub
