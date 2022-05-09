
function set_document_by_id_value(id,valeur){
    return document.getElementById(id).innerText = valeur
}

var host =window.location.origin
var data = {request :document.getElementById('sonde_o')};
setInterval(function (){
    $.ajax({
        type:"GET",
        url:host+"/JsonValue" ,
        dataType: 'json',
        data:data,
        success: function (result){
            set_document_by_id_value('sonde_oxygen',result['oxygen']);
            set_document_by_id_value('sonde_niveau',result['niveau']);
            set_document_by_id_value('sonde_pump',result['pression']);


            if (result['f_on'] === true){
                set_document_by_id_value('bobine_filtre','ON');
            }else{
                set_document_by_id_value('bobine_filtre','OFF');
            }

            if (result['a_off'] === true){
                set_document_by_id_value('bobine_alarm','ON')
            }else {
                set_document_by_id_value('bobine_alarm','OFF')
            }

            if (result['p_on'] === true){
                set_document_by_id_value('bobine_pump','ON')
            }else{
                set_document_by_id_value('bobine_pump','OFF')
            }


            document.getElementById('message_filtre').hidden = result['f_on'] === true;

            document.getElementById('message_alarm').hidden = result['niveau'] <= 2;

            document.getElementById('message_pompe').hidden = result['p_on'] === true;
        }
    })

},4000)
