	<?php

	include("inc/functions.php");

	$teams = getTeams();

if(isset($_GET['teamId']))
{
	$teamId = $_GET['teamId'];
	$heroes = getHeroes($teamId);
	//myDump($heroes,1);
}
else
{
	$heroes = getHeroes();
	$teamId = "";
}

	if(isset($_GET['heroId']))
	{
		$heroId = $_GET['heroId'];
		$singlehero = getHero($heroId);
		//myDump($hero,1);
	}
	else {
		$singlehero = "";
	}

	if (isset($_POST['submit'])) 
	{
		
		$comment = $_POST['submit_comment'];

		$insertCommentQuery = "INSERT INTO rating (ratingId) VALUES (NULL";
		
	}
	?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="description" content="Positionering">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>CL Heroes</title>
</head>
<body>

<header id="header">
	<a href="index.php">
	<img id= "logo" src="images/UCL1.png" alt="champions league logo">
	<h1 id="titelName">🄷🄴🅁🄾🄴🅂</h1></a>
</Header>

<div id="main-container">

	<div id="main-left"> 
		<nav id="nav">
			<ul> 
			<li id="teams"> TEAMS </li>
			<?php 
				foreach($teams as $key => $team) 
				{
					?>
					<li><a id="teamNameCss" href="index.php?teamId=<?php echo $team['teamId']; ?>"><?php echo $team['teamName']; ?>
					<img id="teamImage" src="<?php echo $team['teamImage']; ?>" /></a>
					</li>
					<?php
				}
			?>
			</ul>
		</nav>
	</div>

	<div id="main-center"> 
		<ul> 
			<li id="teams"> Players </li>
			<?php 
			if ($teamId != NULL) {				
				foreach($heroes as $key => $hero) 
				{					
					?>
					<div class= "changeColor">
					<li><a href="index.php?heroId=<?php echo $hero['heroId']; ?>&teamId=<?php echo $teamId; ?>"><?php echo $hero['heroName']; ?>
					<img class="image" src="<?php echo $hero['heroImage']; ?>" />
					<button class="infoButton">More Info</button></a>
					</li>
					</div>
					<?php
				}
				}
				else {
					foreach($heroes as $key => $hero) 
				{					
					?>
					<div class= "changeColor">
					<li><a href="index.php?heroId=<?php echo $hero['heroId'];?>"><?php echo $hero['heroName']; ?><li>
					<img class="image" src="<?php echo $hero['heroImage']; ?>" /></li>
					<button class="infoButton">More Info</button></a>
					</div>
					<?php
				}
				}
			?>
			</ul>
	</div>

	<div id="main-right"> 
		<ul> 
			<li id="teams"> Player Info </li>
			<?php 
				if ($singlehero != NULL) {
					?>
					<h3 id="singleHeroName"><?php echo $singlehero['heroName']; ?></h3>
					<img class="imageInfo" src="<?php echo $singlehero['heroImage']; ?>" />
					<li id="heroInfo"><?php echo $singlehero['heroDescription']; ?><br/>
					<?php echo $singlehero['heroPower']; ?>

					<form action="index.php?heroId=<?php echo $hero['heroId']; ?>" method="post">
					<li id="message" > leave a review message: </li>
					<textarea cols="30" rows="10" name="submit_comment"></textarea>
					<input type="hidden" name="heroId" value="<?php echo $hero['heroId'];?>">
					<button id="submitMessage" type="submit" name="submit">Submit</button>
					</form>
					<?php
					}
					else {
						echo "<div id = 'playerChoose'>";
    					echo "<p>𝕔𝕙𝕠𝕠𝕤𝕖 𝕒 𝕡𝕝𝕒𝕪𝕖𝕣</p>";
						echo "</div>";
					}
			?>
			</ul>
		</div>
	</div>	
</body>
</html>