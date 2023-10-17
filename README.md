### ABOUT

This is a version 2 of the `Save Your Home Weather App` that I built a few months ago. This version pf the app will upgrade the existing functionality and add new functionality to the app.

## RUN THE APP

After cloning the repo, create `.env` file in the root of your directory. Copy the content of the `.env.example` file into the `.env` file that you created.

Next, configure your database setting in the `.env` file, by editing these lines according to your database specifications:
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=climatecall
DB_USERNAME=root
DB_PASSWORD=
```
Add your database connection, host, port, database name, your user name in the database software you use and the password associated with the username you entered.

> Ensure that you create a database with the name you assigned to `DB_DATABASE` if you don't have any.

Then run the following command in your `Ubuntu` terminal to get your database up an running:
```linux
php artisan migrate
```

You now bring the CSS into your code by running the following commands:

```bash
npm install
npm run dev
```

then in your `Ubuntu` terminal run this command:
```linux
php artisan serve
```

> Runnig the above command in `Bash` terminal will work provider it is setup properly.

After running the command click in the url displayed in your terminal by doing `ctrl` + `shift` + click; or you copy and paste the url in your browser.

## AUTHOR

- M'MAH ZOMBO

## TOOLS

- Laravel
- TailwindCSS
- Open Weather API
- Perenual API
- ..etc