function setIdle(cb, seconds) {
    var timer; 
    var interval = seconds * 1000;
    function refresh() {
            clearInterval(timer);
            timer = setTimeout(cb, interval);
    	};
    $(document).on('keypress, click', refresh);
    refresh();
	}


function CustomAlert(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = "Alert!";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">Yes!</button>';
    }
    this.ok = function(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
    }
}
var Alert = new CustomAlert();

function ToggleScroll() {

    if (scrollToggle === true) {
        document.getElementById('scroll_btn').src  = 'Images/scrollDown_btn.png';
        location.href = "#shortened_header";
    } else {
       document.getElementById('scroll_btn').src = 'Images/scrollUp_btn.png';
       
       location.href = "#tier2_logos";
    }
    scrollToggle = !scrollToggle; 
}