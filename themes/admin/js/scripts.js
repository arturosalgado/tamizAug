$(document).ready(function(){
    
    $("#excel").click(function(){
        
       location.href = $(this).attr("href");
        
    });
    var list_jurisdictions =  site_url+"/catalogs/export/jurisdictionmodel/";
   
   
    $('#tamiz-form').submit(function(){
        
        //var edo = $("#estados").attr('data-autocomplete');
        var act = $("#estados").val();
        //alert(act)
        var f_edo = false; 
        for(var e in estados)
        {
          //  alert(estados[e])
          if (estados[e]==act)
          {
              f_edo = true;
          }
        }
        //alert("edo "+f_edo);
        if (!f_edo){
            
            alert("El estado no esta en la lista de estados permitidos");
            return false;
        }
        
        var jurs = $("#jurisdiccion").val();
        //alert(jurs);
        var f_jurs = false;
        //alert(jurisdicciones);
        for(var j in jurisdicciones)
        {
            if (jurisdicciones[j]==jurs)
            f_jurs = true;
        }
        
        if (!f_jurs)
        {
            alert("La jurisdiccion no esta en la lista de jurisdicciones permitidas");
            return false;
        }
        
        
        var unit = $("#unidad_clinica").val();
        //alert(jurs);
        var f_cli = false;
        //alert(jurisdicciones);
        for(var u in unidades)
        {
            if (unidades[u]==unit)
            f_cli = true;
        }
        
        if (!f_cli)
        {
            alert("La unidad no esta en la lista de unidades permitidas");
            return false;
        }
        
    }); 
    
   
    
});
