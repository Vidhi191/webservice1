
const ptag = document.getElementById("weather");
const dtag = document.getElementById("day"); // Corrected from "day" to "DAY" to match the HTML

setInterval(() => {
    fetch("data.php")
        .then(rawdata => rawdata.json())
        .then(jsondata => {
            jsondata = JSON.parse(jsondata)//pass data

            ptag.innerText = jsondata.weather + " .temp";
            dtag.innerText = jsondata.day; 
        })
       
}, 3000);



