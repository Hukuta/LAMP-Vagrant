# LAMP on Vagrant

A basic Ubuntu 12.04 Vagrant setup with PHP 5.5.

## Requirements

* VirtualBox - Free virtualization software [Download Virtualbox](https://www.virtualbox.org/wiki/Downloads)
* Vagrant **1.3+** - Tool for working with virtualbox images [Download Vagrant](https://www.vagrantup.com)
* Git - Source Control Management [Download Git](http://git-scm.com/downloads)

## Setup


* Clone this repository
* run `vagrant up` inside the newly created directory
* (the first time you run vagrant it will need to fetch the virtual box image which is ~300mb so depending on your download speed this could take some time)
* Vagrant will then use puppet to provision the base virtual box with our LAMP stack (this could take a few minutes) also note that composer will need to fetch all of the packages defined in the app's composer.json which will add some more time to the first provisioning run
* You can verify that everything was successful by opening http://localhost:8888 in a browser


## Usage

Some basic information on interacting with the vagrant box

### Port Forwards

* 8888 - Apache
* 8889 - MySQL 
* 2222 - ssh


### Default MySQL/PostgreSQL Database

* User: root
* Password: password
* DB Name: database

You can connect to mysql from host machine through ssh:

* Port: 2222
* User: vagrant
* Password: vagrant

### PHPmyAdmin

Accessible at http://localhost:8888/phpmyadmin using MySQL access credentials above.

### PHP XDebug
You can connect to XDebug on **port 9001**
To disable XDebug:

1. Set the variable `$use_xdebug = "0"` at the beginning of `puppet/manifests/phpbase.pp`
2. Then you will need to provision the box either with `vagrant up` or by running the command `vagrant provision` if the box is already up

**XDebug Tools**

* [MacGDBP](http://www.bluestatic.org/software/macgdbp/) - Free, Mac OSX
* [Codebug](http://www.codebugapp.com/) - Paid, Mac OSX


_Note: All XDebug settings can be configured in the php.ini template at `puppet/modules/php/templates/php.ini.erb`_


### Vagrant

Vagrant is [very well documented](http://vagrantup.com/v1/docs/index.html) but here are a few common commands:

* `vagrant up` starts the virtual machine and provisions it
* `vagrant suspend` will essentially put the machine to 'sleep' with `vagrant resume` waking it back up
* `vagrant halt` attempts a graceful shutdown of the machine and will need to be brought back with `vagrant up`
* `vagrant ssh` gives you shell access to the virtual machine

----
##### Virtual Machine Specifications #####

* OS     - Ubuntu 12.04
* Apache - 2.4.6
* PHP    - 5.5.4
* MySQL  - 5.5.32
* Memcached - 1.4.13
