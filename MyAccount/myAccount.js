document.querySelector("#show-addAutograph").addEventListener("click",function(){
    document.querySelector(".popup").classList.add("active");
});
document.querySelector(".popup .close-btn").addEventListener("click",function(){
    document.querySelector(".popup").classList.remove("active");
});

function feed_fill(autografID, autografImage, personality, domain, city, country, time_obtained, object, mentions) {
                
    var divContainer = document.createElement('div');
    divContainer.className = "write-post-container";

    /*var divProfile = document.createElement("div");
    divProfile.className = "user-profile";

    var imgProfile = document.createElement('img');
    imgProfile.src = profileImage;
    imgProfile.className = "user-profile-img";
    divProfile.appendChild(imgProfile);
   
    var div = document.createElement('div');
    var nameParagraph = document.createElement('p');
    var name = document.createTextNode(userName);
    nameParagraph.appendChild(name);
    div.appendChild(nameParagraph);

    divProfile.appendChild(imgProfile);
    divProfile.appendChild(div);
    divContainer.appendChild(divProfile);*/

    //autograph
    var imgAutograph = document.createElement('img');
    imgAutograph.src = autografImage;
    imgAutograph.alt = 'autograph';
    imgAutograph.className = "post-img";

    var modalName = "modal";
    var modalID = modalName.concat(autografID);
    imgAutograph.onclick = function() {
        document.getElementById(modalID).showModal()
    };
    divContainer.appendChild(imgAutograph);

    //var text = document.createTextNode("asda");
    //divContainer.appendChild(text);

    var modal = document.createElement('dialog');
    modal.id = modalID;
    modal.className = "autograf-modal";

    //Div from modal
    var div = document.createElement('div');
    div.className = "modal-content";
    div.setAttribute("method", "dialog");

    //Header - autograph name and exit button
    var header = document.createElement('header');
    var title = document.createElement('h3');
    var textTitle = document.createTextNode(personality);
    title.appendChild(textTitle);
    header.appendChild(title);

    var closeBtn = document.createElement('button');
    var text = document.createTextNode("exit");
    closeBtn.onclick = function() {
        this.closest('dialog').close('close')
    };
    closeBtn.appendChild(text);
    header.appendChild(closeBtn);
    //Append header to div
    div.appendChild(header);

    //content of modal
    var divDetails = document.createElement('div');
    var details = document.createElement('h3');
    details.className = 'details';
    var title_details = document.createTextNode('Details');
    details.appendChild(title_details);
    divDetails.appendChild(details);

    var div_item = document.createElement('div');
    div_item.className = "div_item";
    var item = document.createElement('h2');
    var item_detail = document.createTextNode('Domain');
    var context = document.createElement('p');
    var context_text = document.createTextNode(domain);
    item.appendChild(item_detail);
    context.appendChild(context_text);
    item.appendChild(context);
    div_item.appendChild(item)
    divDetails.appendChild(div_item);
    
    div_item = document.createElement('div');
    div_item.className = "div_item";
    item = document.createElement('h2');
    item_detail = document.createTextNode('Personality');
    context = document.createElement('p');
    context_text = document.createTextNode(personality);
    item.appendChild(item_detail);
    context.appendChild(context_text);
    item.appendChild(context);
    div_item.appendChild(item)
    divDetails.appendChild( div_item);

    div_item = document.createElement('div');
    div_item.className = "div_item";
    item = document.createElement('h2');
    item_detail = document.createTextNode('Country');
    context = document.createElement('p');
    context_text = document.createTextNode(country);
    item.appendChild(item_detail);
    context.appendChild(context_text);
    item.appendChild(context);
    div_item.appendChild(item)
    divDetails.appendChild( div_item);


    div_item = document.createElement('div');
    div_item.className = "div_item";
    item = document.createElement('h2');
    item_detail = document.createTextNode('City');
    context = document.createElement('p');
    context_text = document.createTextNode(city);
    item.appendChild(item_detail);
    context.appendChild(context_text);
    item.appendChild(context);
    divDetails.appendChild(item);

    div_item = document.createElement('div');
    div.className = "div_item";
    item = document.createElement('h2');
    item_detail = document.createTextNode('Time of obtaining');
    context = document.createElement('p');
    context_text = document.createTextNode(time_obtained);
    item.appendChild(item_detail);
    context.appendChild(context_text);
    item.appendChild(context);
    divDetails.appendChild(item);

    div_item = document.createElement('div');
    div.className = "div_item";
    item = document.createElement('h2');
    item_detail = document.createTextNode('Object');
    context = document.createElement('p');
    context_text = document.createTextNode(object);
    item.appendChild(item_detail);
    context.appendChild(context_text);
    item.appendChild(context);
    divDetails.appendChild(item);

    div_item = document.createElement('div');
    div.className = "div_item";
    item = document.createElement('h2');
    item_detail = document.createTextNode('Special mentions');
    context = document.createElement('p');
    context_text = document.createTextNode(mentions);
    item.appendChild(item_detail);
    context.appendChild(context_text);
    item.appendChild(context);
    divDetails.appendChild(item);

    div.appendChild(divDetails);

    //Append div to modal
    modal.appendChild(div);

    //Append modal to post-container
    divContainer.appendChild(modal);

    // Append the div to the div autographs from body
    document.getElementById("autographs").appendChild(divContainer);

    /*<div class="write-post-container">
        
        <img src="../images/autograf.webp" alt="autograf" class="post-img" onclick="openDetails()"/>
        <div class="post-popup">
            <h3 class="details">Details</h3>
            <h2>Domain:</h2>
            <p>Muzica</p>
            <h2>Personality:</h2>
            <p>Formatia Rock Beach Boys</p>
            <h2>Country:</h2>
            <p>details</p>
            <h2>City:</h2>
            <p>details</p>
            <h2>Moment:</h2>
            <p>details</p>
            <h2>Object:</h2>
            <p>Fotografie</p>
            <h2>Special montions:</h2>
            <p>details</p>
        </div>
    </div>*/

    
}