<?php 
$pag = "clientes";
require_once("../conexao.php"); 

@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'usuario'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}

?>

<div class="row mt-4 mb-4">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo Cliente</a>
    <a type="button" class="btn-info btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">+</a>
    
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Bairro</th>
                        <th>Celular</th>
                        <th>Situação</th>
                        <th>Foto</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                   $query = $pdo->query("SELECT * FROM clientes order by id desc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }

                      $nome = $res[$i]['nome'];
                      $bairro = $res[$i]['bairro'];
                      $celular = $res[$i]['celular'];
                      $ativo = $res[$i]['ativo'];
                      $foto = $res[$i]['foto'];
                      $id = $res[$i]['id'];


                      ?>


                      <tr>
                        <td><?php echo $nome ?></td>
                        <td><?php echo $bairro ?></td>
                        <td><?php echo $celular ?></td>
                        <td><?php echo $ativo ?></td>
                        <td><img src="../img/clientes/<?php echo $foto ?>" width="50"></td>

                        <td>
                         <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a> 

                         <a href="index.php?pag=<?php echo $pag ?>&funcao=endereco&id=<?php echo $id ?>" class='text-info mr-1' title='Ver Endereço'><i class='fas fa-home'></i></a>

                         <a target="_blank" title="Gerar Clientes" href="../rel/clientes2.php?id=<?php echo $id ?>" class="text-success mr-1"><i class='fas fa-print'></i></a>

                     </td>
                 </tr>
             <?php }?>





         </tbody>
     </table>
 </div>
</div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Registro";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM clientes where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $nome2 = $res[0]['nome'];
                    $endereco2 = $res[0]['endereco'];
                    $bairro2 = $res[0]['bairro'];
                    $cep2 = $res[0]['cep'];
                    $ufc2 = $res[0]['ufc'];
                    $fone2 = $res[0]['fone'];
                    $celular2 = $res[0]['celular'];
                    $rg2 = $res[0]['rg'];
                    $cpf2 = $res[0]['cpf'];
                    $cnpj2 = $res[0]['cnpj'];
                    $email2 = $res[0]['email'];
                    $data2 =$res[0]['data'];
                    $obs2 = $res[0]['obs'];
                    $ativo2 = $res[0]['ativo'];
                    $foto2 = $res[0]['foto'];


                } else {
                    $titulo = "Inserir Registro";
                    $data2 = date('Y-m-d');


                }


                ?>
                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">

                            <div class="form-group">
                                <label >Nome</label>
                                <input value="<?php echo @$nome2 ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Digite nome">
                            </div>

                            <div class="form-group">
                                <label >Endereço</label>
                                <input value="<?php echo @$endereco2 ?>" type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite endereco">
                            </div>

                            <div class="form-group">
                                <label >Bairro</label>
                                <input value="<?php echo @$bairro2 ?>" type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite bairro">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label >Cep</label>
                                    <input value="<?php echo @$cep2 ?>" type="text" class="form-control" id="cep" name="cep" placeholder="Digite cep">
                                </div>
                            </div>
                           <div class="invalid-tooltip">
        Por favor, informe um estado válido.
      </div>

                            <div class="col-md-6">
                             <div class="form-group">
                                <label >Estado</label>
                                 <select name="ufc" class="form-control" id="ufc">
     
    
    <option>Amazonas</option>                                
    <option>Acre</option>
    <option>Alagoas</option>
    <option>Amapá</option>
    <option>Amazonas</option>
    <option>Bahia</option>
    <option>Ceará</option>
    <option>Distrito Federal</option>
    <option>Espirito Santo</option>
    <option>Goiás</option>
    <option>Maranhão</option>
    <option>Mato Grosso do Sul</option>
    <option>Mato Grosso</option>
    <option>Minas Gerais</option>
    <option>Pará</option>
    <option>Paraíba</option>
    <option>Paraná</option>
    <option>Pernambuco</option>
    <option>Piauí</option>
    <option>Rio de Janeiro</option>
    <option>Rio Grande do Norte</option>
    <option>Rio Grande do Sul</option>
    <option>Rondônia</option>
    <option>Roraima</option>
    <option>Santa Catarina</option>
    <option>São Paulo</option>
    <option>Sergipe</option>
    <option>Tocantins</option>

                                
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                         <div class="form-group">
                            <label >Telefone</label>
                            <input value="<?php echo @$fone2 ?>" type="text" class="form-control" id="fone" name="fone" placeholder="Digite telefone">
                        </div>
                    </div>


                    <div class="col-md-6">
                     <div class="form-group">
                        <label >Celular</label>
                        <input value="<?php echo @$celular2 ?>" type="text" class="form-control" id="celular" name="celular" placeholder="Digite celular">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                 <div class="form-group">
                    <label >Rg</label>
                    <input value="<?php echo @$rg2 ?>" type="text" class="form-control" id="rg" name="rg" placeholder="Digite rg">
                </div>
            </div>

            <div class="col-md-6">
             <div class="form-group">
                <label >Cpf</label>
                <input value="<?php echo @$cpf2 ?>" type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite cpf">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
         <div class="form-group">
            <label >Cnpj</label>
            <input value="<?php echo @$cnpj2 ?>" type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Digite cnpj">
        </div>
    </div>

    <div class="col-md-6">
     <div class="form-group">
        <label >Email</label>
        <input value="<?php echo @$email2 ?>" type="text" class="form-control" id="email" name="email" placeholder="Digite email">
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-6">
     <div class="form-group">
        <label >Ativo</label>
        <select name="ativo" class="form-control" id="ativo">
            <option <?php if(@$ativo2 == 'Ativo'){ ?> selected <?php } ?> value="Ativo">Ativo</option>
            <option <?php if(@$ativo_pessoa2 == 'Inativo'){ ?> selected <?php } ?> value="Inativo">Inativo</option>

        </select>
    </div>
</div>

 <div class="col-md-6">
                 <div class="form-group">
                    <label >Data Cadastro</label>
                    <input value="<?php echo @$data2 ?>" type="date" class="form-control" id="data" name="data" placeholder="data">
                </div>
            </div>
            </div>


<div class="row">
 <div class="form-group col-md-12">
    <label for="message-text" class="col-form-label">Obs:</label>
    <textarea value="<?php echo @$obs2 ?>" type="text" class="form-control" id="obs" name="obs" placeholder=""></textarea>

</div>
</div>
</div>



<div class="col-md-5">
    <div class="form-group">
        <label >Imagem</label>
        <input type="file" value="<?php echo @$foto2 ?>"  class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">
    </div>

    <div id="divImgConta">
        <?php if(@$foto2 != ""){ ?>
            <img src="../img/clientes/<?php echo $foto2 ?>" width="200" height="200" id="target">
        <?php  }else{ ?>
            <img src="../img/clientes/sem-foto.jpg" width="200" height="200" id="target">
        <?php } ?>
    </div>
</div>
</div>







<small>
    <div id="mensagem">

    </div>
</small> 

</div>



<div class="modal-footer">



    <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
    <input value="<?php echo @$cpf2 ?>" type="hidden" name="antigo" id="antigo">
    <input value="<?php echo @$email2 ?>" type="hidden" name="antigo2" id="antigo2">

    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
</div>
</form>
</div>
</div>
</div>






<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja realmente Excluir este Registro?</p>

                <div align="center" id="mensagem_excluir" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>






<div class="modal" id="modal-endereco" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dados do Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php 
                if (@$_GET['funcao'] == 'endereco') {

                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM clientes where id = '$id2' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    $nome3 = $res[0]['nome'];
                    $endereco3 = $res[0]['endereco'];
                    $bairro3 = $res[0]['bairro'];
                    $cep3 = $res[0]['cep'];
                    $ufc3 = $res[0]['ufc'];
                    $fone3 = $res[0]['fone'];
                    $celular3 = $res[0]['celular'];
                    $rg3 = $res[0]['rg'];
                    $cpf3 = $res[0]['cpf'];
                    $cnpj3 = $res[0]['cnpj'];
                    $email3 = $res[0]['email'];
                    $data3 = $res[0]['data'];
                    $obs3 = $res[0]['obs'];
                    $ativo3 = $res[0]['ativo'];
                    $obs3 = $res[0]['obs'];
                    $foto3 = $res[0]['foto'];

                    
                } 


                ?>

                <div class="row">
                    <div class="col-md-7">
                      <span><b>Nome: </b> <i><?php echo $nome3 ?></i><br>
                            <span><b>Telefone: </b> <i><?php echo $fone3 ?></i> <span class="ml-4"><b>Celular: </b> <i><?php echo $celular3 ?></i><br>
                                <span><b>Cpf: </b> <i><?php echo $cpf3 ?></i> <span class="ml-4"><b>Cnpj: </b> <i><?php echo $cnpj3 ?></i><br>
                                    <span><b>Email: </b> <i><?php echo $email3 ?></i> <span class="ml-4"><b>Data Cadastro: </b> <i><?php echo $data3 ?></i><br>
                                     <span><b>Bairro: </b> <i><?php echo $bairro3 ?><br>
                                        <span><b>Endereço: </b> <i><?php echo $endereco3 ?><br>
                                             <span><b>Estado: </b> <i><?php echo $ufc3 ?><br>
                                                <span><b>Situação: </b> <i><?php echo $ativo3 ?></i><br>
                                            <span><b>Obs: </b> <i><?php echo $obs3 ?><br>
                                            </div>

                                            <div class="col-md-8">
                                                <img src="../img/clientes/<?php echo $foto3 ?>" width="100px">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="modal" id="modal-imprimir" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <hr style="margin:4px">


                                    </div>

                                </div>
                            </div>
                        </div>



                        <?php 

                        if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
                            echo "<script>$('#modalDados').modal('show');</script>";
                        }

                        if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
                            echo "<script>$('#modalDados').modal('show');</script>";
                        }

                        if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
                            echo "<script>$('#modal-deletar').modal('show');</script>";
                        }

                        if (@$_GET["funcao"] != null && @$_GET["funcao"] == "endereco") {
                            echo "<script>$('#modal-endereco').modal('show');</script>";
                        }

                        if (@$_GET["funcao"] != null && @$_GET["funcao"] == "imprimir") {
                            echo "<script>$('#modal-imprimir').modal('show');</script>";
                        }


                        ?>




                        <!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
                        <script type="text/javascript">
                            $("#form").submit(function () {
                                var pag = "<?=$pag?>";
                                event.preventDefault();
                                var formData = new FormData(this);

                                $.ajax({
                                    url: pag + "/inserir.php",
                                    type: 'POST',
                                    data: formData,

                                    success: function (mensagem) {

                                        $('#mensagem').removeClass()

                                        if (mensagem.trim() == "Salvo com Sucesso!") {

                    //$('#nome').val('');
                    //$('#cpf').val('');
                                            $('#btn-fechar').click();
                                            window.location = "index.php?pag="+pag;

                                        } else {

                                            $('#mensagem').addClass('text-danger')
                                        }

                                        $('#mensagem').text(mensagem)

                                    },

                                    cache: false,
                                    contentType: false,
                                    processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
                            });
                        </script>





                        <!--AJAX PARA EXCLUSÃO DOS DADOS -->
                        <script type="text/javascript">
                            $(document).ready(function () {
                                var pag = "<?=$pag?>";
                                $('#btn-deletar').click(function (event) {
                                    event.preventDefault();

                                    $.ajax({
                                        url: pag + "/excluir.php",
                                        method: "post",
                                        data: $('form').serialize(),
                                        dataType: "text",
                                        success: function (mensagem) {

                                            if (mensagem.trim() === 'Excluído com Sucesso!') {


                                                $('#btn-cancelar-excluir').click();
                                                window.location = "index.php?pag=" + pag;
                                            }

                                            $('#mensagem_excluir').text(mensagem)



                                        },

                                    })
                                })
                            })
                        </script>



                        <!--SCRIPT PARA CARREGAR IMAGEM -->
                        <script type="text/javascript">

                            function carregarImg() {

                                var target = document.getElementById('target');
                                var file = document.querySelector("input[type=file]").files[0];
                                var reader = new FileReader();

                                reader.onloadend = function () {
                                    target.src = reader.result;
                                };

                                if (file) {
                                    reader.readAsDataURL(file);


                                } else {
                                    target.src = "";
                                }
                            }

                        </script>





                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#dataTable').dataTable({
                                    "ordering": false
                                })

                            });
                        </script>



