document.addEventListener('DOMContentLoaded', function () {
    
    var buttons = document.querySelectorAll('.btn-copy');

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
   
            var consulta = button.getAttribute('data-consulta');
            var hiddenInput = document.createElement('textarea');
            hiddenInput.value = consulta;
            document.body.appendChild(hiddenInput);

            hiddenInput.select();
            hiddenInput.setSelectionRange(0, 99999); 

            try{
                document.execCommand('copy');
                button.style.backgroundColor = '#8ACDD7';
                setTimeout(function () {
                    button.style.backgroundColor = '#D0D4CA'; 
                }, 500);
            }catch(err){
                alert('Error al intentar copiar');
            }

            document.body.removeChild(hiddenInput);
            
        });
    });
});