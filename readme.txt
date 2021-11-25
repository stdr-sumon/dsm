
*****How to install Digital School Management (DSM)******
This project is a web application that aids in the digital administration of a school. There are three different roles here, and
users can view or alter information based on their role. Users of the system have to initiate use of the system by proving their
credentials and then they will be redirected to their desire panel. 

----------------------
Prerequisites:
The following environment is required in order to run the project:
- Xampp (version 3.2.4 or higher)
- MySql
- NPM (version 6.14.5 or higher)
- Any updated web browser. ( Recommended: Firefox or Chrome )

----------------------
How to Run:
- Setup the environment properly.
- Unzip dsm.zip file
- Move the folder named ‘dsm’ directory to the ‘htdocs’ folder. ( C:\xampp\htdocs )
- Run the xampp, strat Apache server and MySQL
- Create a database in phpmyadmin named 'dwt'
- Select the database named ‘dwt’ and click import.
- Select 'choose file' and Browse ‘dwt.sql’ file from the Project folder and hit 'Go'.
- Go to new tab of the browser.
- Open dsm-api folder and run command line interface (CLI)
- run 'npm run dev' command on CLI
- Hit http://localhost/dsm in the address bar.
- To enter into the Admin menu, Username : 'admin' Password: '123'
- To enter into the Teacher menu, Username : 'rahim' Password: '123'
- To enter into the Student menu, Username : 'pranto' Password: '123'
