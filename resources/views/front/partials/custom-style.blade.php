<style type="text/css">
    .h1, .h2, .h3, .h4, body, h1, h2, h3, h4, h5, h6 {
        font-family: Arial,sans-serif;
    }
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
      background: #0b2640;
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
      color: #fff;
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

  .animate {
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }

  .navbar-fixed-left {
    position: fixed;
    bottom: 0px;
    left: 0px;
    border-radius: 0px;
  }

  .navbar-minimal {
    width: 60px;    
    min-height: 60px;
    max-height: 100%;
    background-color: rgb(51, 51, 51);
    background-color: rgba(51, 51, 51, 0.8);
    border-width: 0px;
    z-index: 1000;
  }

  .navbar-minimal > .navbar-toggler {
    position: relative;
    min-height: 60px;
    border-bottom: 1px solid rgb(81, 81, 81);
    z-index: 100;
    cursor: pointer;
  }

  .navbar-minimal > .navbar-toggler > span {
    position: absolute;
    top: 50%;
    right: 50%;
    margin: -8px -8px 0 0;
    width: 16px;
    height: 16px;
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE2LjIuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjMycHgiIHZpZXdCb3g9IjAgMCAxNiAzMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMTYgMzIiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0iI0ZGRkZGRiIgZD0iTTEsN2gxNGMwLjU1MiwwLDEsMC40NDgsMSwxcy0wLjQ0OCwxLTEsMUgxQzAuNDQ4LDksMCw4LjU1MiwwLDgKCVMwLjQ0OCw3LDEsN3oiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiNGRkZGRkYiIGQ9Ik0xLDEyaDE0YzAuNTUyLDAsMSwwLjQ0OCwxLDFzLTAuNDQ4LDEtMSwxSDFjLTAuNTUyLDAtMS0wLjQ0OC0xLTEKCVMwLjQ0OCwxMiwxLDEyeiIvPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0iI0ZGRkZGRiIgZD0iTTEsMmgxNGMwLjU1MiwwLDEsMC40NDgsMSwxcy0wLjQ0OCwxLTEsMUgxQzAuNDQ4LDQsMCwzLjU1MiwwLDMKCVMwLjQ0OCwyLDEsMnoiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiNGRkZGRkYiIGQ9Ik0xLjMzLDI4Ljk3bDExLjY0LTExLjY0YzAuNDU5LTAuNDU5LDEuMjA0LTAuNDU5LDEuNjYzLDAKCWMwLjQ1OSwwLjQ1OSwwLjQ1OSwxLjIwNCwwLDEuNjYzTDIuOTkzLDMwLjYzM2MtMC40NTksMC40NTktMS4yMDQsMC40NTktMS42NjMsMEMwLjg3MSwzMC4xNzQsMC44NzEsMjkuNDMsMS4zMywyOC45N3oiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiNGRkZGRkYiIGQ9Ik0yLjk5MywxNy4zM2wxMS42NDEsMTEuNjRjMC40NTksMC40NTksMC40NTksMS4yMDQsMCwxLjY2MwoJcy0xLjIwNCwwLjQ1OS0xLjY2MywwTDEuMzMsMTguOTkzYy0wLjQ1OS0wLjQ1OS0wLjQ1OS0xLjIwNCwwLTEuNjYzQzEuNzg5LDE2Ljg3MSwyLjUzNCwxNi44NzEsMi45OTMsMTcuMzN6Ii8+Cjwvc3ZnPgo=);
    background-repeat: no-repeat;
    background-position: 0 0;
    -webkit-transition: -webkit-transform .3s ease-out 0s;
    -moz-transition: -moz-transform .3s ease-out 0s;
    -o-transition: -moz-transform .3s ease-out 0s;
    -ms-transition: -ms-transform .3s ease-out 0s;
    transition: transform .3s ease-out 0s;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  .navbar-minimal > .navbar-menu {
    position: absolute;
    bottom: -1000px;
    left: 0px;
    margin: 0px;
    padding: 0px;
    list-style: none;
    z-index: 50;
    background-color: rgb(51, 51, 51);
    background-color: rgba(51, 51, 51, 0.8);
  }
  .navbar-minimal > .navbar-menu > li {
    margin: 0px;
    padding: 0px;
    border-width: 0px;
    height: 54px;
  }
  .navbar-minimal > .navbar-menu > li > a {
    position: relative;
    display: inline-block;
    color: rgb(255, 255, 255);
    padding: 20px 23px;
    text-align: left;
    cursor: pointer;
    border-bottom: 1px solid rgb(81, 81, 81);
    width: 100%;
    text-decoration: none;
    margin: 0px;
  }

  .navbar-minimal > .navbar-menu > li > a:last-child {
    border-bottom-width: 0px;
  }
  .navbar-minimal > .navbar-menu > li > a:hover {
    background-color: #00CCCC;
  }
  .navbar-minimal > .navbar-menu > li > a > .glyphicon {
    float: right;
  }

  .navbar-minimal.open {
    width: 320px;
  }

  .navbar-minimal.open > .navbar-toggler > span {
    background-position: 0 -16px;
    -webkit-transform: rotate(-180deg);
    -moz-transform: rotate(-180deg);
    -o-transform: rotate(-180deg);
    -ms-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }

  .navbar-minimal.open > .navbar-menu {
    bottom: 60px;
    width: 100%;
    min-height: 100%;
  }

  @media (min-width: 768px) {
    .navbar-minimal.open {
      width: 60px;
    }
    .navbar-minimal.open > .navbar-menu {
      overflow: visible;
    }
    .navbar-minimal > .navbar-menu > li > a > .desc {
      position: absolute;
      display: inline-block;
      top: 50%;
      left: 130px;
      margin-top: -20px;
      margin-left: 20px;
      text-align: left;
      white-space: nowrap;
      padding: 10px 13px;
      border-width: 0px !important;
      background-color: rgb(51, 51, 51);
      background-color: rgba(51, 51, 51, 0.8);
      opacity: 0;
    }
    .navbar-minimal > .navbar-menu > li > a > .desc:after {
      z-index: -1;
      position: absolute;
      top: 50%;
      left: -10px;
      margin-top: -10px;
      content:'';
      width: 0;
      height: 0;
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent;  
      border-right: 10px solid rgb(51, 51, 51);
      border-right-color: rgba(51, 51, 51, 0.8);
    }
    .navbar-minimal > .navbar-menu > li > a:hover > .desc {
      left: 60px;
      opacity: 1;
    }
  }
</style>