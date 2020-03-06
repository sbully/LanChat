let containerModal = document.querySelector("#modal-container");
let subavatar = document.querySelector(".subavatar");
let modalBackground = document.querySelector(".modal-background"); //divcontaint
let mask = document.querySelector(".mask");
let imageUnblur = document.querySelector("#unblurred");
let imgBlurred = document.querySelector("#blurred");
let modal = document.querySelector(".modal");
let v_file = document.querySelector('.inputFile');
let imghid = document.querySelector('#imghid');



let active = false;
let imgTest;

let startX = 0;
let startY = 0;


if (v_file != null) {
    v_file.addEventListener('change', function() {

        let reader = new FileReader();
        reader.onload = function(e) {
            imgTest = new Image();
            imgTest.src = e.target.result;
            //imgTest.onload = sb_onLoadImg();
            //console.log(e);

            //divborder.style.backgroundImage='url('+imgTest.src+')';
            imgBlurred.src = e.target.result; //a enlever pour remettre l affiche croquer
            imageUnblur.style.backgroundImage = "url(" + e.target.result + ")";
            mask.classList.add("mask-in");
            imageUnblur.classList.add("unblurredIn");

            setTimeout(sb_setBackgroundPosition, 10);
        }
        reader.readAsDataURL(this.files[0]);


    });
}

function sb_setBackgroundPosition() {
    if (document.readyState == 'complete') {
        let X = (containerModal.offsetLeft);
        console.log(containerModal);
        console.log(imgBlurred);
        console.log(X + "px " + containerModal.offsetTop + "px");

        imageUnblur.style.backgroundPosition = (X + "px " + containerModal.offsetTop + "px");

    } else {
        sb_setBackgroundPosition();
    }

}
if (subavatar != null) {
    subavatar.addEventListener('click', function() {
        startX = (isNaN(parseInt(mask.style.left, 10))) ? mask.offsetLeft : parseInt(mask.style.left, 10);
        startY = (isNaN(parseInt(mask.style.top, 10))) ? mask.offsetTop : parseInt(mask.style.top, 10);
        sb_getResultatCroq();
    });
}

function sb_getResultatCroq() {
    imgTest = sb_getImagePortion((imgBlurred), 300, 300, startX, startY, 1);
    imghid.value = sb_getImagePortion((imgBlurred), 300, 300, startX, startY, 1);
    console.log(imgTest);
    console.log(imghid);
    //v_preview.src=imgTest; //a rajouter pour afficher l image croquer
}

function sb_getImagePortion(imgObj, newWidth, newHeight, startX, startY, ratio) {
    let tnCanvas = document.createElement('canvas');
    let tnCanvasContext = tnCanvas.getContext('2d');
    tnCanvas.width = newWidth;
    tnCanvas.height = newHeight;

    let bufferCanvas = document.createElement('canvas');
    let bufferContext = bufferCanvas.getContext('2d');
    bufferCanvas.width = imgObj.width;
    bufferCanvas.height = imgObj.height;
    bufferContext.drawImage(imgObj, 0, 0);

    tnCanvasContext.drawImage(bufferCanvas, startX, startY, newWidth * ratio, newHeight * ratio, 0, 0, newWidth, newHeight);
    /* var dataurl = tnCanvas.toDataURL('image/jpeg', 1.0);
     console.log(dataurl);*/
    return tnCanvas.toDataURL('image/jpeg', 0.7);
}

/*
window.onclick = function(event) {
    if (event.target != imgBlurred && event.target != imageUnblur &&
        event.target != mask && event.target != modalBackground &&
        document.querySelector(".modal-in") != undefined) {
        containerModal.classList.add("modal-out");
        modalBackground.classList.add("modalcontainer-out");
        containerModal.classList.remove("modal-in");
        modalBackground.classList.remove("modalcontainer-in");
        v_file.value = "";
    } else {
        //croq image

    }
};*/

/*
function sb_preLoad() {
    let newimg = getImagePortion(imgObject, 120, 150, 150, 80, 2);
}

smalldiv.addEventListener("mousedown", sb_dragStart, false);
smalldiv.addEventListener("mouseup", sb_dragEnd, false);
smalldiv.addEventListener("mousemove", sb_drag, false);

function sb_dragStart(e) {
    initialX = e.clientX - xOffset;
    initialY = e.clientY - yOffset;
    if (e.target === smalldiv) {
        active = true;
    }

}
function sb_dragEnd(e) {
    initialX = currentX;
    initialY = currentY;

    active = false;
}
function sb_drag(e) {
    if (active) {

        e.preventDefault();

        currentX = e.clientX - initialX;
        currentY = e.clientY - initialY;


        xOffset = currentX;
        yOffset = currentY;

        setTranslate(currentX, currentY, smalldiv);
    }
}
function setTranslate(positionX, positionY, element) {
    //element.style.transform = "translate3d(" + positionX + "px, " + positionY + "px, 0)";
    element.style.transform = "translateX(" + positionX + "px) translateY(" + positionY + "px)";
  }*/




/*
function sb_onLoadImg() {
    if (timer != null) {
        clearTimeout(timer);
    }
    if (!imgTest.complete) {
        timer = setTimeout(() => {
            sb_onLoadImg();
        }, 3);
    } else {
        sb_onPreLoad();
    }
}*/




$(document).ready(function() {
    $("#mask").draggable({
        containment: "parent"
    });

});