function checkNumber(textBox)
{
  var x=textBox.value;
  if (isNaN(x)) 
  {
    alert("Input incorrect");
    return false;
  }
}

    function display(tab,ntab) 
    {
      var test = document.getElementById(tab).style.display;
      if (test == "none") 
      {
        document.getElementById(ntab).style.display = "none";
        document.getElementById(tab).style.display = "block";      
      }
    }

