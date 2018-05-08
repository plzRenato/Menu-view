<?php
    echo '<?xml version="1.0" encoding="UTF-8"?>'
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" /> <!--used characters, corresponding to the standard "UTF-8"-->
 <meta http-equiv="Content-Script-Type" content="text/javascript" /> <!--for the SCRIPT-->
 <meta http-equiv="content-language" content="Italian" /> <!-- indicates to the search engine that the site is written in Italian -->
 <meta name="description" content="le vie standard nella mappa della zona di Padova" /> <!--short description for the search engine (10 words)-->
 <meta name="keywords" content="vie, mappa, zona, indirizzo, Padova" /> <!-- the 5 keywords, for the search engine (no google) -->
 <title>Form LOGIN</title> <!-- the most important content for google, for ranking purposes (3 or 4 words) -->
<style type="text/css" media="screen, print, tv, projection, handheld"> 

   /****************************/
   /* styles for fluid layout  */
   /****************************/
     html,body{margin: 0;         /* margin = space around the elements */
               padding: 0;        /* padding = space between "border" elements and "content" elements */
              }
     body{font-family: arial, sans-serif; 
          font-size: 76%; 
          background-color: #FFEE99;
          line-height: 1.2;       /* the height of the line is 1.2 times the value of the font */
         }
     .Stile1 {                    
	      font-family: Arial, Verdana, "Times New Roman", Helvetica, sans-serif;   
	      font-size: 12px;                                                     
	      color: #000066;
              text-decoration: none;
              text-shadow: blue 2px 2px 3px;
             }
     div#container{width: 60em; 
                   margin: 0 auto;               /* auto = the left and right margins are calculated automatically */
                   text-align: justify; 
                   border-left: 2px solid #36c; 
                   border-right: 2px solid #36c;
                  }  

   /************************************/
   /*generic styles, on header e footer*/
   /************************************/
     div#header{
                background-color: #36C; 
                color: #ff0;
               }
         h1,h2{margin: 0; 
               padding: 0;
              }
         h1{padding-left: 0.5em; 
            font: bold 2.3em/80px arial, serif;    /* 2.3em/80px = font size, row height of h1 */
            display: inline;
           }
         h2{color:#999; 
            font-size: 1.5em
           }
     div#header a{color: #ff0;
                  text-decoration: none
                 }
     div#header p{font-size: 100%;
                  font-weight: bold;
                  position: relative;
                  display: inline;
                  float: right;
                  color:#7FFF00;
                  margin-right: 5px;
                 }
     div#header p#normal{font-weight: normal; 
                         margin-right: 3px;
                        }
     div#footer{text-align: center; 
                padding: 0.5em; 
                background-color: #69c; 
                color: #000
               }
     div#footer a{color: #fff; 
                  font-weight: bold; 
                  text-decoration: underline
                 }

   /*******************************/
   /*  particular layout styles   */
   /*******************************/
     div#navigation{background-color: #9cf}
     div#content{padding: 1em; 
                 background: #D8BFD8 url(http://html.it/guide/esempi/css/test/sfondo.gif) repeat-y top right;  /* repeat-y = repeat vertic. */
                 padding-right: 10px;
                }
     div#content p{font-size: 100%;}

     div#content box1{font-size: 80%;  
                      position: relative;
                      display: block;
                      float: right;
                      width: 37%;
                      background-color: #CCCCCC;
                      border: 1px solid #000000;
                      margin: 0 0.2em 0 1.2em;
                      padding: 0.4em;
                     }
     #box1 li{margin: 0 0 0 -1.5em;     /* reducing the left margin by 1.5em  */
              list-style-type: disc;    /* disc =  list "marked" by a full colored circle.  */
             }

     div#content box2{font-size: 80%;  
                      position: relative;
                      display: block;
                      float: right;
                      width: 25%;
                      background-color: #CCCCCC;
                      border: 1px solid #000000;
                      margin: 0 0.2em 0 1.2em;
                      padding: 0.4em;
                     }
     #box2 li{margin: 0 0 0 -1.5em;     /* reducing the left margin by 1.5em  */
             }


   /**************************/
   /*navigation styles       */
   /**************************/
     div#navigation ul{margin: 0; 
                       padding: 0; 
                       list-style-type: none;}       /* list-style-type: symbol of lists  -> full / empty circle, checkbox, etc. */
     div#navigation li{display: inline;              /*inline:  continues in the line */
                       margin: 0 0 0 2em;            /*margin menu navigation:    top=0, right=0, bottom=0, left=2em   */
                       padding: 0;                
                      }       
     div#navigation a{color: #369;
                      font: normal bold 1.2em/2.5em arial, sans-serif; 
                      text-decoration: none;         /* text-decoration: underline,line-through,inherited */
                     }
     div#navigation a#activelink{color: #033; 
                                 text-decoration: none
                                }
a#viewcss{color: #00f;
          font-weight: bold
         }

</style>
</head>
<body onload="checkCookies(), checkOnline()">
<script type="text/javascript">
function checkCookies()
   {
     if (navigator.cookieEnabled==false)
	{
	  alert("Cookies are not enabled");
	}
   }
function checkOnline()
   {
     if (navigator.onLine==false)
	{
	  alert("browser not online");
	}
   }
</script>
<div id="container">
    <div id="header">
        <h1><a href="MENU-view.php">Contatti Aziende</a></h1>
        <?php
            session_start();
            print_r($_SESSION);
            $msg_Logout = htmlspecialchars($_GET['msg'], ENT_QUOTES, "UTF-8");
            if ( isset($_SESSION['Login']['user']) )
                {
                  echo ("<p>".$_SESSION['Login']['user']."</p>".
                        "<p id='normal'>Ciao,</p>"
                       );
                  $Login_status = "Logout";
                }
              else
                {
                  echo ("<p id='normal'>".$msg_Logout."</p>");
                  $Login_status = "Login";
                }
        ?>
    </div>
    <div id="navigation">
        <ul>
            <li><a id="activelink" href="#">Home</a></li>
            <li><a href="/application/produzione/contatti/Gruppo_Aziende/Gruppo00-view.php">Aziende</a></li>
            <li><a href="/application/produzione/contatti/vie/vie-standard00-view.php">Vie Standard</a></li>
            <li><a href="#">Statistiche</a></li>
            <li><a href="#">Varie</a></li>
            <li><a href="/application/produzione/contatti/general/email-controller.php">Email</a></li>
            <li><a href="/application/produzione/contatti/general/Login00-view.php"><?php echo $Login_status; ?></a></li>
        </ul>
    </div>
    <div id="content">
        <box1 id="box1">
               <center> 
                      <p>Your Company</p>
                      <img src="Image/Aziende.png" width=90% height=90% /> 
               </center>
        </box1>
        <box2 id="box2">
               <p>WhoIs - Domain Name:</p>
               <ul>
                  <li><a href="http://www.domaintools.com/buy/availability-check/">www.domaintools.com</a></li>
                  <li><a href="http://www.eurodns.com">www.eurodns.com</a></li>
                  <li><a href="http://www.nic.it/web-whois/index.jsf?set_language=it">www.nic.it</a></li>
                  <li><a href="www.eurid.eu">www.eurid.eu</a></li>
                  <li><a href="http://www.internic.net/whois.html">www.internic.net</a></li>
               </ul>
               <p>Registrar / Mantainer:</p>
               <ul>
                  <li><a href="http://www.nic.it/cgi-bin/List/index.cgi?language=IT">www.nic.it</a></li>
                  <li><a href="http://www.nsspy.org/archive/register.com/2012-02-16/1.html">www.nsspy.org</a></li>
               </ul>
               <p>WebSites - directory:</p>
               <ul>
                  <li><a href="www.registro-italiano-in-internet.com">www.registro-italiano-in-internet.com</a></li>
                  <li><a href="www.comuni-italiani.it/028/060/siti">www.comuni-italiani.it</a></li>
               </ul>
               <p>Aziende:</p>
               <ul>
                  <li><a href="http://visual-site.paginegialle.it/visualsite.html">visual-site.paginegialle.it</a></li>
                  <li><a href="http://www.paginegialle.it/cat/pagine-gialle-naviga.html">www.paginegialle.it</a></li>
                  <li><a href="http://www.prontoimprese.it/veneto/padova/padova">www.prontoimprese.it</a></li>
                  <li><a href="http://www.infoimprese.it/ricerca/risultati_5_milioni.jhtml">www.infoimprese.it</a></li>
               </ul>
        </box2>
        <h2>Procedura</h2>
        <p>Gestione "Gruppi di Aziende", in cui vengono fissati appuntamenti, previo contatti telefonici. </p>
        <p>Potrai fare:</p>
        <p>
           <ol>
              <li>Inserimento</li>
              <li>Modifica</li>
              <li>duplicazione</li>
              <li>Cancellazione</li>
           </ol>
        </p>

        <p>, relativamente alle aziende del database interno. Anche i contatti/Appuntamenti, nonchè le Vie, potranno essere 
             gestiti dal software, con le medesime 4 modalità elencate sopra.</p>
        <p class="Stile1">Ricorda sempre di effettuare il Login, prima di iniziare !</p>
        <a id="viewcss" href="http://html.it/guide/esempi/layout_css/viewcss.php?css=3cfbackground">visualizza il css di questo layout</a><br>
    </div>
    <div id="footer">© 2017-2018  - Software for internal use only. Database management example (Home Page only). Tested on a LAMP platform: Linux, Apache, MySQL, PHP5. <br>
    </div>
</div>
</body>
</html>
