
# Activate SonarQube

```bash
docker run -d --name sonarqube-db \
  -e POSTGRES_USER=sonar \
  -e POSTGRES_PASSWORD=sonar \
  -e POSTGRES_DB=sonarqube \
  postgres:alpine
```

```bash
docker run -d --name sonarqube -p 9000:9000 --link sonarqube-db:db \
  -e SONAR_JDBC_URL=jdbc:postgresql://db:5432/sonarqube \
  -e SONAR_JDBC_USERNAME=sonar \
  -e SONAR_JDBC_PASSWORD=sonar \
  sonarqube
```

# Run the Test (you shoulb be in the racine)

```bash
sonarqube/bin/sonar-scanner \
  -Dsonar.projectKey=test \
  -Dsonar.sources=. \
  -Dsonar.host.url=http://localhost:9000 \
  -Dsonar.token=sqp_bac9de69170a6f90dc12b917025d11c822332d1d
```
