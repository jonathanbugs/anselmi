<html>
    <head>
        <title>Checkout Transparente</title>
        <meta name="author" content="Moip Pagamentos S/A" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <script type="text/javascript">
            var funcaoSucesso = function(data){
                alert('Sucesso\n' + JSON.stringify(data));
                /*window.open(data.url);*/
            };
 
            var funcaoFalha = function(data) {
                alert('Falha\n' + JSON.stringify(data));
            };
 
            pagarMoip = function() {

            	$.post("moip.php", { "idPedido": "1" },
			        function(data){
			        if(data.cod == 'sucesso'){
			        	
			        	var retorno = data.cod; 

			        	$("#MoipWidget").attr('data-token', data.token);
			        	
			        	var settings = {
										    "Forma": "CartaoCredito",
										    "Instituicao": "Visa",
										    "Parcelas": "6",
										    "Recebimento": "Parcelado",
										    "CartaoCredito": {
										        "Numero": "4073020000000002",
										        "Expiracao": "12/15",
										        "CodigoSeguranca": "123",
										        "Portador": {
										            "Nome": "Nome Sobrenome",
										            "DataNascimento": "30/12/1987",
										            "Telefone": "(11)3165-4020",
										            "Identidade": "222.222.222-22"
										        }
										    }
										}
		                if(retorno == "sucesso"){
		                	MoipWidget(settings);
		                }   
			        
			        } else {
			            alert('erro');
			        }
			    }, "json");

                
            }
        </script>
    </head>
    <body>
        <div id="MoipWidget"
             data-token=""
             callback-method-success="funcaoSucesso"
             callback-method-error="funcaoFalha"></div>
        <button id="pagarMoip" onclick="pagarMoip()"> Pagar </button>
    </body>
    <script type='text/javascript' src='https://desenvolvedor.moip.com.br/sandbox/transparente/MoipWidget-v2.js' charset='ISO-8859-1'></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</html>
