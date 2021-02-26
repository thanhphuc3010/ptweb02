var a;
function show_hide() 
{
    if (a == 1)
        {
            document.getElementById("dropbox").style.display="block";
            return  a = 0;
        }
    else 
        {
            document.getElementById("dropbox").style.display="none";
            return  a = 1;
        }
}