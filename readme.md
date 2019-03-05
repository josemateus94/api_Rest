1 - Executar composer update.

2 - Configura o arquivo .env.

3 - Executar Migratios.

4 - Executar os Sedders

itens obrigatorios	-> category_id, name, prince

itens opcional		-> description, image

Logar no sistema
Metodo post /api/v1/auth
    Ex:
    
    $.ajax({
        method: "POST",
        url: "/api/v1/auth",
        dataType: 'json',
        data : {
            email : "",
            password :'',            
        },
        success: function(data){
            console.log(data);                    
        },
        error: function(error){                    
            console.log(error.responseJSON.errors.name[0]);
        }
    });

Lista todos os produtos por paginação.
Metodo = get|	/api/v1/product
    Ex:
    
	$.ajax({
        method: "GET",
        url: "/api/v1/product/",
        dataType: 'json',
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", "Bearer " + token);
        },
        success: function(data){
            console.log(data);                    
        },
        error: function(error){                    
            console.log(error);
        }
    });

Cria itens produtos
Metodo = post|	/api/v1/product
    Ex:
    
	$.ajax({
        method: "POST",
        url: "/api/v1/product/",
        dataType: 'json',
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", "Bearer " + token);
        },
        data : {
            name : "HD",
            price :350,
            category_id : 2,
        },
        success: function(data){
            obj = JSON.parse(data);
            console.log(obj);
            console.log(data);                    
        },
        error: function(error){                    
            console.log(error.responseJSON.errors.name[0]);
        }
    });

Editar produtos - O orimeiro itens seria o id do produto.
Metodo = put|	/api/v1/product -> exe: /api/product/23?name=Teclado&description=Ola Mundo teste&price=59.99&category_id=1
    Ex:
    
	$.ajax({
        method: "PUT",
        url: "/api/v1/product/"+17,
        dataType: 'json',
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", "Bearer " + token);
        },
        data : {
            name : "Maria02",
            price :350,
            category_id : 2,
        },
        success: function(data){
            console.log(data);                    
        },
        error: function(error){                    
            console.log(error.responseJSON.errors.name[0]);
        }
    });

Deleta o item desejado - O orimeiro itens seria o id do produto.
Metodo delete|	/api/v1/product -> exe : /api/product/23 
    Ex:
    
 	$.ajax({
        method: "DELETE",
        url: "/api/v1/product/"+3,
        dataType: 'json',
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", "Bearer " + token);
        },
        success: function(data){
            console.log(data);                    
        },
        error: function(error){                    
            console.log(error.responseJSON.errors.name[0]);
        }
    });

pesquisa o produto desejado - O orimeiro itens seria o id do produto.
Metodo get|	/api/v1/product -> exe : /api/product/2 
    Ex:
    
	$.ajax({
        method: "GET",
        url: "/api/v1/product/"+4,
        dataType: 'json',
        beforeSend: function (xhr) {
            xhr.setRequestHeader ("Authorization", "Bearer " + token);
        },
        success: function(data){
            console.log(data);                    
        },
        error: function(error){                    
            console.log(error.responseJSON.errors.name[0]);
        }
    });	
    
