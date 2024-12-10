function changepara(name){
    if(name =="washing")    {
        document.getElementById("des").innerHTML = " Our laundry service provides top-notch washing solutions for all your garments and linens. We use high-quality detergents and employ advanced techniques to ensure thorough cleaning while preserving the fabric's integrity. Trust us to handle your laundry with care and deliver fresh, clean results every time.";
    }
    else if(name == "mending"){
        document.getElementById("des").innerHTML = "Say goodbye to torn seams and loose buttons! Our skilled team of tailors is here to mend and repair your clothing items with precision and expertise. From minor alterations to major fixes, we take pride in restoring your garments to their original condition, ensuring you can enjoy them for longer.";
    }
    else if(name == "deliver"){
        document.getElementById("des").innerHTML = " Enjoy the convenience of our hassle-free pickup and delivery service. Simply schedule a time that works for you, and our friendly staff will collect your laundry from your doorstep. Once cleaned, pressed, and neatly folded, we'll return your items to you promptly. Experience the ease of laundry without leaving the comfort of your home.";
    }
    else if(name == "press"){
        document.getElementById("des").innerHTML = "Achieve a polished and professional look with our exceptional pressing service. Our experienced team pays attention to every detail, meticulously pressing your clothes to remove wrinkles and creases. Whether it's a formal suit, a delicate dress, or everyday wear, we ensure your garments look crisp and wrinkle-free, ready to make a lasting impression.";
    }
    else if(name == "dry"){
        document.getElementById("des").innerHTML = "For garments that require special care, our dry cleaning service is the perfect solution. Using state-of-the-art equipment and eco-friendly solvents, we remove stains, odors, and dirt from delicate fabrics without compromising their quality. Trust us to handle your most cherished and high-end items with the utmost care and precision.";
    }
    else if(name == "oneDay"){
        document.getElementById("des").innerHTML = "When you're pressed for time, our one-day service comes to the rescue. Drop off your laundry in the morning, and by the end of the day, it will be expertly washed, dried, and folded, ready for you to pick up. Experience the efficiency and speed of our service, allowing you to focus on other important aspects of your day while we take care of your laundry needs.";
    }
}

//change paragraphs every 5 seconds
setInterval(function(){
    changepara("washing");
}, 5000);

setInterval(function(){
    changepara("mending");
    
}, 10000);

setInterval(function(){
    changepara("deliver");
    
}, 15000);

setInterval(function(){
    changepara("press");
    
}, 20000);

setInterval(function(){
    changepara("dry");
    
}, 25000);

setInterval(function(){
    changepara("oneDay");
    
}, 30000);