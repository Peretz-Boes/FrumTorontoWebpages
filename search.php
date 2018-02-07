<?php
if(isset($POST["submit_button"])){
    if(isset($GET["go"])){
        if(preg_match("^/[ a-zA-Z]+/",$POST["search_query"])){
            $searchQuery=$POST["search_query"];
            $database=mysql_connect("servername","username","password") or die("Error connecting to database".mysql_error());
            $ourDatabase=mysql_select_db("FrumToronto");
            $sql="SELECT ID search_query FROM database WHERE search_query LIKE '%".$searchQuery;
            $result=mysql_query($sql);
            while($row=mysql_fetch_array($result)){
                $ID=row["ID"];
                $searchedText=row["search_query"];
                echo "<ul>\n";
                echo "<li>"."<a href=\"search.php?id=\">".$searchQuery."</a></li>\n";
                echo "</ul>";
            }
        }else{
            echo "<p>You need to enter a search query for this form to work</p>";
        }
    }
}
?>
