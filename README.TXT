BRIEF INSTRUCTIONS

Database Setup
SQL can be found in the db folder.

Create user:
db=polls
user=pollsuser
pass=pollspass

or Create a user using the following :

# Privileges for `pollsuser`@`localhost`
GRANT USAGE ON *.* TO 'pollsuser'@'localhost' IDENTIFIED BY PASSWORD '*62680EE5A16BE275B066CE14E58AA218C04026DB';
GRANT ALL PRIVILEGES ON `polls`.* TO 'pollsuser'@'localhost';

Run the system from home.php