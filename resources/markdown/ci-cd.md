```
echo "$ENV" > .env
echo "$PRIVATE_KEY" > private_key && chmod 600 private_key
rsync -r --exclude 'node_modules' --exclude 'storage'  --exclude '.git/' --delete-after -e "ssh -o StrictHostKeyChecking=no -i private_key" . ${USER_NAME}@${HOSTNAME}:/var/www/nxgeninventors.com/quiz/

ssh -o StrictHostKeyChecking=no -i private_key ${USER_NAME}@${HOSTNAME} '
    cd /var/www/nxgeninventors.com/simba/ && 
    sudo chmod -R 777 storage && 
    php artisan storage:link
```