## Installation

Clone Repository

`git clone git@gitlab.com:spacedev30/portfolio-system.git`

Move to the newly created directory

`cd portfolio-system`

Create a new .env file from .env.example

`cp .env.example .env`

Now edit your .env file and set your env parameters (Specially the database username/pass, database name)

Install dependencies

`composer install`

`npm install`

Generate a new key for your app

`php artisan key:generate`

Run Mix to build assets

`npm run dev`

Reload Database

`php artisan migrate:refresh --seed`

Done, You're ready to go

`php artisan serve`



