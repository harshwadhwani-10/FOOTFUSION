// const crossbtn = [...document.querySelectorAll(".cross")];
// const dropitem = [...document.querySelectorAll(".drop")];
// let containerWidth = screen.width;

// console.log(containerWidth);
// if (containerWidth <= 600) {
//     dropitem.forEach((item, i) => {
//         dropitem[i].style.display="none";
//         crossbtn[i].addEventListener('click', () => {
//             console.log("btn clicked");
//             dropitem[i].style.display="none";
//         })
//     })
// }
const crossBtn = document.getElementsByClassName("cross");

for (let i = 0; i < crossBtn.length; i++) {
    crossBtn[i].onclick = function () {
        console.log("btn clicked");
        const mdrop = document.getElementsByClassName("drop")[i];
        const computedStyle = window.getComputedStyle(mdrop);
        
        console.log(computedStyle.visibility);
        
        if (computedStyle.visibility === "visible") {
            mdrop.style.visibility = "hidden";
        }
    }
}
        
        // readMoreParagraph.style.visibility = "hidden";
        // readMoreParagraph.style.display = "none";
        // readMoreParagraph.classList.toggle("hidden");
        // mdrop.classList.add("hide");
        // mdrop.classList.remove("hide");
    //     for(let j=0;j<mdrop.classList.length;j++){
    //         if()
    //     }
    // {
    //     var arr=Array.from(mdrop.classList);
    //     console.log(Array.from(mdrop.classList));
    //     var flag=false;
    // //         mdrop.classList.add="hide";
    // for(let j=0;j<arr.length;j++){
    //             if(arr[j]==="hide"){
    //                 var flag=true;
    //             }
    // }
   
    // for (i = 0; i < crossbtn.length; i++) {
        
    //     crossbtn[i].onclick = function () {
    //         dropitem.style.display = "none";
    //         console.log("Menu button clicked");
    //     };

