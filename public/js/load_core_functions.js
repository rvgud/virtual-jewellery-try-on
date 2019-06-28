try {
      var active_item="galssimagediv_head";
      var j=jQuery.noConflict();
        var front_uploaded_flag=false;
        var side_uploaded_flag=false;
        var global_view ="Front";
        var video_streaming=false;
        var tryOnImgUrl='';
        var tryOnSideImgUrl='';
        var productid='';
        function convert_canvas(){
          var link=document.getElementById("linkimage");
          html2canvas(document.getElementById("image_download")).then(function(canvas) {
          var dt = canvas.toDataURL('image/png').replace("image/png", "image/octet-stream");
          link.href = dt;
          link.setAttribute("download","Face.png");
        });
            
      }
        j( function() {
    j( "#galssimagediv" ).draggable();
    j( "#TryOnModal-dialog" ).draggable();
    j( "#galssimagediv" ).resizable();
    j( "#galssimagediv_neck" ).draggable();
    j( "#galssimagediv_neck" ).resizable();
    j( "#galssimagediv_ear_2" ).draggable();
    j( "#galssimagediv_ear_2" ).resizable();
    j( "#galssimagediv_head" ).draggable();
    j( "#galssimagediv_head" ).resizable();

            
  } );
        function setActiveItem(active_div)
        {
          active_item=active_div;
          console.log(active_item);
        }
        
        rotate=0;
      
        
        function rotate_right(){
            rotate=rotate+1;

            document.getElementById(active_item).style.webkitTransform="rotate("+rotate+"deg)";
            
}
        function rotate_left(){
             rotate=rotate-1;
            document.getElementById(active_item).style.webkitTransform="rotate("+rotate+"deg)";
            
}
        function zoom_out(){
            var width= j(active_item).width();
            j(active_item).width( width - (width * 0.05)) ;
           
        }
        function zoom_in(){
            var width= j(active_item).width();
            j(active_item).width( width + (width * 0.05)) ;
            
        }
        function show_side(anchor){
            var front_uploaded = j('#front_uploaded');
            var side_uploaded = j('#side_uploaded');
            var main_image = j('#imageCanvas');
            var view=j(anchor).text();
            if(view=='Side'){
                global_view='Side';
                front_uploaded.css('display','none');
                if(video_streaming==false){
                    if(side_uploaded_flag==true){
                        main_image.css('display','none');
                        side_uploaded.css('display','block');
                        }
                    else{
                        main_image.css('display','block');
                        document.getElementById('imageCanvas').src='<?php echo plugins_url();?>'+'/try_on_woocommerece-Premium/public/images/side_man.jpg';
                    }
                }
                document.getElementById('galssimage').src=tryOnSideImgUrl;
                j('#side_btn').html('Front');
            }
            else{
                global_view='Front';
                side_uploaded.css('display','none');
                if(video_streaming==false){
                    if(front_uploaded_flag==true){
                        main_image.css('display','none');
                        front_uploaded.css('display','block');
                        }
                    else{
                     main_image.css('display','block');
                        document.getElementById('imageCanvas').src='<?php echo plugins_url();?>'+'/try_on_woocommerece-Premium/public/images/man_face.jpg';
                    }
                }
                document.getElementById('galssimage').src=tryOnImgUrl;
                j('#side_btn').html('Side');
            }
        }
       
        function save_image(el){
            j(el).css("display","none");
            var download_link=j("#linkimage");
            download_link.css("display","inline-block");
            convert_canvas();
        }
        function show_save(el){
            j(el).css("display","none");
            var download_link=j("#save_btn");
            download_link.css("display","inline-block");
        }
        function upload(){
          console.log("click");
            j("#imageLoader").click();
        }
}
catch(err){
  console.log(err.message);
}

try{
 function handleImage(e){
                    var video = j("#video");video.css("display","none");
                    video_streaming=false;

                     var canvas1 = j("#imageCanvas");
                      var front_uploaded=j("#front_uploaded");
                    var reader = new FileReader();
                    reader.onload = function(event){        
                        var img_uploaded_front = new Image();
                        img_uploaded_front.onload = function(){
                            canvas1.css("display","none");
                            
                                front_uploaded.css("display","block");
                                front_uploaded.attr("src",img_uploaded_front.src);
                  
                            convert_canvas();
                            var download_link=j("#save_btn");
                            download_link.css("display","inline-block");
                        }
                    img_uploaded_front.src = event.target.result;
                    convert_canvas();
                    }
                    reader.readAsDataURL(e.target.files[0]);     
                }
                
               
  }
catch(err){
  console.log(err.message);
}
try{     
        navigator.getUserMedia = ( navigator.getUserMedia ||
                             navigator.webkitGetUserMedia ||
                             navigator.mozGetUserMedia ||
                             navigator.msGetUserMedia);

      var video_stream;
      var webcamStream;

      function startWebcam() {

        if (location.protocol == 'https:')
{
 alert("WebCam is not allowed for http websites due to security reasons.Please switch to https for using webcam.");
}
else{       
            
            video_streaming=true;
            var save_btn=j("#save_btn");
            var download_btn=j("#linkimage");
            var capture_btn=j("#capture_btn");
            download_btn.css("display","none");
            save_btn.css("display","none");
            capture_btn.css("display","block");
            var canvas1 = j("#imageCanvas");
            var front_uploaded = j("#front_uploaded");
            var side_uploaded = j("#side_uploaded");
            var video = j("#video");
            canvas1.css("display","none");
            front_uploaded.css("display","none");
            side_uploaded.css("display","none");
            video.css("display","block");
        if (navigator.getUserMedia) {
           navigator.getUserMedia (

              // constraints
              {
                 video: true,
                 audio: false
              },

              // successCallback
              function(stream) {
                  video_stream = document.querySelector("video");
                 video_stream.srcObject = stream;
                 webcamStream = stream;
              },

              // errorCallback
              function(err) {
               video_streaming=false;
               //if any error comes then video streaming will not be shown
               video.css("display","none");
                 console.log("The following error occured: " + err);
              }
           );
        } else {
        video_streaming=false;
           console.log("getUserMedia not supported");
        }  
      }
}
      function stopWebcam() {
          webcamStream.stop();
      }
      //---------------------
      // TAKE A SNAPSHOT CODE
      //---------------------
      
      

      function snapshot() {
        var neck= j("#galssimagediv_neck").css("display","block");
             var ear2= j("#galssimagediv_ear_2").css("display","block");
               var ear= j("#galssimagediv").css("display","block");
              var head= j("#galssimagediv_head").css("display","block");
        var save_btn=j("#save_btn");
            var download_btn=j("#linkimage");
            var capture_btn=j("#capture_btn");
            download_btn.css("display","none");
            capture_btn.css("display","none");
           save_btn.css("display","block");
      video_streaming=false
            var canvas1 = j("#imageCanvas");
            var front_uploaded = j("#front_uploaded");
            var side_uploaded = j("#side_uploaded");
          var c1=j("#c");
         // Draws current image from the video element into the canvas
          var canvas = document.getElementById("c");
          var v1=document.getElementById("video");
          var wid=v1.offsetWidth;
         var het=v1.offsetHeight;
         canvas.height=het;
         canvas.width=wid;
          document.getElementById("video").style.display="none";
         // canvas.getContext("2d").drawImage(video_stream, 0, 0, 480,630,0,0,350,400);
          canvas.getContext("2d").drawImage(video_stream,5,5,wid,het);
          var src1=canvas.toDataURL("image/png");
          if(global_view=="Front"){
                front_uploaded_flag=true;
                side_uploaded.css("display","none");
                canvas1.css("display","none");
                front_uploaded.css("display","block");
                front_uploaded.attr("src",src1);
            }
            else{
                side_uploaded_flag=true;
                front_uploaded.css("display","none");
                canvas1.css("display","none");
                side_uploaded.css("display","block");
                side_uploaded.attr("src",src1);
            }
            
            convert_canvas();
            var download_link=j("#download_btn");
            download_link.css("display","inline-block");
           
      }

      j("#imageLoader").ready(function(){
        console.log("hello");
         	var imageLoader = document.getElementById('imageLoader');
            imageLoader.addEventListener('change', handleImage, false);
            var canvas1 = j("#imageCanvas");
            var front_uploaded = j("#front_uploaded");
            var side_uploaded = j("#side_uploaded");
            var view=j("#side_btn").text();
}); 
      }
catch(err){
  console.log(err.message);
}