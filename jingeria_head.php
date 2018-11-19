<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>

<script src="controller.js"></script>

<style type="text/css">
    


    .slide {
        width: 1000px;
        overflow: hidden;
        margin: 0 auto;
        position: relative;
    }

    .slide ul {
        width: 3000px;
        list-style:none;
        font-size:0;
    }
    .slide ul li {
        display: inline-block;
    }

    .slide button .button_left  {
        width: 100px;
        height: 100px;
        position: absolute;
        left:0;
        top: 200px;
    }

    .slide button .button_right {
        width: 100px;
        height: 100px;
        position: absolute;
        right:0;
        top: 200px;
    }


    /*여기서 부터는 nav content 꺼임*/
    .container { /* boardBox */  /*height는 각각다름*/
        margin-top: 8%;
        margin-left: 20%;

    }

    .NewBox {
        width: 100%;
        background-color: white;
        padding: 2%;
    }


    .card {
        background-color:white;
        float:left;
        padding: 2%;
    }


                        
    footer {
        margin-top: 30%;
    }
</style>