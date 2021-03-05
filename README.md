# pidev
Requirements:
Install git bash in the link bellow:

https://git-scm.com/downloads

Install wamp64 in the link bellow:

PHP 7.2 MYSQL 8.0

https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.2.0_x64.exe/download

To set up php as env variable do the following steps (windows 10) :

Navigate to this pc.
- Click left proprities.
- Advanced system (last one on left).
- Envirement variable -> in the first selectbox select Path.
- Press new then add this in an empty field C:\wamp64\bin\php\php7.2.25.
To test it you should be able to run command php in the cmd.

Setups:
Clone the project from github by running:

https://github.com/raoudhazid/pidev.git

Check your project files if they are all present then navigation to project pidev

- Create a folder named vendor.

- Create a folder named var.

- under var create folder cache

- under var also create folder log

- under log create a file named dev.log

If you're using PhpStrom setup composer and symfony in the command line tools settings by following these steps

- Go to file -> settings,

- Search for command line tools,

- Press on the plus button on the right,

- Select composer and scope project -> define your path to composer.phar inside your project folder then save.

- Select symfony and scope project -> define your path to bin/console inside your project folder then save.

- To run a command in the global menu file | edit | ... select Tools then type Run command ..

- Run the command composer to install all project dependencies:

c install.

c require --dev symfony/web-server-bundle.

Database:
in order to link the project to database :

Create a database in your phpmyAdmin interface named 'pidev'
Create a file named .env.local under the project root folder near .env and insert the following:
DATABASE_URL=mysql://root@127.0.0.1:3306/pidev

if your local database username is root and you have no password this should work.

run in the cmd terminal
- php bin/console doctrine make:entity  : to create entity 
- php bin/console doctrine make:migration 
- php bin/console doctrine:migrations:migrate
=> you'll be able to see ur table u create   in your database if the command is successfully executed.

to run the server

php bin/console server:run

Follow these steps to commit to Github

1) git init

2) git add .

3) git commit -m "ur message "

4) git pull origin master( besh yjiblk kol update mi project kima min aaned sahbek )

5) git push origin master

