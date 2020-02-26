
    /* ao clicar na div com id="padrao" executa a função */
  $("#padrao").click(function(){
    
    /* a função muda o background da div com id="sidebar e assim por diante" */  
    $("#sidebar").css("background","#A9A9A9");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#696969");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#696969");

    var divConteudo = ["#A9A9A9","#000000","#696969","#000000"];
    console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

   $("#azul").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#1E90FF");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#000080");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#000080");

var divConteudo = ["#1E90FF","#000000","#000080","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

    $("#verde").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#228B22");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#006400");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#006400");

var divConteudo = ["#228B22","#000000","#006400","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

$("#amarelo").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#F0E68C");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#FFD700");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#FFD700");

var divConteudo = ["#F0E68C","#000000","#FFD700","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

$("#vermelho").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#B22222");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#8B0000");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#8B0000");

var divConteudo = ["#B22222","#000000","#8B0000","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

$("#anil").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#20B2AA");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#008080");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#008080");

var divConteudo = ["#20B2AA","#000000","#008080","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

$("#marrom").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#A0522D");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#8B4513");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#8B4513");

var divConteudo = ["#A0522D","#000000","#8B4513","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

$("#oliva").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#6B8E23");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#556B2F");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#556B2F");

var divConteudo = ["#6B8E23","#000000","#556B2F","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

$("#areia").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#FFDEAD");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#D2B48C");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#D2B48C");


var divConteudo = ["#FFDEAD","#000000","#D2B48C","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

$("#lilas").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#BA55D3");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#4B0082");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#4B0082");

var divConteudo = ["#BA55D3","#000000","#4B0082","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

$("#rosa").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#FF69B4");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#C71585");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#C71585");

var divConteudo = ["#FF69B4","#000000","#C71585","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });

$("#laranja").click(function(){
    
    /* a função muda o background da div com id="box" */  
    $("#sidebar").css("background","#FF8C00");
    $(".ulSidebar").css("color","#000000");
    $("#sidebar-header").css("background","#FF4500");
    $("#sidebar-header").css("color","#000000");
    $("#logoff").css("background","#FF4500");

var divConteudo = ["#FF8C00","#000000","#FF4500","#000000"];
console.log(divConteudo);

            $.ajax({
                type: 'POST',
                url: 'validacoes/validaConf.php',
                data: {divConteudo},
                success: function(data) {
                   // alert(data);
                }
            });

  });