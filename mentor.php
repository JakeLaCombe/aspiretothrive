<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link href="Styles/styles.css" rel="stylesheet"/>
  </head>
  <body>
  <nav><img src="Images/aspire.png" width="100" height="100"/></nav>
   <div id="body-wrapper">
    <section> 
      
          <?php
  $con=mysqli_connect("aspire.a.tylr.us","aspiredb","thrive","aspire_thrive_db");
  
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM users WHERE id = ".$_REQUEST[id]);

while($row = mysqli_fetch_array($result))
  {
    $mentorid = $row['mentorid'];
    echo "<div class='profile-block'>";
    echo "<a href='http://a.tylr.us/aspire/static/mentor.php?id=".$row['id']."'><img src='Images/".$row['image'];
  echo "' width='100' height='100' alt='Profile Image'/></a><div class='profile-information'><h1>";
  if($mentorid > 0){
    echo "Mentoree";
  }
  else{
    echo "Mentor";
  }
  echo "</h1><a href='http://a.tylr.us/aspire/static/mentor.php?id=".$row['id']."'><p>Name: ";
  echo $row['firstname'] . " " . $row['lastname'];
  echo "</p></a><p>Active Since: ";
  echo $row['since'];
  echo "</p>";
  echo "</div></div>";
  
  }

  if($mentorid > 0){
    $result = mysqli_query($con,"SELECT * FROM users WHERE id = ".$mentorid);

while($row = mysqli_fetch_array($result))
  {
    echo "<div class='profile-block'>";
    echo "<a href='http://a.tylr.us/aspire/static/mentor.php?id=".$row['id']."'><img src='Images/".$row['image'];
  echo "' width='100' height='100' alt='Profile Image'/></a><div class='profile-information'><h1>";
    echo "Mentor";
  echo "</h1><a href='http://a.tylr.us/aspire/static/mentor.php?id=".$row['id']."'><p>Name: ";
  echo $row['firstname'] . " " . $row['lastname'];
  echo "</p></a><p>Active Since: ";
  echo $row['since'];
  echo "</p>";
  echo "</div></div>";
  }
}

mysqli_close($con);
?>
        


        
       
      </section>
      <section>
        <div id="news">
          <h1>News</h1>
          <article>
            <h2 class="date">May 13, 2013</h2>
            <p>This is filler text for the website. Your updated news appears here.</p>
          </article>
          <div id="more-news"> More News</div>
        </div>
      </section>
      <section>
        <div id="wall">
          <h1>Wall</h1>

<?php
  $con=mysqli_connect("aspire.a.tylr.us","aspiredb","thrive","aspire_thrive_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM wallposts WHERE toid = ".$_REQUEST[id]." ORDER BY id DESC LIMIT 15");

while($row = mysqli_fetch_array($result))
  {
    $message = $row['message'];
    $fromid = $row['fromid'];
    $result = mysqli_query($con,"SELECT * FROM users WHERE id = ".$fromid);
    while($row = mysqli_fetch_array($result))
      {
        $fromimage = $row['image'];
        $fromname = $row['firstname']." ".$row['lastname'];
      }
    echo "<article>";
    echo "<a href='http://a.tylr.us/aspire/static/mentor.php?id=".$fromid."'><img src='Images/".$fromimage."' width='100' height='100'/></a>";
    echo "<div><a href='http://a.tylr.us/aspire/static/mentor.php?id=".$fromid."'><h2>".$fromname."</h2></a>";
    echo "<p>".$message."</p></div></article>";
            
  }

  echo "</div>";

mysqli_close($con);
?>

 

<?php
  $con=mysqli_connect("aspire.a.tylr.us","aspiredb","thrive","aspire_thrive_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM users WHERE id = ".$_REQUEST[id]);

while($row = mysqli_fetch_array($result))
  {
    $teamid = $row['teamid'];
    $id = $row['id'];
    $result = mysqli_query($con,"SELECT * FROM users WHERE teamid = ".$teamid." AND id != ".$id);
    echo "<div id='team-mates'><h1>Team Mates</h1>";
    while($row = mysqli_fetch_array($result))
    {
      echo "<article>";
      echo "<a href='http://a.tylr.us/aspire/static/mentor.php?id=".$row['id']."'><img src='Images/".$row['image']."' width='100' height='100'/></a>";
      echo "<a href='http://a.tylr.us/aspire/static/mentor.php?id=".$row['id']."'><span>".$row['firstname']." ".$row['lastname']."</span></a></article>";
    }
    echo "</div>";
}


mysqli_close($con);
?>

         

      </section>
     </div>
    </body>
  </html>