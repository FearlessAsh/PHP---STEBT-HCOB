<form name="searchForm" id="searchForm" 
                        action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                        method = "POST">
                <center>
                Search: <input type="text" name="search"
                onFocus="this.style.background = '#ffffff';" 
                onBlur="this.style.background = '#bfbfbf';">
                <input type="submit" name="find" 
                value="submit" 
                onClick="Login(this.form);" 
                onMouseOver="this.style.color = '#404040';" 
                onMouseOut="this.style.color = '#000000';" 
                onFocus ="this.style.color = '#404040';" 
                onBlur="this.style.color = '#000000';">
                </center>
            </form>
<?php
$_SESSION['itemName'] = "";
$searchBar = "";

if (isset($_POST['find'])) { 
        require_once("classes/tableClass.php");
        if(isset($_POST['search'])){$search = $_POST['search'];}
        else{$search = "";}
        $searchBar = searchBar($search, $userType);

        if($searchBar != ""){
        $_SESSION['itemName'] = $searchBar;
        print("<script>window.location='itemSale.php';</script>");}
        } else{ $searchBar = ""; }
?>