# WP preset

Instead of pulling an outdated plugins and wp version from github, please install [WP-CLI](http://wp-cli.org/) and now with a simple aliase you can download the latest wordpress version with all the plugins you need and install it with set parameters with a single command.

Make sure that WP-CLI is insatlled

With an assumption that all your wordpress installs are stored in `/Documents/mamp/`, MAMP is pointed to the same directory and the databases are called `wp_` plus the same name as the folder for the wordpress install. With that in mind we can add following to the `.bashrc` file.


```bash
newwp() { cd ~/Documents/mamp/; # make sure that we are in our wordpress' folder
          mkdir $1; # create a new directory for the fresh install
          cd $1; # cd into the directory
          wp core download; # download wordpress core files
          wp core config --dbname=wp-$1 --dbuser=root --dbpass=root --dbhost=localhost --dbprefix=wp_; # edit wp-config.php to set database name, username, password, host and database prefix
          wp db create wp_$1; # create a new database
          wp core install --url=http://localhost  --title="$1" --admin_user=super --admin_password=super --admin_email="admin@example.com"; # perform the instalation routine, your admin credentials are super:super
          wp theme delete twentyfourteen;
          wp plugin delete akismet;
          wp plugin install updraftplus woocommerce what-the-file wp-html-compression; # install plugins
        }
alias newwp='newwp '
```

Now with a simple `newwp amazing` we will have a fresh wordpress install, with already installed plugins and all with a single command. 