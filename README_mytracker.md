SESSION_DRIVER stores where the session data is stored.
In this case the session will be stored in the database.
There was an error when I first launch the site.
which stated that the session table did not exist in the db.
to fix that we will do a migration which creates the table in
our data base.

```
php artisan session:table
php artisan migrate
```

these two commands are what create the table for us.
a good way to search about these commands is to just grep session:table
inside Illuminate. session is a namespace (I asked chatgpt).

I noticed in some videos there are 2 commands for running the application.
```
php artisan server
composer run dev
```
composer run dev is defined in ```composer.json```
and runs multiple commands.
```
php artisan serve
php artisan queue:listen
php artisan pail
npm run dev
```
I think this tells us enough about which one should we use.

This going to be a portfolio website which showcases my work.

So let me get the home page done. Views are inside resources folder it uses
blade templates with file extension *.blade.php. My version came with tailwindcss
installed just check it vite.config.ts has tailwind in it or not to check.
