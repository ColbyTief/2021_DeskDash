<a href="#login" id="login">Login</a>
<img src="images/cart.png" id="shoppingCart">
<header>
    <a href="index.php"><img src="images/indexlogo.png" id="menu_img"></a>
    <div class="menu">
        <ul>
            <li><a href="order.php" class="button">Order</a></li>
            <li><a href="about.php" class="button">About</a></li>
            <li><a href="dasherz.php" class="button">Dasherz</a></li>
            <li><a href="#contact" class="button">Contact</a></li>
        </ul>
    </div>
</header>

<style type="text/css">
    * {
        margin: 0px;
        padding: 0px;
    }

    html {
        background: url('../images/wallpaper.png') repeat;
        padding-right: 70px;
        padding-left: 70px;
        /*
  padding-bottom: 40px;
  padding-top: 30px;
  */
    }

    #content {
        min-height: 667px;
        background-color: white;
    }

    #menu_img {
        width: auto;
        height: 90px;
        padding: 7px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        /*  filter: invert(100%);*/
    }

    #menu_img:hover {
        cursor: pointer;
    }

    header {
        background: #F97432;
        height: 150px;
        padding: 20px;
    }

    #shoppingCart {
        position: relative;
        height: 35px;
        width: auto;
        float: right;
        padding: 2px;
        padding-left: 15px;
        padding-right: 10px;
    }

    #shoppingCart:hover {
        border-bottom: 5px solid orange;
        border-radius: 25px;
        cursor: pointer;
        opacity: 1;
    }

    #login {
        height: auto;
        width: auto;
        float: right;
        padding: 13px 15px 6px 15px;
        text-align: center;
        text-decoration: none;
        margin: 4px 2px;
        color: white;
        text-transform: uppercase;
        font-size: 13px;
        font-weight: bold;
        font-family: 'Lato';
    }

    #login:hover {
        border-bottom: 5px solid orange;
        border-radius: 20px;
    }

    /*
#header-img {
width: 100%;
height: 800px;
background: url('../images/deskIcon.png');
background-size: cover;
}
*/


    .menu {
        position: relative;
        width: 600px;
        min-width: 300px;
        margin: 0 auto;
    }

    .menu ul {
        list-style: none;
        margin: 10px;
        padding: 0;
    }

    .menu li {
        display: inline-block;
        padding: 0 15px;
    }

    .menu a {
        text-decoration: none;
        color: white;
        text-transform: uppercase;
        font-size: 17px;
        font-weight: bold;
        font-family: 'Lato';
    }

    .menu a:hover {
        /*  background: orange;*/
        border-radius: 20px;
        font-size: 16px;
        /*  text-decoration: underline;*/
        border-bottom: 6px solid orange;
    }

    h3 {
        position: relative;
        top: 15px;
        text-align: center;
        font-size: 30px;
        font-family: 'lato';
        text-shadow: -2px 2px #d8652c;

    }

    .button {
        border: none;
        /*  background: #362417;*/
        padding: 10px;
        text-align: center;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 12px;
    }
</style>