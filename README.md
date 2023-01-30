``
php artisan serve
``
curl --location --request POST '192.168.31.111:8000/api/merge' \
--header 'Accept: application/json' \
--form 'first=@"/C:/Users/User/Desktop/test/first_response.json"' \
--form 'second=@"/C:/Users/User/Desktop/test/second_response.json"'
