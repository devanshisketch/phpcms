
  
  const inputs = document.querySelectorAll('.stock');
  inputs.forEach(input => {
    input.addEventListener('change', function () {
        const stock = this.value;
        stk = this.value;
        pid=this.dataset.id;
       stk = stock;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            //document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "ajx.php?sty=" + stk+"&id="+pid, true);
        xmlhttp.send();
      
      
      console.log('Quantity sent:', stk);
      console.log('Product ID:', pid);
    });
  });