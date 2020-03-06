/*let v_file = document.querySelector('.inputFile');

let startX = 0;
let startY = 0;
let imgTest;

console.log("v_file:" + v_file);
console.log("v_preview" + imgBlurred);

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
        setTimeout(sb_setBackgroundPosition, 10);
    }
    reader.readAsDataURL(this.files[0]);


});

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
/*
function sb_onPreLoad() {
    imgTest = sb_getImagePortion(imgTest, 150, 150, startX, startY, 1);
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
    var dataurl = tnCanvas.toDataURL();
    console.log(dataurl);
    return tnCanvas.toDataURL();
}

/*
v_file.addEventListener('change', function (file) {
    console.log(file);
    let reader = new FileReader();
    reader.onload= function(e){
        //v_preview.src = e.target.result;
        console.log(e);
        f_openPopUpImg(e,800,800);
    }
reader.readAsDataURL(this.files[0]);
});

function f_openPopUpImg(e,height,width){
    popup_top=((screen.height-100)/2);
    popup_left=((screen.width)/2);
    window.open(e.target.result,"decoupage","top="+popup_top+", left="+popup_left+", height="+height+", width="+width);
}


v_file.addEventListener('change', f_loadPreview, false);

function f_loadPreview(input) {
    console.log("fonction:"+input);
    if (input.files && input.files[0]) {
        let v_reader = new FileReader();

        reader.onload = function(e) {
            v_preview.getAttribute('src', e.target.result);
        };
        v_reader.readAsDataURL(input.files[0]);

    }
}
*/