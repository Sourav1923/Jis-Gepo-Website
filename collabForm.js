document.getElementById('collaboratorForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
   
    const name = document.getElementById('name').value;
    const organization = document.getElementById('organization').value;
    const country = document.getElementById('country').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    
    if (name && organization && country && phone && email && message) {
     
        document.getElementById('responseMessage').innerText = 'Thank you for your submission, ' + name + '!';
        document.getElementById('responseMessage').style.color = '#28a745'; 

        
        document.getElementById('collaboratorForm').reset();
    } else {
    
        document.getElementById('responseMessage').innerText = 'Please fill in all fields.';
        document.getElementById('responseMessage').style.color = '#dc3545'; 
    }
});