<?php

function connectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "cl-heroes";
    $connection = new mysqli ($servername, $username, $password, $dbname) or die ($connection->error);

    return $connection;
}

function getTeams($teamId = false)
{
    $con = connectDB();

    // define empty array to store teams
    $teams = array(); // $teams = []

    // dfine SQL statement
    $getTeamsSQL = "
    SELECT * FROM `team`
    ";

    if($teamId)
    {
        $getTeamsSQL .= " WHERE `teamId` = " . $teamId;
    }
    $getTeamsSQL .= " ORDER BY `teamName` ASC";

    // run query

    $results = mysqli_query ($con,$getTeamsSQL);

    // store fetched results in teams array
    while ($row = mysqli_fetch_assoc($results))
    {
        $teams[] = $row;
    }

    return $teams;
}

function getHeroes($teamId = false)
{
    $con = connectDB();

    // define empty array to store teams
    $heroes = array(); // $teams = []

    // dfine SQL statement
    $getHeroesSQL = "
    SELECT * FROM `hero`
    ";

    if($teamId)
    {
        $getHeroesSQL .= " WHERE `teamId` = " . $teamId;
    }
    $getHeroesSQL .= " ORDER BY `heroName` ASC";

    // run query

    $results = mysqli_query ($con,$getHeroesSQL);

    // store fetched results in heroes array
    while ($row = mysqli_fetch_assoc($results))
    {
        $heroes[] = $row;
    }

    return $heroes;
}


function getHero($heroId)
{

    $con = connectDB();

    // define empty array to store teams
    $hero = array(); // $teams = []

    // dfine SQL statement
    $getHeroSQL = "
    SELECT * FROM `hero`
    ";

    if($heroId)
    {
        $getHeroSQL .= " WHERE `heroId` = " . $heroId;
    }
    $getHeroSQL .= " ORDER BY `heroName` ASC";

    //myDump($getHeroSQL, 1);

    // run query

    $results = mysqli_query ($con,$getHeroSQL);

    // store fetched results in heroes array
    while ($row = mysqli_fetch_assoc($results))
    {
        $hero = $row;
    }

    return $hero;
}

function myDump($var, $exit = false)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";

    if($exit)
    {
        die("end of dump!");
    }
}


?>