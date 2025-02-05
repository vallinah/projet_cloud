# Lancer et builder le projet:
docker-compose up --build

# Accéder au conteneur PostgreSQL:
docker exec -it postgres_container psql -U cloud --dbname=projet_cloud_p16
