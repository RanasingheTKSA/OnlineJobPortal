function passvalue()
{
    var Total = document.getElementById ("Total").Value;
    localStorage.setItem ("textvalue",Total);
    return false;

} 


function enableButton()
{
	if (document.getElementById("policy").checked)
	{
		document.getElementById("button").disabled = false;
	}
	else 
	{
		document.getElementById("button").disabled = true;
	}
}
