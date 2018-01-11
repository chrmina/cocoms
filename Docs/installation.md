# CoCoMS | Installation

## Introduction
**CoCoMS** is a simple Document Management System designed specifically for the management of correspondence generated during the execution of a construction project. **CoCoMS** was built using the excellent [CakePHP](https://book.cakephp.org/3.0/en/installation.html) framework.

## Requirements ##

* [LAMP](https://en.wikipedia.org/wiki/LAMP_%28software_bundle%29) or [WAMP](https://en.wikipedia.org/wiki/LAMP_%28software_bundle%29#WAMP)
* HTTP Server. For example: Apache. Having mod_rewrite is preferred, but by no means required.
* PHP 5.6.0 or greater (including PHP 7.1).
* mbstring PHP extension
* intl PHP extension
* simplexml PHP extension
* MySQL (5.1.10 or greater)

## Installation ##

You will need the following installed on your syetem:
* [Composer](https://getcomposer.org/) 
* [Git](https://git-scm.com/)

Step by step instructions:
* Clone the CoCoMS files from git hub: `git clone http://github.com/chrmina/cocoms.git`
* Update composer: `composer selfupdate`
* Run composer to download all dependencies: `composer update`
* Rename `app.default.php` to `app.php`
* Edit `app.php` to match your system configuration.

## Contents
* [Home](home.md)
* [Overview](overview.md)
* Installation
* [Translations](translations.md)