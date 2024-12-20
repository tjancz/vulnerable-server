#!/bin/bash

# Aktualizacja listy pakietów
sudo apt-get update

# Aktualizacja systemu
sudo apt-get upgrade -y

# Instalacja niezbędnych narzędzi
sudo apt-get install -y apt-transport-https ca-certificates curl software-properties-common

# Dodanie klucza GPG dla oficjalnego repozytorium Docker
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

# Dodanie repozytorium Docker do APT sources
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"

# Aktualizacja listy pakietów po dodaniu nowego repozytorium
sudo apt-get update

# Instalacja Docker
sudo apt-get install -y docker-ce docker-ce-cli containerd.io

# KROKI POST-INSTALL DOCKERA

# 1. Dodanie użytkownika do grupy docker
sudo usermod -aG docker $USER

# 2. Konfiguracja Dockera, aby uruchamiał się przy starcie systemu
sudo systemctl enable docker

# 3. Uruchomienie serwisu Docker
sudo systemctl start docker

# Weryfikacja instalacji przez uruchomienie obrazu hello-world
sudo docker run hello-worlddocker https

# Instalacja Docker Compose
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# Instalacja Git
sudo apt-get install -y git

# Instalacja curl (jeśli jeszcze nie jest zainstalowany)
sudo apt-get install -y curl

# Instalacja HTTPie
sudo apt-get install -y httpie

echo "Instalacja zakończona!"
