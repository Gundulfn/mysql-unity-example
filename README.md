# mysql-unity-example

These assets are used in an Unity3D + MySQL example project which saving players' username, password and score in a database. Folder "example_db" in 'Assets' has PHP files(APIs) for GET, POST commands, put this folder as where you need it. To use them with Unity, you can check 'Loggin.cs' script from 'Assets/Scripts/Logging' folder and edit URLs in this script.

In database, username is stored as original while password is stored as hashed with adding salting to it. Here is a screenshot from the database:

<img src="https://user-images.githubusercontent.com/22707968/213301120-f1efb767-8c0c-4435-8add-96f4ee031b0b.png">
