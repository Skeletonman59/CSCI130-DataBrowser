# CSCI130-DataBrowser
Repo for Data Browser project
## Table of Contents
- [How to Load](#how-to-load)
- [Features](#features)
- [Navigation Bar](#navigation-bar)
- [Modify Database Table](#modifying-entries)
- [Modify Table Structure](#modifying-the-table)

# How to load: 
1. git clone https://github.com/Skeletonman59/178-Project into XAMPP\htdocs\ in cmd
2. Open phpMyAdmin and make a user account with values username: username, password: password, Host name: local. Alternatively, you can change usernameCHANGE.php values to use an already created user. Make sure the user account has all global privileges checked. 
3. Run data.html.
4. Select "Import" on the webpage. (This loads in data from a json file which has the database table stored)

# Features: 
## Navigation Bar
![image](https://github.com/user-attachments/assets/f926d1fb-8a02-4ba3-bcae-a5255c4409fa)

This is the Navigation Bar. From left to right, they are: "first element in table, previous, next, and final element in table.

Cool tip: If you know where you want to go, you can also click on the first number shown in the Navigation Bar and change the
value to whatever entry you want to go to.

## Modifying entries
![image](https://github.com/user-attachments/assets/ce769a27-6ca5-4ed6-8dfb-5f81ab5efa2b)

This is bar modifies the database table. You can Insert your own element, Delete an element, and modify an existing entry. Changes are not permanent; you must Save this change afterwards (See below). 

## Modifying the table
![image](https://github.com/user-attachments/assets/c667c716-2f14-4d30-ab58-415119a141b7)

This area modifies the entire structure of the table. Instead of previewing entries based on an arbitrary index, you can choose to sift through the data Alphabetically. Click the button again (Now titled "Sort Numerically") to go back to index sorting.

The Import button takes a json in the same folder, titled "table.json", and adds all the elements within to be readable within the data browser. This also puts all your data inside the database table.

The Export button is your "Save All Changes" button. This modifies the same "table.json" file, and saves any changes you made prior, like insertions, deletions, or modifications. 


