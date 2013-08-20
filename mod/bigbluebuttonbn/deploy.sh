clear
sudo rm -rfv /var/www/default/htdocs/moodle22/mod/bigbluebuttonbn/*
sudo cp -rv . /var/www/default/htdocs/moodle22/mod/bigbluebuttonbn/
sudo rm -rfv . /var/www/default/htdocs/moodle22/mod/bigbluebuttonbn/.git
sudo chown -R www-data.www-data /var/www/default/htdocs/moodle22/mod/*
sudo rm -rfv /var/www/default/htdocs/moodle23/mod/bigbluebuttonbn/*
sudo cp -rv . /var/www/default/htdocs/moodle23/mod/bigbluebuttonbn/
sudo rm -rfv . /var/www/default/htdocs/moodle23/mod/bigbluebuttonbn/.git
sudo chown -R www-data.www-data /var/www/default/htdocs/moodle23/mod/*
sudo rm -rfv /var/www/default/htdocs/moodle24/mod/bigbluebuttonbn/*
sudo cp -rv . /var/www/default/htdocs/moodle24/mod/bigbluebuttonbn/
sudo rm -rfv . /var/www/default/htdocs/moodle24/mod/bigbluebuttonbn/.git
sudo chown -R www-data.www-data /var/www/default/htdocs/moodle24/mod/*
