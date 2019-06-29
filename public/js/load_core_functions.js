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
}
catch(err){
  console.log(err.message);
}