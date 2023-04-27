<h1>Task Manager</h1>

## About Task manager

Task manager is a project to List/Add/Update/Delete Tasks and projects. It allow also to link a task to a project

### Installation steps in a local environment

- Clone the repository : `git clone https://github.com/abderrahmanbelbachir/task-manager.git`
- You are already on the main branch
- run `composer install`
- run `npm install`
- run `php artisan migrate`
- run `php artisan serve`
- Open your browser and navigate to `localhost:8000`

## Deployment step to an EC2 AWS Instance

- Assuming you already have an EC2 AWS Instance setup and you already have git installed on it .
- Navigate to the root directory
- Clone the repository : `git clone https://github.com/abderrahmanbelbachir/task-manager.git`
- You are already on the main branch
- Run `composer install`
- Run `npm install`
- run `php artisan migrate`
- Open a browser and navigate either to the domain name mapped with your Instance or to the ip address of the instance


## License

This project is a test project, just for fun and also an interview test, so feel free to use it.
