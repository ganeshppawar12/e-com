<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel</title>
</head>
<body>



<div>

<div style="display: flex ; align-items: center; gap: 10px; ">
    <button id="leftBth"style="z-index: 1;"  > &lt; </button>

    <div style="width: 400px; overflow: hidden; border: 1px solid black; ">
        <div id="imageBox" style="display: flex; transition: .4s ease-in ; " >

        </div>
    </div>
    <button  id="rightBtn" style="z-index: 1;" >&gt;</button>
</div>

<div style="display: flex;" >
    <p>Infinite scroll</p>
    <input type="checkbox" id="infinity" >
</div>
<div style="display: flex;">
    <p>Autoplay</p>
    <input type="checkbox" id="autoplay" >
</div>
<div>
    <input min="1000" max="10000"  step="1000" type="range" id="range" >
</div>
</div>


<script>

    ImageArr = [
        {
            id : 1,
            imageUrl : "https://images.unsplash.com/photo-1481349518771-20055b2a7b24?q=80&w=2139&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        },
        {
            id:2,
            imageUrl : "https://images.unsplash.com/photo-1494253109108-2e30c049369b?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8cmFuZG9tfGVufDB8fDB8fHww"
        },
        {
            id:3,
            imageUrl : "https://images.unsplash.com/photo-1513542789411-b6a5d4f31634?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHJhbmRvbXxlbnwwfHwwfHx8MA%3D%3D"
        },
        {
            id :4,
            imageUrl : "https://images.unsplash.com/photo-1613336026275-d6d473084e85?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzZ8fHJhbmRvbXxlbnwwfHwwfHx8MA%3D%3D"
        }
    ]

    const imageBox =document.getElementById('imageBox');
    const leftBth =document.getElementById('leftBth');
    const rightBtn = document.getElementById('rightBtn');
    const infinity = document.getElementById('infinity');
    const autoplay = document.getElementById('autoplay');
    const range = document.getElementById('range');
    let add = 0;
    let intervalId;
    let setInterTime = 1000;

    let images = "";
    ImageArr.forEach(item => {
        
        images += `
        
        <img src='${item.imageUrl}' width='400' loading='lazy' >
        
        `
    });

    imageBox.innerHTML = images;


    leftBth.addEventListener('click' ,moveLeft )

    rightBtn.addEventListener('click' , ()=>{
     if(!infinity.checked){   
       if(add > 0){
         add--;
       }
    }else{
        if(add == 0){
            add = 3;
        }else{
             add--
        }
    }
       console.log(add);
       leftBth.disabled =  add == 1
      imageBox.style.transform = `translateX(${ -400 * add }px)`;

   } )


 function moveLeft(){
    
        if(!infinity.checked){
        if(add < 3){
          add++;
        }}else{
            if(add == 3){
                add = 0;
            }else{

                add++;
            }
        }
       

 imageBox.style.transform = `translateX(${ -400 * add}px)`;


   }
   autoplay.addEventListener('change', () => {
    if (autoplay.checked) {
        if (add < 4) {
            intervalId = setInterval(() => {
              
                if(infinity.checked){
                if(add == 3)add = -1;}
                 moveLeft();
            }, setInterTime);
        }
    } else {
        clearInterval(intervalId);
    }
});


range.addEventListener('change', ()=>{
    setInterTime = range.value;

})



</script>
    
</body>
</html>