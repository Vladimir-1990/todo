# Todo project for SourceBreaker coding test done by Vladimir Szabo

## Installation

Set up a virtual host for the Lumen REST API

Run the following command withing the API directory

```bash
php composer update
```

Import the mysql file into a database called "todo"

Change the .env file inside the API directory to the correct MySQL connection details

Open the index.js file in the directory 'frontend' and change line 1 to point to your local api instance

## Usage

The REST API has the following endpoints

```bash
POST "/login" params:{email : $email, password : $password}
logs in a user with email/password combination

GET "/items"
gets a list of items for the logged in user

GET "/items/$id
gets an item from the ID

POST "/mark-done" params:{id : $id}
marks an item as done

POST "/create params:{content : $content}
creates a new item

DELETE "/delete/$id
deletes the item
```

