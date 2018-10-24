$(document).ready(function(){
  // CKEditor
    ClassicEditor
    .create(document.querySelector( '#body' ) )
    .catch(error => {
        console.error(error );
    });
    
  // Select all posts
  $('#selectAll').click(function(event) {
    if(this.checked) {
      $('.checkBoxes').each(function() {
        this.checked = true;
      })
    } else {
      $('.checkBoxes').each(function() {
        this.checked = false;
      })
    }
  });
  
  /*
  // Loader
  var abody = document.body;
  
  var loadscreen = document.createElement('div');
  loadscreen.setAttribute("id", "load-screen");

  loadscreen.innerHTML = '<div id="loading"></div>';
  abody.appendChild(loadscreen);
  
  $('#load-screen').delay(1000).fadeOut(600, function() {
     $(this).remove();
  });
  */
});
