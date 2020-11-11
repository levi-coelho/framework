# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.require_version ">= 1.5"
VAGRANTFILE_API_VERSION = "2"
ANSIBLE_VERBOSE = ""

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "bento/ubuntu-18.04"
  #config.hostmanager.enabled = false

  config.vm.provider :virtualbox do |v|
    v.memory = 2048
    v.cpus = 1
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    v.customize ["modifyvm", :id, "--ioapic", "on"]
  end

  config.vm.define "backend" do |backend|
      backend.vm.hostname = "backend"
      backend.vm.network :private_network, ip: "192.168.34.90"
      backend.vm.network "forwarded_port", guest: 80, host: 8080
      backend.vm.synced_folder ".", "/vagrant", disabled: true
      backend.vm.synced_folder "api", "/nfs-vagrant", type: "nfs"
      backend.vm.synced_folder "api", "/var/www/api", disabled: false
#      backend.vm.synced_folder ".", "/var/www/api/var/cache", disabled: true
      backend.vm.provision "shell", inline: "sudo apt-get update && 
                                               sudo apt-get -y install python2.7 python-simplejson
                                              "

      if Vagrant.has_plugin?("vagrant-bindfs") then
        config.bindfs.bind_folder "/nfs-vagrant", "/var/www/api", 'force-user' => 'www-data', 'force-group' => 'www-data'
      end
  end

  #config.vm.provision :hostmanager
end