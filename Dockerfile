FROM ubuntu 
MAINTAINER arihant25jain@gmail.com

RUN export DEBIAN_FRONTEND=noninteractive; \
    export DEBCONF_NONINTERACTIVE_SEEN=true; \
    echo 'tzdata tzdata/Areas select Etc' | debconf-set-selections; \
    echo 'tzdata tzdata/Zones/Etc select UTC' | debconf-set-selections; \
    apt-get update -qqy \
 && apt-get install -qqy --no-install-recommends \
        tzdata \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*; \ 
 	apt-get update && apt-get install -y git; \
 	apt-get install -y php; \
 	apt-get install -y curl; \
 	apt-get install -y nodejs; \
 	apt-get install -y npm; \
 	apt-get install -y php-mbstring; \
	apt-get install -y php-xml; \
	apt-get upgrade; \
	apt-get install; \
	apt install -y zip unzip php-zip; \
 	curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer; \
 	git clone https://github.com/Symbiota2/Symbiota2.git portal-name; \
 	cd portal-name; \ 
    composer install; \
    npm install

