  
 $(document).ready(function(){
    $('.dd input').change(function () {
      $('.dd p').text(this.files.length + " file(s) selected");
    });
  });
      
 
 