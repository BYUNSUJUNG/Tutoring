<meta charset="UTF-8">
<meta name="viewport" content="width=device-width", initial-scale="1">
<title>집게리아 MainPage</title>
<link rel="stylesheet" href="css/bootstrap.css">

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<style type="text/css">
    body {
        background-color:beige;
        /*background-image: url("images/sky.jpg");
        background-repeat:no-repeat;
        background-size: 100% 100%;*/
    }

    a { color: black;  }
    a:hover {
        color: black;
        text-decoration:none; 
    }

    button {
        border: 0;
        background: none;
    }


    .top_nav {
        z-index: 2;
        position:absolute;
        width: 100%;
        height: 30px;
        top: 0;
    }

    .nav {
        z-index: 1;
        position:absolute;
        width: 100%;
        height: 70px;
        top:  30px;
    }

    .top_nav_content {
        margin-left: 60%;
    }

    .top_nav_content span {
        margin-top: 2%;
    }

    .nav_content {
        margin-left: 45%;
    }

    .mark {
        background-color:transparent;
        width: 250px;
        height: 200px;
        z-index: 3;
        position: absolute;
        top: 0%;
        left: 10%;
    }

    /* 여기까지 기본*/


    article {
        background-color: white;
        width: 800px;
        height: 500px;
        margin-top: 10%;
        margin-left: 30%;
        border-radius: 10px;
        padding: 3%;
    }
    /*여기까지 view*/



    .submit {  /* submit */
        margin-left: 70%;
        margin-bottom: 10%;

    }

    .list-group {   /* sideBar */
        width: 10%;
        margin-top: 12%;
        margin-left: 12%;
        float:left;
    }

    button[type=button] {
        width: 250px;
    }

    table {
        margin-top: 3%;
        margin-bottom: 2%;
    }


    hr.head {
        border: 3px solid #2478FF;
    }

    hr {
        border: 1px dashed #EAEAEA;
    }

    @media screen and (min-width: 600px) {

    }



</style>