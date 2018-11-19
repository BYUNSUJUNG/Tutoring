// https://www.youtube.com/watch?v=1Srtn4Uy9uU&index=3&list=PLkvX9D0C9X8tPzDuTEVd4O2aJs-nYNLir
(function() {
    var current = 0;
    var max = 0;
    var container;
    var interval;
    var xml;
    var interval;

    function init() {
        container = $(".slide ul");
        
        max = container.children().length;
        events();

        interval = setInterval(next,3000);

    }
/*
    function config_load() {
        var obj = {};
        obj.url = "images.xml";
        obj.dataType = "/text";
        obj.type= "get";
        obj.success = loadComplete;
        obj.fail = loadFail;
        jQuery.ajax(obj);
    }

    function loadComplete($arg1, $arg2) {
        console.log($arg1, $arg2);
    }

    function loadFail($arg1, $arg2, $arg3) {
        console.log($arg1, $arg2, $arg3);
    }
*/
    function events() {
        jQuery("button.prev").on("click",prev);
        jQuery("button.next").on("click",next);

        jQuery(window).on("keydown",keydown);
    }

    function prev(e) {
        current--;
        if(current<0) current = max-1;
        animate();
    }

    function next(e) {
        current++;
        if(current>max-1) current = 0;
        animate();
    }
    
    function animate() {
        var moveX = current * 1000; //사진 간격
        TweenMax.to(container, 0.8, {marginLeft:-moveX, ease: Expo.easeOut});
        
        clearInterval(interval);
        interval = setInterval(next,3000);
    }

    function keydown(e) {
        if(e.which==50) {
            next();
        } else if(e.which==50) {
            prev();
        }
    }

    $(document).ready(init);
    
})();