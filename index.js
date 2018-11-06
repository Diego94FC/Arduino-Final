function restoreValues(){
     document.getElementById("distance").value = "30";
     document.getElementById("time").value = "3";

}
/*Recibir los datos mostrados en el 'echo json_encode()' de getValues.php con javascript puro*/
/* Esto es AJAX */
/* Es más simple con JQuery */
    var oReq = new XMLHttpRequest(); //New request object
    oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        //console.log(this.responseText);

        //Así que lo que hice fue...
        let values = JSON.parse(this.responseText); //Parsear desde JSON (string) a un objeto de JS
        document.getElementById("distance_label").innerText = values[0];
        document.getElementById("time_label").innerText = values[1];

    };
    oReq.open("get", "getValues.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to
    //                                 continue.
    oReq.send();

/* Fin de Recibir los datos con Ajax */
