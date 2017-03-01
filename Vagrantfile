# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.hostname = "udemy.symfony3"

  config.vm.network "forwarded_port", guest: 8000, host: 8000
  config.vm.network "forwarded_port", guest: 8080, host: 8080

  config.vm.network "private_network", ip: "192.168.33.10"
  # config.vm.network "public_network"

  config.ssh.forward_agent = true
  config.vm.synced_folder "./", "/home/vagrant/autotrader"

  # config.vm.provider "virtualbox" do |vb|
  #   # Don't boot with headless mode
  #   vb.gui = true
  #
  #   # Use VBoxManage to customize the VM. For example to change memory:
  #   vb.customize ["modifyvm", :id, "--memory", "1024"]
  # end

  #config.vm.provision "file", source: "001-talented.conf", destination: "/tmp/001-talented.conf"
  #config.vm.provision "file", source: "supervisor/mo.conf", destination: "/tmp/mo.conf"
  #config.vm.provision "file", source: "populate_db", destination: "/tmp/populate_db"

  config.vm.provision "shell", path: "./provisioner"
  config.vm.provision "shell", inline: "php /home/vagrant/autotrader/bin/console server:start 0.0.0.0:8000", run: "always"

end
