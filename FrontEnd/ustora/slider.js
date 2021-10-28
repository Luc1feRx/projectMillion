    const slider = document.querySelector(".slider-first");//sliderPrimary
    const sliderMain = document.querySelector(".slider-main");//sliderMain
    const sliderItems = document.querySelectorAll(".slider-item");//items
    const nextBtn = document.querySelector(".slider-next");//button next
    const prevBtn = document.querySelector(".slider-prev");//button prev
    const dotItems = document.querySelectorAll(".slider-dot-item");//dot item
    const sliderLength = sliderItems.length;

    const sliderItemsWidth = sliderItems[0].offsetWidth; //lấy độ rộng của phần tử slider đầu tiên

    let index = 0;
    let positionX = 0;

     // dot
     [...dotItems].forEach((item) => item.addEventListener("click", function(e){
        [...dotItems].forEach((it) => it.classList.remove("active"));
         e.target.classList.add("active");
        const SlideIndex = parseInt(e.target.dataset.index);
        index = SlideIndex;
        positionX = -1 * index * sliderItemsWidth;
        sliderMain.style = `transform: translateX(${positionX}px);`;
    }));

    function HandleSliderChange(direction){
        if(direction === 1){
            if(index >= sliderLength - 1){
                index=sliderLength - 1;
                return;
            };
            positionX = positionX - sliderItemsWidth; //0 - độ rộng của slider
            sliderMain.style = `transform: translateX(${positionX}px);`;
            console.log(positionX)
            index++;
            [...dotItems].forEach((it) => it.classList.remove("active"));
            dotItems[index].classList.add("active");
        }else if(direction === -1){
            if(index <= 0){
                index=0;
                return;
            }
            positionX = positionX + sliderItemsWidth; //0 - độ rộng của slider
            sliderMain.style = `transform: translateX(${positionX}px);`;
            index--;
            [...dotItems].forEach((it) => it.classList.remove("active"));
            dotItems[index].classList.add("active");
        }
    }

    nextBtn.addEventListener("click", function(){
        HandleSliderChange(1);
    });

    prevBtn.addEventListener("click", function(){
        HandleSliderChange(-1);
    });

    setInterval(function(){
        
    }, 3000);