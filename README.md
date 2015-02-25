Qatables

To allow for php to modify iptables this needs to be added to sudoers file (sudo visudo):

www-data  ALL=(ALL) NOPASSWD:/var/www/qatables/reload_iptables.sh
