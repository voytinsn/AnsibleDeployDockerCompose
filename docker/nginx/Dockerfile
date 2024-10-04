FROM nginx:alpine
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/example_app.conf /etc/nginx/sites-enabled/
COPY app/ /var/www/example_app/