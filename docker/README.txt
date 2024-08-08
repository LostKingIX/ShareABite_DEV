# Group 1 - Share A Bite

## Running the Project with Docker

### This docker file enables the user to clone our repo from GitHub's most recent image and locally saves the project to allow running of the web app.

1. Clone the repository:
   ```sh
   git clone https://github.com/yourusername/your-repo.git
   cd your-repo

2. Build and start docker containers

docker-compose up --build

3. Accessing the application

Open the  web browser and go to http://localhost:8080.


By following these steps and using the provided files, you can create a Docker setup that clones your GitHub repository and sets up the local PHP application environment. This makes it easy for others to run your project locally with minimal setup.

Please check docker logs for any error codes, below is a small tutorial to help find those:

Basic Command
To view logs from a specific container, you need the container ID or name. The basic syntax is:
sh
Copy code
docker logs <container_id_or_name>

Example Usage
List Running Containers: First, list your running containers to get the container ID or name.
sh
Copy code
docker ps
This will output a list of running containers. Look for your container in the list and note the CONTAINER ID or NAMES value.

View Logs: Use the docker logs command with the container ID or name.
sh
Copy code
docker logs <container_id_or_name>

For example, if a container ID is abc123:
sh
Copy code
docker logs abc123