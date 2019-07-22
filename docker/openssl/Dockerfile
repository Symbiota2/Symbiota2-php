FROM debian:jessie-slim

RUN apt-get update \
    && apt-get install -y openssl \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

WORKDIR "/symbiota2"

COPY start.sh /
RUN chmod +x /start.sh
ENTRYPOINT ["/start.sh"]
