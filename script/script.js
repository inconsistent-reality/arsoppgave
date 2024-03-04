console.log("coneccsqted")


const bordett = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
const bordto = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
const bordtre = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
const bordfire = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
const bordfem = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
const bordseks = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
// ... (de samme deklarasjonene for bordtre, bordfire, bordfem, bordseks)

const bord = [bordett, bordto, bordtre, bordfire, bordfem, bordseks]


console.log(bord[0][1]);



function submitEL() {
    console.log("test");
    document.getElementById("myform").submit();
}

function deleteEL(){
    
    document.getElementById("myform").submit['delete']();
}

function visdiv() {
    document.getElementById("rød").innerHTML = "<?php $iBruk = ''; ?>";

    if (document.getElementById("tid").value != 0) {
        document.getElementById("gjemt").style.display = "block";
    }
    else {
        document.getElementById("gjemt").style.display = "none";
    }
};

function optatt() {
    tid = document.getElementById("tid").value;
    bordtid = tid - 1

    document.getElementById("tatt").style.color = "#f7a761";


    console.log("klokka:" + tid);



    if (tid != 0) {

        i = 0;
        while (bord[i] != undefined) {
            var bordet = i + 1
            console.log(bord[i][tid]);
            //if bord is reservert -> prompt " boks"
            if (bord[i][tid] == 0) {
                console.log("bord " + bordet + " dødt klokka " + tid);


                //opptatt bord bli 
                document.getElementById(bordet).style.backgroundColor = "red";
                //document.getElementById js finner et elemnt med samme id som parantes. parantes = ()
            }
            else if (bord[i][tid] == 1) {
                console.log("bord " + bordet + " gjenomsto klokka " + tid);
                document.getElementById(bordet).style.backgroundColor = "greenyellow";
            }
            i++;
        };

    }
}

function checkReservation() {
    var selectedTime = document.getElementById("reservationTime").value;
    var currentTime = new Date();
    var selectedDate = new Date("2000-01-01 " + selectedTime); // Assuming the date is not important for this example

    // Compare the selected time with the current time
    if (selectedDate <= currentTime) {
        document.getElementById("result").innerText = "Du kan ikke reservere for tidligere tidspunkt.";
    } else {
        document.getElementById("result").innerText = "Reservasjon vellykket!";
        // Add your reservation logic here
    }
}
function reservert() {
    tid = document.getElementById("tid").value;
    bordtid = tid - 1;


    BordNr = document.getElementById("Nr").value;
    if (BordNr == "ett") {
        BordNr = 0;
    } else if (BordNr == "to") {
        BordNr = 1;
    } else if (BordNr == "tre") {
        BordNr = 2;
    } else if (BordNr == "fire") {
        BordNr = 3;
    } else if (BordNr == "fem") {
        BordNr = 4;
    } else if (BordNr == "seks") {
        BordNr = 5;
    }
    else if (BordNr == "seks") {
        BordNr = 6;
    }
    console.log(bord[BordNr][tid])

    if (bord[BordNr][tid] == 0) {
        console.log("bord " + BordNr + " bord nr død " + tid);

        document.getElementById("tatt").innerHTML = "Bord reservert";
        document.getElementById("tatt").style.color = "red";

    } else {
        document.getElementById("tatt").innerHTML = "Bord ledig";
        document.getElementById("tatt").style.color = "green";

    }
}





//   episten did't kill himself

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}













function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev, id) {
    ev.preventDefault();

    var data = ev.dataTransfer.getData("text");
    // Clone the dragged element
    var clone = document.getElementById(data).cloneNode(true);

    // Remove all content from the target element
    // var targetElement = ev.target;
    // while (targetElement.firstChild) {
    //     targetElement.removeChild(targetElement.firstChild);
    // }

    // Append the clone to the drop container
    // ev.target.appendChild(clone);
    var element = document.getElementById(clone.id);
    var holder = document.getElementById(ev.target.id + "holder");

    console.log(element.alt == "none")
    holder.value = element.alt

    // console.log(document.getElementById(element.src))

    if (element.alt == "none") {
        document.getElementById(ev.target.id + "-hold").innerHTML = ""
    }
    else {
        document.getElementById(ev.target.id + "-hold").innerHTML = "<img id='" + clone.id + "' src='" + element.src + "' class='ingimg    ' draggable='true' ondragstart='drag(event)'>"
    }
}