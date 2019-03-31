$(function() {
  $("#profile").validate({
    
    rules: {
      name: "required"
    },
    messages: {
      name: "Please enter your firstname"
      
    }
  });
});