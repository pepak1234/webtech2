/************************************* Plane [Nika] *************************************/

var times = []
var positions = [];
var angles = [];
var newInput = [0,0,0];
var index = 0;
var interval = null;
var alreadyPlayed = false;
var lang;

$(document).ready(function () {
    lang = document.getElementsByTagName('html')[0]['lang'];
})

function rad2deg(radians){
    return radians * (180/Math.PI);
}

//vykreslenie grafov
function plot(lang){
    var trace1 = {
        x: times,
        y: positions,
        mode: 'lines',
        type: 'scatter',
        line: {'shape': 'spline', 'smoothing': 1.3}
    };

    var trace2 = {
        x: times,
        y: angles,
        mode: 'lines',
        type: 'scatter',
        line: {'shape': 'spline', 'smoothing': 1.3}
    };


    var data1 = [trace1];
    var data2 = [trace2];

    var layout1,layout2;

    if (lang === 'en'){
        layout1 = {
            title:'Plane',
            xaxis:{
                title:"Time [s]"
            },
            yaxis:{
                title:"Position [m]"
            }
        };
        layout2 = {
            title:'Plane elevator',
            xaxis:{
                title:"Time [s]"
            },
            yaxis: {
                showexponent: 'all',
                exponentformat: 'e',
                title:"Angle [rad]"
            }
        };
    }
    else {
        layout1 = {
            title:'Náklon lietadla',
            xaxis:{
                title:"Čas [s]"
            },
            yaxis:{
                title:"Poloha [m]"
            }
        };
        layout2 = {
            title:'Náklon zadnej klapky',
            xaxis:{
                title:"Čas [s]"
            },
            yaxis: {
                showexponent: 'all',
                exponentformat: 'e',
                title:"Uhol [rad]"
            }
        };
    }



    Plotly.newPlot('positionGraph', data1, layout1);
    Plotly.newPlot('angleGraph', data2, layout2);
}

function changePosition(lang,keyIsValid){
    var endpoint = "octave/api/animation";

    if (keyIsValid == true) {
        var apiKey = document.getElementById("apiKey").value;

        //tooltip - defaultne nie je viditelny
        $('#positionInput').tooltip({trigger: "manual"}).tooltip('hide');

        //nacitanie vstupu
        var position = document.getElementById("positionInput").value;

        //rozsah pozicie je 0-100
        if (!isNaN(position) && position >= -50 && position <= 50) {

            //prevod pozicie z cm na m
            position /= -100;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //nacitanie dat z octave
                    var data = JSON.parse(this.responseText);

                    newInput = data.newInput;
                    positions = data.positions;
                    angles = data.angles;
                    times = data.times;

                    plot(lang); //grafy

                    //spustenie casovaca - posuvanie gulicky
                    index = 0;
                    alreadyPlayed = false;
                    interval = setInterval(move, 100);
                }
            };

            //get request na octave api
            var url = endpoint + "?type=plane&position=" + position + "&newInput=" + JSON.stringify(newInput) + "&apiKey=" + apiKey;
            console.log(url);
            xhttp.open("GET", url, true);
            xhttp.send();
        } else {
            //tooltip sa zobrazi ked sa zadaju nespravne hodnoty
            $('#positionInput').tooltip('show');
        }
    }
}

//prevod z radianov na stupne
function rad2deg(radians){
    return radians * (180/Math.PI);
}

//posun lopticky
function move(){
    //ked prejde cele pole, tak sa vynuluje stav
    if(index >= positions.length){
        index = 0;
        alreadyPlayed = true;
        clearInterval(interval);
    }

    if (!alreadyPlayed) {

        let anglePlain = rad2deg(positions[index]);
        let angleElevator = -rad2deg(angles[index]);

        document.getElementById("wholePlain").style.transformOrigin = "center";
        document.getElementById("wholePlain").style.transform = "rotate(" + anglePlain + "deg)";

        document.getElementById("elevator").style.transformOrigin = "25% 47%";
        document.getElementById("elevator").style.transform = "rotate(" + angleElevator + "deg)";

        index++;
    }
}

//prepinanie zobrazenia animacie a grafov
function toggleDisplay(show,target) {
    var targets = document.getElementsByClassName(target);

    if (show){
        for (var i = 0; i < targets.length; i++)
            targets[i].style.display="block";
    }
    else {
        for (var i = 0; i < targets.length; i++)
            targets[i].style.display="none";
    }
}

function toggleVisibility(show,target) {
    var targets = document.getElementsByClassName(target);

    if (show){
        for (var i = 0; i < targets.length; i++)
            targets[i].style.visibility="visible";
    }
    else {
        for (var i = 0; i < targets.length; i++)
            targets[i].style.visibility="hidden";
    }
}