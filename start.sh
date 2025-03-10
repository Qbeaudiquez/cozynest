set -e
if [ -z "$PORT" ]; then
  echo "ERROR: PORT environment variable is not set."
  exit 1
fi
envsubst '\$PORT' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf
cat /etc/nginx/nginx.conf
php-fpm &
nginx -g 'daemon off;'