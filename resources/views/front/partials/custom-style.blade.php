<style type="text/css">
    .h1, .h2, .h3, .h4, body, h1, h2, h3, h4, h5, h6 {
        font-family: Arial,sans-serif;
    }
    div.input-group-text{
      background-color: #fff!important;
    }
    /*SELECT*/
    select.form-control{
      border-color: #fff!important;
    }
    .form-control:focus{
      border-color: #fff!important;
      box-shadow: 0 0 0 0.2rem #fff!important;
    }
    /*END SELECT*?
    /*DROPDOWN*/
    .dropdown:hover>.dropdown-menu {
      display: block;
    }
    .dropdown>.dropdown-toggle:active {
      /*Without this, clicking will make it sticky*/
        pointer-events: none;
    }
    /*END DROPDOWN*/
    /*JUMBOTRON*/
    #header {
        background: url(https://bookinghealth.info/i/img/bg1_5.jpeg) 0 0 no-repeat fixed; 
        background-position: center top;
        max-width: 100%;
        width: 100%;
        height: auto;
        /*height: 100%;*/
        overflow: hidden;
        color: #FFFFFF; 
     }
    .my-jumbotron {
        background: rgba(84, 84, 84, 0.82);
        overflow: hidden;
        height: 100%;
        width: 100%;
        z-index: 2;
/*        padding: 2rem 1rem;
        margin-bottom: 2rem;
        position: relative;
        background: #000;
        overflow: hidden;
        background: url('https://bookinghealth.info/i/img/bg1_5.jpeg') no-repeat;*/
    }
    #banner-promo {
        background: url(https://www.bannerhealth.com/-/media/images/hero-images/careers/femaledoctorchildpatientd.jpg) 0 0 no-repeat fixed; 
        background-position: center top;
        max-width: 100%;
        width: 100%;
        height: auto;
        /*height: 100%;*/
        overflow: hidden;
        color: #FFFFFF; 
     }
    .nav_metallic{
      color: #3399ff;
      background-color: #3399ff;
      background: -moz-linear-gradient(top, #1e5799 0%, #2989d8 50%, #207cca 51%, #7db9e8 100%); /* FF3.6+ */
    }
    /*.my-jumbotron:before {
        content: ' ';
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
        opacity: 0.6;
        background-repeat: no-repeat;
        background-position: 50% 0;
        -ms-background-size: cover;
        -o-background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        background-size: cover;
        background-color: rgba(0,0,0,0.5);
    }*/
    /*NAVPILLS*/
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #ffc326 !important;
    }
    a.text-light:focus, a.text-light:hover {
        color: #ffffff!important;
    }
    /*END NAVPILLS*/
    /* CSS Document */
    .navbar-edit {
        overflow: hidden;
        background-color: #333;
        font-family: Arial, Helvetica, sans-serif;
    }
    .navbar-edit a {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    .dropdown {
        float: left;
        overflow: hidden;
    }
    .dropdown .dropbtn {
        font-size: 16px;    
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font: inherit;
        margin: 0;
    }
    .navbar-edit a:hover, .dropdown:hover .dropbtn {
        background-color: red;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        width: 100%;
        left: 0;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    .dropdown-content .header {
        background: red;
        padding: 16px;
        color: white;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    /* Create three equal columns that floats next to each other */
    .column {
        float: left;
        width: 33.33%;
        padding: 10px;
        background-color: #ccc;
        height: 250px;
    }
    .column a {
        float: none;
        color: black;
        padding: 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }
    .column a:hover {
        background-color: #ddd;
    }
    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media (max-width: 600px) {
        .column {
            width: 100%;
            height: auto;
        }
    }
    body {
      overflow-x: hidden;
    }
    #wrapper {
      padding-left: 0;
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
    }
    #wrapper.toggled {
      padding-left: 200px;
    }
    #sidebar-wrapper {
      z-index: 1000;
      position: fixed;
      left: 200px;
      width: 0;
      height: 100%;
      margin-left: -200px;
      overflow-y: auto;
      background: #212d41;
      /*box-shadow: 10px 5px 25px 0 rgba(0,0,0,.2);*/
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
    }
    #wrapper.toggled #sidebar-wrapper {
      width: 200px;
    }
    #page-content-wrapper {
      width: 100%;
      position: absolute;
      /*padding: 15px;*/
    }
    #wrapper.toggled #page-content-wrapper {
      position: absolute;
      margin-right: -200px;
    }
    /* Sidebar Styles */
    .sidebar-nav {
      position: absolute;
      top: 0;
      width: 200px;
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .sidebar-nav li {
      text-indent: 20px;
      line-height: 40px;
    }
    .sidebar-nav li a {
      display: block;
      text-decoration: none;
      color: #c3cee0;
    }
    .sidebar-nav li a:hover {
      text-decoration: none;
      color: #ffc326;
      background: rgba(255, 255, 255, 0.2);
    }
    .sidebar-nav li a:active, .sidebar-nav li a:focus {
      text-decoration: none;
    }
    .sidebar-nav>.sidebar-brand {
      height: 65px;
      font-size: 18px;
      line-height: 60px;
    }
    .sidebar-nav>.sidebar-brand a {
      color: #fff;
    }
    .sidebar-nav>.sidebar-brand a:hover {
      color: #ffc326;
      background: none;
    }
    @media(min-width:768px) {
      #wrapper {
        padding-left: 0;
      }
      #wrapper.toggled {
        padding-left: 200px;
      }
      #sidebar-wrapper {
        width: 0;
      }
      #wrapper.toggled #sidebar-wrapper {
        width: 200px;
      }
      #page-content-wrapper {
        /*padding: 20px;*/
        position: relative;
      }
      #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
      }
    }
    /* END OF DEMO CSS */
    /*FEEDBACK-RIGHT BUTTON */
    #feedback-right a {
      display: block;
      height: 52px;
      width: 155px; 
      color: #fff;
      font-size: 17px;
      font-weight: bold;
      text-decoration: none;
    }
    #feedback-right {
      height: 0px;
      width: 85px;
      position: fixed;
      left: -45px;
      top: 70%;
      z-index: 1000;
      transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    }
    #feedback-right a {
      display: block;
      background:rgba(0,0,0,0.7);
      height: 52px;
      padding-top: 7px;
      width: 155px;
      text-align: center;
      color: #fff;
      font-family: Arial, sans-serif;
      font-size: 17px;
      font-weight: bold;
      text-decoration: none;
    }
    #feedback-right a:hover {
      background:#3399ff;
    }
    /*END FEEDBACK-RIGHT BUTTON */

    /*FEEDBACK-RIGHT BUTTON */
    #feedback-right-up a {
      display: block;
      height: 52px;
      width: 80px; 
      color: #fff;
      font-size: 17px;
      font-weight: bold;
      text-decoration: none;
    }
    #feedback-right-up {
      height: 0px;
      width: 85px;
      position: fixed;
      left: -45px;
      top: 40%;
      z-index: 1000;
      transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    }
    #feedback-right-up a {
      display: block;
      background:rgba(0,0,0,0.7);
      height: 52px;
      padding-top: 7px;
      width: 80px;
      text-align: center;
      color: #fff;
      font-family: Arial, sans-serif;
      font-size: 17px;
      font-weight: bold;
      text-decoration: none;
    }
    #feedback-right-up a:hover {
      background:#3399ff;
    }
    /*END FEEDBACK-RIGHT BUTTON */
</style>