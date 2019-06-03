# Nexmo SMS with Laravel

This repository holds an example of a Laravel application that receives incoming SMS messages from [Nexmo](https://nexmo.com). It's used in @lornajane's talks.

## Setup

* Clone this repository, then run `composer install`.

* Add your API key, secret and signature secret to the config (if you don't already have a Nexmo account, sign up [here](https://dashboard.nexmo.com)).

* This application expects to use a queue, configure your Beanstalkd, Redis or Laravel Horizon setup accordingly, or use the `sync` queue type.

* Run `php artisan serve` to start the application. If you're running locally, use [ngrok](https://ngrok.com) to expose your application to the outside world.

* Buy a Nexmo number, and link it to the URL of your application - with `/webhooks/inbound-sms` on the end of the URL (this is the route the application expects).

* Send an SMS to your number!
