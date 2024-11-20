function changeColor() {
    let mood = document.getElementById("mood").value;
    let text;
    console.log(mood);
    switch (mood) {
        case "Feliz":
            mood = "#848000";
            text = "white";
            break;
        case "Triste":
            mood = "#0070B8";
            text = "white";
            break;
        case "Energético":
            mood = "red";
            text = "white";
            break;
        case "Relajado":
            mood = "green";
            text = "white";
            break;
        case "Inspirado":
            mood = "purple";
            text = "white";
            break;
        case "Estresado":
            mood = "black";
            text = "white";
            break;
    }
    console.log(mood);
    document.getElementById("body").style.backgroundColor = mood;
    document.getElementById("body").style.color = text;
}

document.getElementById("mood").addEventListener("change", changeColor, false);
