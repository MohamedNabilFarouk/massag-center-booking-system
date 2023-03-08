#!/bin/bash

#docker-compose up -d db && docker-compose up -d --build web 

docker-compose exec web bash /app/build/start.sh
