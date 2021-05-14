$(document).ready(function(e) {
    var table_size = $("input[name=table_size]").val();
    table_size=Number.parseInt(table_size);
    state = 0;
    //state = 0 is game is running
    //state = 1 is out of turn
    //state = 2 is user winning.
    var turn=0;
    reclick_td =[];
    WIN = [];
    var myJsonString= {
        "data":[]
      };
    
    // Table draw function
    // $( "#sizeSubmit" ).click(function() {
    //     var table ='';
    //     table_size = $('#size_table').val();

    //     if(!$.isNumeric(table_size))
    //         alert("Please input only 0-9")
    //     if(table_size<3){
    //         alert("That size is too small.\nRequire bigger size")
    //     }
    //     else{
    //         parseInt(table_size);
    //         for(r=1;r<=table_size;r++){
    //             table+='<tr>';
    //             for(c=0;c<table_size;c++){
    //                 table+= '<td>'+'</td>';
    //             }
    //             table+='</tr>';
    //         }
    //         turn = 0;
    //         $("#main_table").html('<table>' + table + '</table>');
    //     }
    // });


    //Change tick by turn function
    $(document).on("click","#main_table td",function() {
            // alert(myJsonString.id+myJsonString.data);
            //Reclick prevent
            //Turn won't count up and charractor won't chang if user click same tile
            if(reclick_td.includes($(this).attr("id"))==false&&state==0){
                //Change tick by turn
                    if(turn%2==0){
                        $(this).html("X");
                        $(this).val("X");
                    }
                    else{
                        $(this).html("O");
                        $(this).val("O");
                    }
                    reclick_td.push($(this).attr("id"));
                    turn++;
            }
            //Out of turn
            else if(turn==table_size*table_size){
                state = 1;
                $("table").attr("disabled")
                alert("Game was END");
            }


        //Win condition check Part
            index=0; //use as WIN array index because i use for id index

            // array for using prepare
            for(i=1;i<=table_size;i++){
                for(x=0;x<table_size;x++){
                    WIN.splice(index, 1, $('#'+(i*10+x)).val());

                    //contain data with JSON
                    myJsonString.data.splice(index, 1, $('#'+(i*10+x)).val());
                    // myJsonString.data.replaceAll("","N")
                    index++;
                }
            }
            //CheckLoop for Horizental
            for(i=0;i<(table_size*table_size);i+=table_size){   //Row driving
                if(state!=2){
                    if(WIN[i]=="X"&&WIN[i+1]=="X"&&WIN[i+2]=="X"){
                        state = 2;
                        alert("Player X win");
                        //contain array to JSON 
                        // myJsonString = JSON.stringify(WIN);
                        console.log(myJsonString);
                        break;
                    }
                    if(WIN[i]=="O"&&WIN[i+1]=="O"&&WIN[i+2]=="O"){
                        state = 2;
                        alert("Player O win");
                        break;
                    }
                }
                else if(state!=2){
                    break;
                }
            }
            //CheckLoop for Vertical
            for(i=0;i<table_size;i+=1){   //Column driving 
                if(state!=2){
                    if(WIN[i]=="X"&&WIN[i+table_size]=="X"&&WIN[i+table_size*2]=="X"){
                        state = 2;
                        alert("Player X win");
                        break;
                    }
                    if(WIN[i]=="O"&&WIN[i+table_size]=="O"&&WIN[i+table_size*2]=="O"){
                        state = 2;
                        alert("Player O win");
                        break;
                    }
                }
                else if(state!=2){
                    break;
                }
            }
            //CheckLoop for Diagonall
                for(x=0;x<table_size;x+=1){   //Column driving 
                if(state!=2){
                    if(WIN[0]=="X"&&WIN[4]=="X"&&WIN[8]=="X"||WIN[2]=="X"&&WIN[table_size+1]=="X"&&WIN[6]=="X"){
                        state = 2;
                        alert("Player X win");
                        break;
                    }
                    if(WIN[0]=="O"&&WIN[4]=="O"&&WIN[8]=="O"||WIN[2]=="O"&&WIN[table_size+1]=="O"&&WIN[6]=="O"){
                        state = 2;
                        alert("Player O win");
                        break;
                    }
                }else if(state!=2){
                    break;
                }
            }


            //Replace all empty value with "N" for convenience in download replay section
            for(i=0;i<=9;i++){
                if(myJsonString.data[i]==""){
                     myJsonString.data.splice(i, 1, "N");
                }
            }
            if(state==2){
                $('#savegame').removeAttr('disabled');
            }
    });
    //SAVE button
    $( "#savegame" ).click(function() {
        $('[name="data"]').val(myJsonString.data);
        alert( $('[name="data"]').val());
      });

    //Play again button
    $( "#playAgain" ).click(function() {
        location.reload();
      });


    //LOAD replay
    $('[name="replay_list"]').click(function() {
        load_data = $(this).attr('id').replaceAll(",","");
        // alert(load_data.charAt(0));
        for(i=0;i<9;i++){
            if(load_data[i]=="N")
                $('#'+i).html("")
            else
                $('#'+i).html(load_data.charAt(i))
        }
    });
   
});

// @foreach ($replays as $replay)
//                 <tr>
//                     <td id = "10">  {{$replay['data']}}</td>
//                     <td id = "11">  </td>
//                     <td id = "12">  </td>
//                 </tr>
//                 @endforeach