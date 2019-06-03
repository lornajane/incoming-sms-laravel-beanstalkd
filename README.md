# Nexmo SMS with Laravel

This repository holds an example of a Laravel application that receives incoming SMS messages from [Nexmo](https://nexmo.com). It's used in @lornajane's talks.

## Install the application and Dependencies

* Clone this repository, then run `composer install`.

* This application expects to use a queue, configure your Beanstalkd, Redis or Laravel Horizon setup accordingly, or use the `sync` queue type.

## Configure the application

* Run `php artisan vendor:publish` to get the `config/nexmo.php` configuration file.

* Add your API key, secret and signature secret to the config (if you don't already have a Nexmo account, sign up [here](https://dashboard.nexmo.com)).

* Buy a Nexmo number, and link it to the URL of your application - with `/webhooks/inbound-sms` on the end of the URL (this is the route the application expects).

**Pro-tip:** If you're running locally, use [ngrok](https://ngrok.com) to expose your application to the outside world.

## Usage

* Run `php artisan serve` to start the application. 

* Send an SMS to your Nexmo number!
