//start object animation in home
document.addEventListener("DOMContentLoaded", function() {
    var canvas = jQuery("canvas#main");
    var context = canvas.get(0).getContext("2d");
    var canvasWidth = canvas.width;
    var canvasHeight = canvas.height;
    var container = document.getElementById('tlr-head');
    var figuresDefaultQuantity = 25;
    var figuresQuantityMax = 30;
    var mouseAreaRad = 60;
    var figures = [];
    
    var mouseX = 0, 
        mouseY = 0;
    
    window.addEventListener('resize', resizeCanvas, false);
    
    function resizeCanvas(){
        context.canvas.width = window.innerWidth;
        context.canvas.height = window.innerHeight;
        canvasWidth = context.canvas.width;
        canvasHeight = context.canvas.height;
    }
    
    container.addEventListener( 'mousemove', function(e) {
        mouseX = e.x;
        mouseY = e.y;
    });
    container.addEventListener( 'mouseleave', function() {
        mouseX = 0;
        mouseY = 0;
    });
    container.addEventListener( 'mousedown', function(e) {
        var x = e.x;
        var y = e.y;
    
        if (figuresDefaultQuantity < figuresQuantityMax){
            figuresDefaultQuantity = figuresDefaultQuantity + 1;
            var velocityX = Math.random();
            var velocityY = Math.random();
            figures.push(new Figure(x, y, velocityX, velocityY));
        }
    });
    
    function Figure(x, y, velocityX, velocityY) {
        this.x = x;
        this.y = y;
        this.velocityX = velocityX;
        this.velocityY = velocityY;
    };
    function updateFigurePosition(element) {
        var that = element;
        that.x += that.velocityX;
        that.y += that.velocityY;
    
        if (that.x < 0) {
            that.x = 0;
            that.velocityX *= -1;
        } else if (that.x > canvasWidth) {
            that.x = canvasWidth;
            that.velocityX *= -1;
        }
        if (that.y < 0) {
            that.y = 0;
            that.velocityY *= -1;
        } else if (that.y > canvasHeight) {
            that.y = canvasHeight;
            that.velocityY *= -1;
        }
    };
    
    function init() {
        resizeCanvas();
        for (var i = 0; i < figuresDefaultQuantity; i++) {
            var x = Math.random() * canvasWidth;
            var y = Math.random() * canvasHeight;
            var velocityX = Math.random();
            var velocityY = Math.random();
    
            figures.push(new Figure(x, y, velocityX, velocityY));
        }
        animate();
    }
    init();
    
    function animate() {
        update();
        draw();
        requestAnimationFrame(animate);
    }
    
    function update() {
        for (var i = 0; i < figuresDefaultQuantity; i++) {
            var figure = figures[i];
    
            var updateX = figure.velocityX;
            var updateY = figure.velocityY;
            if (figure.x >= mouseX - mouseAreaRad && figure.x <= mouseX + mouseAreaRad && figure.y >= mouseY - mouseAreaRad && figure.y <= mouseY + mouseAreaRad){
                updateX = updateX * (Math.random() < 0.5 ? -1 : 1) + (Math.random() < 0.5 ? -1 : 1);
                updateY = updateY * (Math.random() < 0.5 ? -1 : 1) + (Math.random() < 0.5 ? -1 : 1);
    
                updateX = (updateX < -2) ? -2 : updateX;
                updateX = (updateX > 2) ? 2 : updateX;
                updateY = (updateY < -2) ? -2 : updateY;
                updateY = (updateY > 2) ? 2 : updateY;
    
                figure.velocityX = updateX;
                figure.velocityY = updateY;
            }
    
            updateFigurePosition(figure);
        }
    }
    
    function draw() {
        context.clearRect(0, 0, canvasWidth, canvasHeight);
    
        for (var i = 0; i < figuresDefaultQuantity; i++) {
            var figure = figures[i];
    
            context.beginPath();
            if ( i == 1 || i == 4  || i == 8 || i == 9 || i == 13 || i == 15) {
                context.arc(figure.x, figure.y, 15, 0, Math.PI * 2);
                if ( i == 1  || i == 8 || i == 15) {
                    context.fillStyle = "rgba(209, 159, 167, 0.3)";
                    context.fill();
                    continue
                }
                context.strokeStyle = "rgba(209, 159, 167, 0.3)";
                context.stroke();
                continue
            }
            context.moveTo(figure.x, figure.y);
            if ( i == 2  || i == 6 || i == 11 || i == 16 || i == 19) {
                context.lineTo(figure.x + 30, figure.y - 0);
                context.lineTo(figure.x + 15, figure.y + 30);
            }
            else if ( i == 3  || i == 7 || i == 10 || i == 17 || i == 18) {
                context.lineTo(figure.x + 0, figure.y - 30);
                context.lineTo(figure.x - 30, figure.y - 15);
            }
            else {
                context.lineTo(figure.x + 30, figure.y + 0);
                context.lineTo(figure.x + 15, figure.y - 30);
            }
            context.closePath();
    
            if ( i == 1  || i == 5 || i == 10 || i == 15 || i == 20) {
                context.fillStyle = "rgba(209, 159, 167, 0.3)";
                context.fill();
                context.strokeStyle = "rgba(209, 159, 167, 0.3)";
                context.stroke();
                continue
            }
            context.strokeStyle = "rgba(209, 159, 167, 0.3)";
            context.lineWidth = 0.5;
            context.stroke();
        }
    }
    
}); 

gsap.registerPlugin(ScrollTrigger);

let mm = gsap.matchMedia();

mm.add("(min-width: 1025px)", () => {

var frame_count  = 4,
offset_value = 500;

gsap.to("#swipe-desk-products #tlr-desk", {
backgroundPosition: (20 * frame_count) + "% 0%",
  ease: "steps(" + frame_count + ")", // use a stepped ease for the sprite sheet
  scrollTrigger: {
    trigger: "#prod-scroll",
    start: "top top",
    pin: true,
    end: "+=" + (frame_count * offset_value),
    scrub: true
  }
});


var frame_count  = 4,
offset_value = 500;

gsap.to("#swipe-single-desk #tlr-single-desk", {
backgroundPosition: (25 * frame_count) + "% 0%",
  ease: "steps(" + frame_count + ")", // use a stepped ease for the sprite sheet
  scrollTrigger: {
    trigger: "#prod-scroll",
    start: "top top",
    end: "+=" + (frame_count * offset_value),
    scrub: true
  }
});


gsap.to(".block3-1", {
    yPercent: -40,
    ease: "none",
    scrollTrigger: {
      trigger: "#block3",
      // start: "top bottom", // the default values
      // end: "bottom top",
      scrub: true
    }, 
  });
  
  gsap.to(".block3-2", {
    yPercent: 20,
    ease: "none",
    scrollTrigger: {
      trigger: "#block3",
      // start: "top bottom", // the default values
      // end: "bottom top",
      scrub: true
    }, 
  });

  gsap.to(".block3-3", {
    yPercent: -10,
    ease: "none",
    scrollTrigger: {
      trigger: "#block3",
      // start: "top bottom", // the default values
      // end: "bottom top",
      scrub: true
    }, 
  });
  gsap.to("#block3 .left-text", {
    yPercent: -50, 
    ease: "none",
    scrollTrigger: {
      trigger: "#block3",
      // start: "top bottom", // the default values
      // end: "bottom top",
      scrub: true
    }, 
  });
  
  gsap.set("#block4 .left-part", { x: -100,transitionDuration: "2s" });
  gsap.set("#block4 .center-part", { y: 200,transitionDuration: "3s" });
  gsap.set("#block4 .right-part", { x: 100,transitionDuration: "2s"});


  gsap.to("#block4 .left-part", {
    x: 0, 
    scrollTrigger: {
      trigger: "#block4",
      start: "-100%", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.to("#block4 .center-part", {
    y: 100, 
    scrollTrigger: {
      trigger: "#block4",
      start: "-100%", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.to("#block4 .right-part", {
    x: 0, 
    scrollTrigger: {
      trigger: "#block4",
      start: "-100%", // the default values
      end: "top top",
      scrub: true
      
    }, 
  });

  gsap.to("#block5 .layer-3", {
    yPercent: -10, 
    ease: "none",
    scrollTrigger: {
      trigger: "#block5",
      start: "top bottom", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.to("#block5 .layer-2", {
    xPercent: -17, 
    ease: "none",
    scrollTrigger: {
      trigger: "#block5",
      start: "top top", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.to("#block5 .layer-1", {
    xPercent: 10, 
    ease: "none",
    scrollTrigger: {
      trigger: "#block5",
      start: "top bottom", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.to("#block5 .text-part", {
    xPercent: 10, 
    ease: "none",
    scrollTrigger: {
      trigger: "#block5",
      start: "top bottom", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.to("#block6 .macchia", {
    yPercent: -70,
    xPercent: 10,  
    ease: "none",
    scrollTrigger: {
      trigger: "#block5",
      start: "center bottom", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.to("#block6 .left-block .man-out", {
    yPercent: -20,
    ease: "none",
    scrollTrigger: {
      trigger: "#block6",
      start: "top bottom", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.to("#block6 .spiral", {
    yPercent: -40,
    xPercent: -80,
    ease: "none",
    scrollTrigger: {
      trigger: "#block6",
      start: "top bottom", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.set("#block7 .tlr-elements .right-block", {transitionDuration: "5s",backgroundPosition: "300px 700px", });
  gsap.to("#block7 .tlr-elements .right-block", {
    backgroundPosition: "0% 0%",
    ease: "none",
    scrollTrigger: {
      trigger: "#block7",
      start: "top bottom", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.set("#block7 .last_elem", {transitionDuration: "3s" });
  gsap.to("#block7 .last_elem", {
    y: -130,
    ease: "none",
    scrollTrigger: {
      trigger: "#block7",
      start: "top bottom", // the default values
      end: "top top",
      scrub: true
    }, 
  });

  gsap.set("#block8", {transitionDuration: "3s" });
  gsap.to("#block8", {
    marginTop: -300,
    ease: "none",
    scrollTrigger: {
      trigger: "#block7",
      start: "bottom bottom", // the default values
      end: "300px",
      scrub: true
    }, 
  });


  gsap.set("#block8 .elem-bef", {transitionDuration: "5s" });
  gsap.to("#block8 .elem-bef", {
    y: 400,
    ease: "none",
    scrollTrigger: {
      trigger: "#block8",
      start: "top center", // the default values
      end: "300px",
      scrub: true
    }, 
  });


  gsap.set("#block8 .elem-bef", {transitionDuration: "5s" });
  gsap.to("#block8 .elem-bef", {
    y: 400,
    ease: "none",
    scrollTrigger: {
      trigger: "#block8",
      start: "top center", // the default values
      end: "300px",
      scrub: true
    }, 
  });


  gsap.set("#block9-2 > div.wrap", {transitionDuration: "2s" });
  gsap.to("#block9-2 > div.wrap", {
    y: -130,
    ease: "none",
    scrollTrigger: {
      trigger: "#block8",
      start: "top center", // the default values
      end: "300px",
      scrub: true
    }, 
  });
/*
  gsap.set("#block9-2 > div.wrap .over-man", {transitionDuration: "2s",y: 400,rotation:-50 });
  gsap.to("#block9-2 > div.wrap .over-man", {
    y: 100,
    rotation:0,
    ease: "none",
    scrollTrigger: {
      trigger: "#block9",
      start: "top center", // the default values
      end: "100px",
      scrub: true
    }, 
  });
*/

  gsap.set("#block10 .elements", {transitionDuration: "5s" });
  gsap.to("#block10 .elements", {
    y: -220,
    ease: "none",
    scrollTrigger: {
      trigger: "#block9",
      start: "bottom center", // the default values
      end: "400px",
      scrub: true
    }, 
  });

});
   
mm.add("(max-width: 1024px)", () => {
  
  var frame_count  = 4,
offset_value = 500;

gsap.to("#swipe-single-desk #tlr-single-desk", {
backgroundPosition: (25 * frame_count) + "% 0%",
  ease: "steps(" + frame_count + ")", // use a stepped ease for the sprite sheet
  scrollTrigger: {
    trigger: "#prod-scroll",
    start: "top top",
    end: "+=" + (frame_count * offset_value),
    scrub: true,
    pin:true
  }
});


gsap.set("#block7 .tlr-elements .right-block", {transitionDuration: "5s",backgroundPosition: "300px 700px", });
gsap.to("#block7 .tlr-elements .right-block", {
  backgroundPosition: "0% 0%",
  ease: "none",
  scrollTrigger: {
    trigger: "#block7",
    start: "top bottom", // the default values
    end: "top top",
    scrub: true
  }, 
});


  
  });


  



  jQuery(document).ready(function($){

    $(document).on("click", '#block4 .block-right-text:not(.active)', function(event) { 
        $(".on-demand-block .block-right-text").removeClass("active");
        $(".on-demand-block .on-demand").hide();
        $(this).addClass("active");
       $(".on-demand-block ." + $(this).attr("data-target")).fadeIn();

       mm.add("(max-width: 1024px)", () => {
       $([document.documentElement, document.body]).animate({
        scrollTop: $("#block4 .tlr-container .left-part").offset().top
    }, 0);
      });



    });
    

    $(document).on("click", '.demo_request', function(event) { 
      $(".modal-tlr-form").addClass("active");
      $("body").addClass("not-scroll");
    });

    $(document).on("click", '.modal-tlr-form.tlr.active', function(e) { 
      var container = $(".modal-tlr-form .modal-tlr-container");
 
    if(!container.is(e.target) && container.has(e.target).length === 0){
      $(".modal-tlr-form").removeClass("active");
      $("body").removeClass("not-scroll");
    }
    
    });


    $(document).on("click", '.watch_video', function(event) { 
      $(".modal-tlr-video").addClass("active");
      $("body").addClass("not-scroll");

      if ($(".modal-tlr-video iframe").data('src')) {
        $('.modal-tlr-video iframe').attr("src", $(".modal-tlr-video iframe").attr('data-src'));
        $('.modal-tlr-video iframe').removeAttr('data-src');
      }

    });

    $(document).on("click", '.modal-tlr-video.active', function(e) { 
      $(".modal-tlr-video").removeClass("active");
      $("body").removeClass("not-scroll");
      $('.modal-tlr-video iframe').attr("data-src", $(".modal-tlr-video iframe").attr('src'));
      $('.modal-tlr-video iframe').removeAttr('src');
    });



/*faq_section*/
$(document).on("click", '.accordion-item h3', function(event) { 
  $(this).parent().toggleClass("active");
});
/*faq_section*/
    
  

    
    
    });
    