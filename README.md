# Yii2 Starter Kit

# composer.phar install
1 ` php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" `

2 ` php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" `

3 ` php composer-setup.php `

4 ` php -r "unlink('composer-setup.php');" `

5 ` php composer.phar install ` || ` php composer.phar install --ignore-platform-reqs`

# project run

6 ` php init `

7  ` php yii migrate`

8 ` php yii migrate --migrationPath=@yii/i18n/migrations/ `

9 ` php composer.phar require mdmsoft/yii2-admin "~2.0" `

10 ` php yii migrate --migrationPath=@yii/rbac/migrations/ `

