function toggleClimate()
{
     url = "httpRequestHandler.php?url=charge/getChargeClimateStateAction"
     consoleLogAjaxResponse("GET", url)
}

function consoleLogAjaxResponse(method, url){
    let ajaxCall = new XMLHttpRequest();
    ajaxCall.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        console.log(this.responseText)
        }
    };

    ajaxCall.open(method, url, true);
    ajaxCall.send();
}