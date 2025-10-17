appName := melioraweb.test
PHP := php
CS_FIXER := vendor/bin/php-cs-fixer
LARASTAN := vendor/bin/phpstan

connect:
	@docker-compose exec $(appName) bash

tool-ide-helper:
	@echo '===== MAKE IDE HELPER CLASSES ====='
	@docker-compose exec $(appName) php artisan clear-compiled
	@docker-compose exec $(appName) php artisan ide-helper:generate
	@docker-compose exec $(appName) php artisan ide-helper:meta
	@docker-compose exec $(appName) php artisan ide-helper:models -M

# Default target
default: check

# 1. Run code style fixer
cs-fix:
	@echo "🔧 Running PHP-CS-Fixer..."
	@$(PHP) $(CS_FIXER) fix --config=.php-cs-fixer.dist.php --allow-risky=yes
	@echo "✅ Code style fixed!"

# 2. Run static analysis
analyse:
	@echo "🔍 Running Larastan (PHPStan)..."
	@$(PHP) $(LARASTAN) analyse --memory-limit=1G
	@echo "✅ Static analysis completed!"

# 3. Run both in correct order
check: cs-fix analyse
	@echo "🏁 All checks completed successfully!"

# 4. Just to clean cache (optional)
clean:
	@echo "🧹 Clearing tool caches..."
	@rm -rf .php-cs-fixer.cache
	@rm -rf storage/framework/cache/*
	@echo "✅ Caches cleared!"
