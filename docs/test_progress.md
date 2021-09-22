# Test Progress

Replace this doc with whatever documentation you feel necessary to explain your thought process and decisions made.

## Decisions...
 1. I have created a service for each module Topic, Sections,Message and User. Each service handle the logic for the syncing of  data from external db to main database.
 The Services Accept array as params to handle the api request or by DB transfer.

2.  I created A method which will run background to fetch the data from the external database

3. I also want to change the existing controllers of the Topic, Sections,Message and User to use the services that I created to avoid duplicate of code like Create and update. But as the test imply I only make a module that will handle  all of the data from external database to main database so i didn't touch them :D
## Known Limitations...
1. I think it will have a problem regarding the in and out of data. It will make the SQL  consume more resources when too manny user are syncing.
2. The data is not real time  because of the cron job 
## Future Improvements...
1. For the future development I think I will use a cache to handle the data to lessen the bottle neck in the query of the database to avoid transaction locked.

2. To make it a real time data maybe we can use hooks coming from the external api
3. we can make the insert of data by batch so we can minimize the  connection to our database.
4. we can make a Que job for it to handle large amount of data syncing.