openssl genrsa -passout pass:1234567891011121314151617181920 -out /symbiota2/config/jwt/private.pem -aes256 4096

openssl rsa -passin pass:1234567891011121314151617181920 -in /symbiota2/config/jwt/private.pem -out /symbiota2/config/jwt/public.pem
