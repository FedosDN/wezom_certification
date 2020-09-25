##Bootstrap
> Run one by one commands:
* `composer update`
* `php artisan migrate`
* `php artisan import:makes`
* `php artisan import:models`
* `php artisan queue:work --queue=default,make_queue,model_queue,report_stolen_queue`

##Queues
* make_queue
* model_queue
* report_stolen_queue
