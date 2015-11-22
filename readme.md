## Notnot : Authorization code grant oauth2 lumen experiment

Warning, this is just experimental repository and far far way from perfect.

This is an experiment of using oauth2 authorization code grant using [https://github.com/dingo/api](https://github.com/dingo/api) and [https://github.com/lucadegasperi/oauth2-server-laravel](https://github.com/lucadegasperi/oauth2-server-laravel).
This is just simple notes creation.

## Walktrhough

1. Clone this repository
2. Uncomment // $app->withFacades(); (you can comment back this row after do point 3)
3. Run migration and seed (you can update initial data with your preference)
4. Token routes
  1. oauth/authorization (GET) -> get user authorization interface
  2. oauth/authorization (POST) -> retrieve user approval
  3. oauth/access-token (POST)-> exchange authorization code with authorization token
5. Api endpoints
  1. api/note (GET) -> List all notes Retrieve all notes associated with user (resource owner)
  2. api/note/{id} (GET)   -> Retrieve note by id
  3. api/note (POST) -> Create new note
  4. api/note/{id} (PUT/PATCH) -> Update note by given id
  5. api/note/{id} (DELETE) -> Destroy note

## Todo
1. Create some test