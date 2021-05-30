FROM nginx:1.19.4-alpine
WORKDIR /srv/

# Copy the public directory
#COPY www /srv/www

# Copy the nginx config file
COPY .docker/nginx/default.conf /etc/nginx/templates/default.conf.template