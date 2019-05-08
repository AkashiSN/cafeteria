# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.network "forwarded_port", guest: 8000, host: 8000, host_ip: "127.0.0.1"
  config.vm.network "forwarded_port", guest: 5432, host: 5432, host_ip: "127.0.0.1"

  config.vm.synced_folder "./", "/cafeteria"

  config.vm.provision "shell", inline: <<-SHELL
    sed -i'~' -E "s@http://archive.ubuntu.com/ubuntu@http://jp.archive.ubuntu.com/ubuntu@g" /etc/apt/sources.list
    apt update && apt upgrade -y
    apt install -y unzip nodejs npm apache2 postgresql php php-mbstring php-dom php-zip
    npm cache clean
    npm install -g n
    n stable
    npm update -g npm
    npm install -g yarn
    curl -sS https://getcomposer.org/installer | php
    mv composer.phar /usr/bin/composer
    sudo -u postgres psql -c "ALTER USER postgres PASSWORD 'password';"
    echo 'host    all     all             0.0.0.0/0               password' >> /etc/postgresql/9.5/main/pg_hba.conf
    sed -i -e "s/#listen_addresses = 'localhost'/listen_addresses = '*'/g" /etc/postgresql/9.5/main/postgresql.conf
    service postgresql restart
  SHELL
end
