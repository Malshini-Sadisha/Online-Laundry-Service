function displayStat(elementId, text, delay){
    setTimeout(function(){
        document.getElementById(elementId).innerHTML = text;
    }, delay);
}

displayStat("feedback", "<b>95%</b><br>Positive Feedback", "1000");
displayStat("orders", "<b>3500+</b><br>Orders Completed", "2000");
displayStat("customers", "<b>7000+</b><br>Customers</p>", 3000);