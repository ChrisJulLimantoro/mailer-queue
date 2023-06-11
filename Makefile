# variables
ARTISAN = php artisan
COMPOSER = composer

# commands
run:
	$(ARTISAN) serve

migrate:
	$(ARTISAN) migrate

make:
	$(ARTISAN) make:controller $(name)Controller
	$(ARTISAN) make:model $(name)Model
	$(ARTISAN) make:migration create_$(name)_table