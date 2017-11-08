<?php
function movie_grid($movie_name, $image_link)
{
	echo  "<div class = \"row\">";

	echo "<div class=\"col-md-4\">".
          "</div>";
	echo "<div class =\"col-md-3\"  style = \"border:2px groove purple ; border-radius: 5px\">".
	"<img src=\"".$image_link."\" id = \"img\" style =\"width: 100px; height: 100px;    border: 3px solid #ADD8E6; border-radius: 5px;\">".
	//"<a href = \"blogdetails.php?page=".$movie_name.      "\"> see full blog</a>".
	"<a href=\"MovieFromSearch.php?data=".$movie_name."\">".$movie_name."</a>".	

	"</div>".
	"</div>";

}
function movie_grid_home($movie_name, $image_link)
{
	echo  "<div class = \"row\">";

	echo "<div class=\"col-md-3\">".
          "</div>";
	echo "<div class =\"col-md-3\"  style = \"border:2px groove purple ; border-radius: 5px\">".
	"<img src=\"".$image_link."\" id = \"img\" style =\"width: 100px; height: 100px;    border: 3px solid #ADD8E6; border-radius: 5px;\">".
	//"<a href = \"blogdetails.php?page=".$movie_name.      "\"> see full blog</a>".
	"<a href=\"MovieFromSearch.php?data=".$movie_name."\">".$movie_name."</a>".	

	"</div>".
	"</div>";

}
function movie_suggestion($movie_name, $image_link)
{

	echo "<div class=\"col-md-1\">".
          "</div>";
	echo "<div class =\"col-md-3\"  style = \"border:2px groove purple ; border-radius: 5px\">".
	"<img src=\"".$image_link."\" id = \"img\" style =\"width: 100px; height: 100px;    border: 3px solid #ADD8E6; border-radius: 5px;\">".
	//"<a href = \"blogdetails.php?page=".$movie_name.      "\"> see full blog</a>".
	"<a href=\"MovieFromSearch.php?data=".$movie_name."\">".$movie_name."</a>".	

	"</div>";

}	
 function movie_grid_delete($movie_name)
{
	echo  "<div class = \"row\">";

	echo "<div class=\"col-md-4\">".
          "</div>";
	echo "<div class =\"col-md-3\"  style = \"border:2px groove purple ; border-radius: 5px\">".
	//"<img src=\"".$image_link."\" id = \"img\" style =\"width: 100px; height: 100px;    border: 3px solid #ADD8E6; border-radius: 5px;\">".
	//"<a href = \"blogdetails.php?page=".$movie_name.      "\"> see full blog</a>".
	//"<a href=\"MovieFromSearch.php?data=".$movie_name."\">".$movie_name."</a>".
	"<h3>$movie_name</h3>".
	"<a href=\"deleteDone.php?data=".$movie_name."\">"."Delete it"."</a>".
	//"<input type = 'submit' name ='movieDelete' value = 'Delete it'>".	

	"</div>".
	"</div>";

}
//movie_grid("fight club","ball");

?>