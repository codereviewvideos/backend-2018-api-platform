dev:
	@docker-compose down && \
		docker-compose up -d --remove-orphans

down:
	@docker-compose down
