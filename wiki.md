# Coding guidelines

# phpMyAdmin

## What is phpMyAdmin

> Il s'agit de l'une des plus célèbres interfaces pour gérer une base de données MySQL sur un serveur PHP...
Cette interface pratique permet d'exécuter, très facilement et sans grandes connaissances en bases de données, des requêtes comme les créations de table de données, insertions, mises à jour, suppressions et modifications de structure de la base de données, ainsi que l'attribution et la révocation de droits et l'import/export.
*wikipédia [https://fr.wikipedia.org/wiki/PhpMyAdmin](https://fr.wikipedia.org/wiki/PhpMyAdmin)*

## Where is my database? - Host Gator

[https://gator3214.hostgator.com:2083](https://gator3214.hostgator.com:2083/)<br/>
**username** inm5001<br/>
**password** ecrivez moi si vous voulez le mot de passe

click on **phpMyAdmin** under **Databases**

![](https://static.notion-static.com/4343a042-3ddd-46e9-b1ea-799b395a3704/Screenshot_2018-03-08_17.23.14.png)

On the left side, you will find the list of the Databases

![](https://static.notion-static.com/2a510415-6223-4bb1-a765-f53a7b3bdaf2/Screenshot_2018-03-08_17.24.51.png)

Each database contains tables

![](https://static.notion-static.com/8cd4b2f7-0f45-4e38-b6af-b2a071b8f035/Screenshot_2018-03-08_17.26.11.png)

## How to connect to Database using PHP

    $db = mysqli_connect("gator3214.hostgator.com", "inm5001", "cours5001") or die(mysql_error());
    		mysqli_select_db($db, "inm5001_users") or die(mysql_error());

**[gator3214.hostgator.com](http://gator3214.hostgator.com)** host name<br/>
**inm5001** username<br/>
**cours5001** 

rd<br/>
**inm5001_users** database name

# Git - Step by Step

## 1. Initilize a git repo

    maya$ cd
    maya$ cd Documents/INM_projet
    maya$ git init
    Initialized empty Git repository in /Users/maya/Documents/INM_projet/.git/  

## 2. Pull from existing repo

    maya$ git pull [https://github.com/mayanohra/INM5001](https://github.com/mayanohra/INM5001)
    remote: Counting objects: 70, done.
    remote: Total 70 (delta 0), reused 0 (delta 0), pack-reused 70
    Unpacking objects: 100% (70/70), done.
    From https://github.com/mayanohra/INM5001
     * branch            HEAD       -> FETCH_HEAD

## 3. Push changes

    maya$ git add index.php
    maya$ git commit -m "Texte du commit"
    maya$ git push origin master
    
#MySQL

## Connect to DB

	$db = mysqli_connect("gator3214.hostgator.com", "inm5001", "cours5001") or die(mysql_error());
	mysqli_select_db($db, "inm5001_users") or die(mysql_error());

## Fetch data from DB

	$query = mysqli_query($db, "SELECT * FROM annonces WHERE service='chauffeur'");
	
## Loop over result

	while($data = mysqli_fetch_array($query)){
			echo $data['idUser'];
			echo $data['service'];
		}

### Exemple

	$db = mysqli_connect("gator3214.hostgator.com", "inm5001", "cours5001") or die(mysql_error());
		mysqli_select_db($db, "inm5001_users") or die(mysql_error());

	$query = mysqli_query($db, "SELECT * FROM annonces WHERE Service='$keyword'");

	while($data = mysqli_fetch_array($query)){
		echo $data['idUser'];
		echo $data['service'];
	}
