               var nextinput = 0;

                function AgregarCampos(){
                    nextinput++;
                    //campos = '<input type="text" size="20" id="campo' + nextinput + '"&nbsp; name="campo' + nextinput + '"&nbsp; />';
            //$('#tablaSocioeconomica tr:last').after();
                    campos = '<tr id="campo' + nextinput + '">'+
                                '<td> '+
                                '    <select id="cuenta' + nextinput + '" class="form-control" name="cuenta' + nextinput + '">'+
                                '      <option value="0" disabled selected>Seleccione...</option>'+
                                '      <?php for($i = 0; $i < count($this->puc); $i++): ?>'+
                                '        <option value="<?php echo $this->puc[$i]['id']; ?>"><?php echo $this->puc[$i]['codigo']." ".$this->puc[$i]['nombre']; ?></option>  '+        
                                '      <?php endfor;?>'+
                                '    </select> '+
                                '</td> '+
                                '<td> '+
                                '    <input id="nombre' + nextinput + '" type="text" class="form-control" name="nombre' + nextinput + '"  placeholder="Cuenta..." required /> '+
                                '</td> '+
                                '<td> '+
                                '    <input id="valor' + nextinput + '" type="text" class="form-control" name="valor' + nextinput + '"  placeholder="1000" required /> '+
                                '</td> '+
                                '<td> '+
                                '    <select id="naturaleza' + nextinput + '" class="form-control" name="naturaleza' + nextinput + '"> '+
                                '      <option value="0" disabled selected>Seleccione...</option> '+
                                '      <option value="1"> Debito </option>  '+
                                '      <option value="2"> Credito </option>  '+       
                                      
                                '   </select> '+
                                '</td> '+
                            '</tr>';
                    $("#cuentas").append(campos);
                    $("#i").val(nextinput);
                }

                function QuitarCampos(){
                    if (nextinput > 0){

                        $("#campo"+nextinput).remove(); 
                        nextinput--;
                        $("#i").val(nextinput);
                    }
                }

                var debito=0;
                var credito=0;

                function ValidarCuentas(){

                    for (var i = 0; i <= $("#i").val(); i++) {
                        if ($("#naturaleza"+i).val() == '1') {
                            debito = debito + parseInt($("#valor"+i).val(),10);
                        }else{
                            credito = credito + parseInt($("#valor"+i).val(),10);
                        }
                    }

                    if (credito != debito) {
                        alert("Estan desbalanceadas!!  Debito: "+debito+ " Credito: "+credito);
                    }

                    $("#debito").val(debito);
                    $("#credito").val(credito);

                    
                }
