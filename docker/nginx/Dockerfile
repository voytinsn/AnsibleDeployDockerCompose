FROM nginx:alpine
COPY docker/nginx/default.conf /etc/nginx/conf.d/
COPY docker/nginx/example_app.conf /etc/nginx/sites-enabled/
COPY app/ /var/www/example_app/