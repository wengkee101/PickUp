const slidehowImages = document.querySelectorAll(".intro .review_img");

const nextImageDelay = 3000;
let currentImageCounter = 0;

// slidehowImages[currentImageCounter].style.display = "block";
slidehowImages[currentImageCounter].style.opacity = 1;
setInterval(nextImage, nextImageDelay);

function nextImage(){
    // slidehowImages[currentImageCounter].style.display = "none";
    // slidehowImages[currentImageCounter].style.opacity = 0;
    slidehowImages[currentImageCounter].style.zIndex = -2;
    const tempCounter = currentImageCounter;
    setTimeout(() => {
        slidehowImages[tempCounter].style.opacity = 0;
    }, 1000);
    currentImageCounter = (currentImageCounter + 1) % slidehowImages.length;
    // slidehowImages[currentImageCounter].style.display = "block";
    slidehowImages[currentImageCounter].style.opacity = 1;
    slidehowImages[currentImageCounter].style.zIndex = -1;
}