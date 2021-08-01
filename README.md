
## Laravel Read It Later

### Installation

#### Step 1:
Clone the directory to your local machine using the below git command. and change command promt directory to project directory.
```
git clone https://github.com/ai-tushar/laravel-read-it-later.git
```
#### Step 2:
open command prompt from inside the project directory (laravel-read-it-later). If you are using Windows operating system, please use WSL command line with Ubuntu 20 image linked.
The below steps are considering that your machine has a working docker installation.

#### Step 3:
After opening command prompt from inside the project directory, run the below command to install dependencies.
```
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/opt" -w /opt laravelsail/php80-composer:latest composer install --ignore-platform-reqs
```
#### Step 4:
execute the below command to make an alias for laravel `sail`. so we dont have to write `./vendor/bin/sail` every time
```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```
#### Step 5: Environment setup
In root directory copy `.env.example` file to `.env`. 
Open `.env` file. Update the database connection info in below 4 properties,
```
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=<DB NAME YOU WANT THIS PROJECT TO RUN ON>
DB_USERNAME=<DB USER NAME>
DB_PASSWORD=<DB PASSWORD>
```
`DB_PORT` is `3306` by default. You can change it to another free port. If you keep the default value, please make sure the port isnt being used by any other service.
`DB_HOST` should be `mysql`
`QUEUE_CONNECTION` is by default `sync`. All the Queue Jobs are synchronouse at this stage. Please change this value to `database`. So it will be like the following,
```
QUEUE_CONNECTION=database
```
#### Step 6: 
Run docker using laravel `sail` package with below command
```
sail up -d
```
Run below command to generate application key
```
sail artisan key:generate
```
#### Step 7:
Run below command to run migrations in order to create tables
```
sail artisan migrate
```
#### Step 8:
To listen to Queued jobs run the below command,
```
sail artisan queue:work
```
#### Step 9:
Browse `http:://localhost` in your browser

### Note for making api request
While making API request, please make sure you add the below 2 header in your request,
```
Content-Type: application/json
Accept: application/json
```

### Creating Pocket
Make POST request to `http://localhost/api/v1/pockets` with a JSON string in request body like `{"title": "Pocket Test 1"}`

### Creating Content in Pocket
Make POST request to `http://localhost/api/v1/pockets/{id}/contents` with a JSON string in request body like `{"url": "valid-url-only"}`

### View all Content in one Pocket
Make GET request to `http://localhost/api/v1/pockets/{id}/contents`

### Delete Stored Content
Make DELETE request to `http://localhost/api/v1/contents/{id}`

### Delete Stored Pocket
Make DELETE request to `http://localhost/api/v1/pockets/{id}`

### View all Contents by Pockets 
Browse `http://localhost/pockets` in your browser to view all contents by pockets

### View Scraped data
In `http://localhost/pockets` beside each content url there is a button to view parsed data. clicking on it will open a new page which will show the parsed data from this url. 


## Bonus Points
- After Saving a Content it will Trigger an Event. 
- A listener will execute when the event triggered. 
- Inside the event it will dispatch a Job
- Job will call WebCrawlerService class to parse data (h1/h2, img, excerpts) and store into DB

## Used the followings
- Eloquent
- Migration
- FormRequest
- ApiResource
- Blade
- Service Oriented Architecture (Where suitable)
- Repository Pattern
- Event/Listener
- Jobs
- Web Scrapping



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# laravel-read-it-later
