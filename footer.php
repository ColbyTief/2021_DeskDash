<footer class="footer">

<ul>
  <a href="index.php"><img src="images/homeImage.png" id="footerHome"></a>
  <a href="contact.php"><img src="images/emailImage.png" id="footerEmail"></a>
  <a href="dasherz.php"><img src="images/dasherzFooter.png" id="footerDash"></a>
</ul>

<small>&copy; 2021 Quad Pod Development. All rights reserved.</small>
</footer>

<style type="text/css">
.footer {
  background: #FF7000;
  font-family: sans-serif;
  padding: 30px;
  height: 52;
  flex-direction: column-reverse;
}

.footer > ul > a {
  text-decoration: none;
  color: black;
  border-radius: 30px;
  height: 30px;
}

.footer > ul > a > img {
  height: 40px;
  width: auto;
  padding-left: 10px;
}


.footer ul {
  display: block;
  margin-left: auto;
  font-size: 1.5rem;
  margin-bottom: auto;
  float: right;
}

.footer > small {
  float: left;
  padding-top: 2%;
}

/* smartphone */

@media screen and (max-width: 37.5em) {

  .footer {
    height: 90px;
    padding: 3%;
  }

  .footer > ul {
    display: block;
    float: left;
    padding-bottom: 3%;
    padding-left: 7%;
  }

  .footer > ul > a > img {
    height: 50px;
    width: auto;
    padding-left: 30px;
    padding-bottom: 4%;
  }

  .footer > small {
    float: right;
    padding-right: 10%;
    margin-top: -5%; 
  }

}

</style>