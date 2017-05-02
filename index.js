monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

window.onload = function(){
    addUserEntry("https://www.organicfacts.net/wp-content/uploads/2013/05/Grapes11.jpg", "Grapes", "4/21/17");
    today = new Date(Date.now()); //today's date
    selectedObject = null; //stores the HTML TD element that represents the selected date

    newDate = new Date( //get the date of Sunday
        today.getFullYear(),
        today.getMonth(),
        (today.getDate()-today.getDay())
    );
    setCalendar(newDate);
    fillImageTable(4,20);
}

/*
*   Sets the calendar dates according to the passed Sunday date object
*   Parameters: a date object
*/
function setCalendar(sundayDate){

    var calendarTable = document.getElementById("calendar-table");
    for(x = 0; x < 7; x++){

        calendarTable.rows[1].cells[x].innerHTML = sundayDate.getDate();
        sundayDate.setDate(sundayDate.getDate()+1);

    }
    sundayDate.setDate(sundayDate.getDate()-7);
    document.getElementById("month-text").innerHTML = monthNames[sundayDate.getMonth()];
}

/*
* Moves the calendar up one week
*/
function nextWeek(){
    newDate.setDate(newDate.getDate()+7);
    setCalendar(newDate);
    selectDate(selectedObject);
}

/*
* Moves the calendar back one week
*/
function prevWeek(){
    newDate.setDate(newDate.getDate()-7);
    setCalendar(newDate);
    selectDate(selectedObject);
}

/*
* Selects the date clicked on the calendar and highlights it. Also updates the month based on the selected date.
* Parameters: HTML object representing the date
*/
function selectDate(day){
    if(selectedObject != null){
        selectedObject.style.backgroundColor = "white";
        selectedObject.style.color = "black";
    }
    selectedObject = day;
    selectedDate = new Date(
        newDate.getFullYear(),
        newDate.getMonth(),
        (newDate.getDate()+day.cellIndex)
    );
    console.log(selectedDate); //log the selected date for now
    day.style.backgroundColor = "darkblue";
    day.style.color = "white";
   document.getElementById("month-text").innerHTML = monthNames[selectedDate.getMonth()];
}


// pictues.html javascript
function fillImageTable(_i,_j){
    var foodItems = ["pictures/apple.png", "pictures/banana.png",
                    "pictures/cherries.png", "pictures/eggplant.png",
                    "pictures/grapes.png", "pictures/strawberry.png"];
    for(var i = 0; i < _i; i++){
        for(var j = 0; j < _j; j++){
            var row=document.getElementById("foodTable").rows[i];
            var x=row.insertCell(-1);
            var img = document.createElement('img');
            var choice = foodItems[Math.floor(Math.random() * foodItems.length)];
            var splitter = choice.split("/",2);
            img.name = splitter[1].slice(0, -4);
            img.src = choice
            img.onclick = function(){tableText(this);}
            x.appendChild(img);
        }
    }
}

function onClick(){
    var table = document.getElementById("foodTable");
    if (table != null) {
        for (var i = 0; i < table.rows.length; i++) {
            for (var j = 0; j < table.rows[i].cells.length; j++)
            table.rows[i].cells[j].onclick = function () {
                tableText(this);
            };
        }
    }
}

function tableText(tableCell) {
    console.log(tableCell.name);
}

// functions dealing with stuff user entered

function addUserEntry(img,name,date){
    //create the elements
    var entry = document.createElement("DIV");
    entry.className = "food-entry";
    var image = document.createElement("IMG");
    image.src=img;
    image.className = "food-entry-image";
    var item = document.createElement("P");
    item.className = "food-entry-name";
    item.innerHTML = name;
    var expiration = document.createElement("P");
    expiration.className = "food-entry-date";
    expiration.innerHTML = date;
    var container = document.getElementById("food-entry-container");
    entry.appendChild(image);
    entry.appendChild(item);
    entry.appendChild(expiration);
    container.appendChild(entry);




    // var table = document.getElementById("foodEntries");
    // var row = table.insertRow(-1);
    // var cell1 = row.insertCell(0);
    // var cell2 = row.insertCell(1);
    // var cell3 = row.insertCell(2);
    // //fill the cells
    // cell1.innerHTML = "<img src = " + img + " \/>";
    // cell2.innerHTML = name;
    // cell3.innerHTML = date;
}
