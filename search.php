<?php
if(isset($POST["submission"])){
    if(isset($GET["go"])){
        if(preg_match("^/[ a-zA-Z]+/",$POST["query"])){
            $searchQuery=$POST["query"];
            $servername="LONDON2012\London2012";
            $database=mssql_connect($servername,"frumto","201518");
            if(!$database){
                die("Error connecting to database");
            }
            $ourDatabase=mssql_select_db("[FrumShared].[dbo].[BlogEntries]",$database);
            $sql="SELECT BlogEntryTitle, BlogEntryText FROM [FrumShared].[dbo].[BlogEntries] WHERE BlogCategoryID=98 AND BlogEntryTitle LIKE '%".$searchQuery;
            $result=mssql_query($sql);
            while($row=mssql_fetch_array($result)){
                $blogEntryTitle=row["BlogEntryTitle"];
                $blogEntryText=row["BlogEntryText"];
                echo "<ul>\n";
                echo "<li>".$blogEntryTitle."</li>\n";
                echo "<li>".$blogEntryText."</li>\n";
                echo "</ul>";
            }
        }else{
            echo "<p>You need to enter a search query for this form to work</p>";
        }
    }
}else{
    echo "Error submitting data";
}
?>
