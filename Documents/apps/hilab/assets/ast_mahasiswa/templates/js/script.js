    
//$(document).ready(function(){


    new Propeller(document.getElementById('turbine'), {
        inertia: 0.99,
        /*
        onDragStop: function() {
            console.log('stop');
        },
        onDragStart: function () {
            console.log('start');
        }
        */
    });

    function showLibraryInfo() {
        if (window.libInfoShown !== true) {
            var windStuff = document.getElementsByClassName('wind');
            var libStuff = document.getElementsByClassName('propeller');
            for (var i = 0; i < windStuff.length; i++) {
                var obj = windStuff[i];
                obj.style.display = 'none';
            }
            for (var i = 0; i < libStuff.length; i++) {
                var obj = libStuff[i];
                obj.style.display = 'inline-block';
            }
            window.libInfoShown = true;
        }
    }
    
