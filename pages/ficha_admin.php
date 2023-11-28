<?php
include('protect.php');
include('processarInfoOcorrencia_admin.php');
include('gerar_relatorio.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOAR</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="ficha.css">

</head>

<body>

  <header>
    <div class="navbar">

      <a href="historico_admin.php">
        <div class="historico">
          Histórico
        </div>
      </a>
      <a href="telahome_admin.php">
        <div class="inicio">
          Início
        </div>
      </a>
      <a href="telaperfil_admin.php">
        <div class="perfil">
          Perfil
        </div>
      </a>
    </div>
  </header>

  <div class="circle-button">
    <div class="menu-icon">&#9776;</div>
    <div class="dropdown-content">
      <a href="#info-paciente">Informações do Paciente</a>
      <a href="#info-ocorrencia">Informações da Ocorrência</a>
      <a href="#situacao-paciente">Situação do Paciente</a>
      <ul class="sub-menu">
        <li><a href="#problemas-encontrados">Problemas encontrados</a></li>
        <li><a href="#localizacao-traumas">Localização dos traumas</a></li>
        <li><a href="#sinais-sintomas">Sinais e sintomas</a></li>
        <li><a href="#anamnese">Anamnese</a></li>
      </ul>
      <a href="#atendimento">Atendimento</a>
    </div>
  </div>
  <script>
    document.querySelector('.circle-button').addEventListener('click', function() {
      var dropdown = document.querySelector('.dropdown-content');
      if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
      } else {
        dropdown.style.display = 'block';
      }
    });
  </script>



  <form class="form" name="formOcorrencia" id="envioFormulario" method="POST" submit="processarInfoOcorrencia_admin.php">
    <div class="container">

      <h1 class="title" id="info-paciente">Informações do paciente:</h1>
    </div>
    <div class="boxinfopaciente">

      <div class="input-caixatexto">
        <label for="nomePaciente">Nome do paciente:</label>
        <input type="text" id="nomePaciente" name="nomePaciente" oninput="validarLetraNomePaciente(this); capitalizarPalavrasIniciais(this);" placeholder="Digite o nome...">
        <p id="mensagemErro-1" style="color: red;"></p>
      </div>


      <div class="input-caixatexto">
        <label for="idadePaciente">Idade:</label>
        <input type="text" id="idadePaciente" name="idadePaciente" maxlength="3" oninput="validarNumeroIdadePac(this);" placeholder="Digite a idade...">
        <p id="mensagemErro-2" style="color: red;"></p>
      </div>

      <div class="sexo_container">
        <label for="sexoSelect">Sexo:</label>
        <div class="custom-select">
          <select class="sexo" id="sexoSelect" name="sexoSelect" onchange="mostrarOcultarDiv()">
            <option selected="selected"></option>
            <option class="opcao" value="Feminino">Feminino</option>
            <option value="Masculino">Masculino</option>
          </select>
          <div class="custom-arrow"></div>
        </div>
      </div>


      <div class="input-caixatexto">
        <label for="rgCpfPaciente">RG/CPF do paciente:</label>
        <input type="text" id="rgCpfPaciente" name="rgCpfPaciente" placeholder="Digite..." oninput="formatarDocumento(this);">
        <p id="mensagemErro-3" style="color: red;"></p>
    </div>

      <div class="input-caixatexto">
        <label for="nomeAcompanhante">Nome do acompanhante:</label>
        <input type="text" id="nomeAcompanhante" name="nomeAcompanhante" placeholder="Digite..." oninput="validarNomeAcomp(this); capitalizarPalavrasIniciais(this);">
        <p id="mensagemErro-4" style="color: red;"></p>
      </div>

      <div class="input-caixatexto">
        <label for="idadeAcompanhante">Idade do acompanhante:</label>
        <input type="text" id="idadeAcompanhante" name="idadeAcompanhante" maxlength="3" placeholder="Digite..." oninput="validarNumeroIdadeAcomp(this)">
        <p id="mensagemErro-5" style="color: red;"></p>
      </div>

      <div class="input-vitimaera">
        <div class="input-caixatexto">
          <label for="vitimaEra">Vítima era:</label>
        </div>
      </div>

      <div class="grid_vitima">
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="Ciclista" onclick="selectCheckVitimaEra(this)">
            <label for="ciclista">Ciclista</label>
          </div>
        </div>
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="CondutorMoto" onclick="selectCheckVitimaEra(this)">
            <label for="CondutorMoto">Condutor moto</label>
          </div>
        </div>
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="Gestante" onclick="selectCheckVitimaEra(this)">
            <label for="Gestante">Gestante</label>
          </div>
        </div>
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="Pas.Bco.Frente" onclick="selectCheckVitimaEra(this)">
            <label for="Pas.BancoFrente">Pas.Bco.Frente</label>
          </div>
        </div>
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="Pas.Moto" onclick="selectCheckVitimaEra(this)">
            <label for="Pas.Moto">Pas.Moto</label>
          </div>
        </div>
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="CondutorCarro" onclick="selectCheckVitimaEra(this)">
            <label for="CondutorCarro">Condutor carro</label>
          </div>
        </div>
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="Clínico" onclick="selectCheckVitimaEra(this)">
            <label for="clinico">Clínico</label>
          </div>
        </div>
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="Trauma" onclick="selectCheckVitimaEra(this)">
            <label for="trauma">Trauma</label>
          </div>
        </div>
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="Pas.Bco.Trás" onclick="selectCheckVitimaEra(this)">
            <label for="Pas.BancoTras">Pas.Bco.Trás</label>
          </div>
        </div>
        <div>
          <div class="checkbox">
            <input type="checkbox" name="vitimaEra[]" class="selectCheckVitimaEra" id="Pedestre" onclick="selectCheckVitimaEra(this)">
            <label for="Pedestre">Pedestre</label>
          </div>
        </div>
      </div>

      <div class="sexo_container">
        <label for="textoformaconducao">Forma de Condução:</label>
        <div class="custom-select">
          <select class="sexo" name="formaConducaoSelect">
            <option selected="selected"></option>
            <option>Deitada</option>
            <option>Semi-sentada</option>
            <option>Sentada</option>
          </select>
          <div class="custom-arrow"></div>
        </div>
      </div>
    </div>

    <!-- 

ESPAÇO PRA IDENTIFICAR ONDE JÁ FUNCIONA NO BANCO (ACIMA FUNCIONA, EM BAIXO NÃO)
ESPAÇO PRA IDENTIFICAR ONDE JÁ FUNCIONA NO BANCO (ACIMA FUNCIONA, EM BAIXO NÃO)
ESPAÇO PRA IDENTIFICAR ONDE JÁ FUNCIONA NO BANCO (ACIMA FUNCIONA, EM BAIXO NÃO)
ESPAÇO PRA IDENTIFICAR ONDE JÁ FUNCIONA NO BANCO (ACIMA FUNCIONA, EM BAIXO NÃO)
ESPAÇO PRA IDENTIFICAR ONDE JÁ FUNCIONA NO BANCO (ACIMA FUNCIONA, EM BAIXO NÃO)


 -->



    <hr class="hr1">

    <div class="container">
      <h1 class="title" id="info-ocorrencia">Informações da ocorrência:</h1>
    </div>


    <div class="boxinfoocorrencia">

      <div class="input-caixatexto">
        <label for="username">Data:</label>
        <input class="textbox-n" placeholder="XX/XX/20XX" name="data_ocorrencia" type="text" onfocus="(this.type='date')" onblur="(this.type='date')" />
      </div>

      <div class="input-caixatexto">
        <label for="localocorrencia">Local da ocorrência:</label>
        <input type="text" id="localocorrencia" name="localocorrencia" placeholder="Digite..." oninput="capitalizarPalavrasIniciais(this);">
      </div>

      <div class="input-caixatexto">
        <label for="nomehospital">Nome do hospital:</label>
        <input type="text" id="nomehospital" name="nomehospital" placeholder="Digite..." oninput="capitalizarPalavrasIniciais(this);">
      </div>

      <div class="input-caixatexto">
        <label for="usb">N° USB.:</label>
        <input type="text" id="usb" name="usb" placeholder="Digite..." oninput="validarNumeroUSB(this)" maxlength="3">
        <p id="mensagemErro-25" style="color: red;"></p>
      </div>

      <div class="input-caixatexto">
        <label for="numocorrencia">N° Ocorr.:</label>
        <input type="text" id="numocorrencia" name="numocorrencia" placeholder="Digite..." oninput="validarNumeroOcorr(this)">
        <p id="mensagemErro-6" style="color: red;"></p>
      </div>

      <div class="input-caixatexto">
        <label for="despacho">Despacho:</label>
        <input type="text" id="despacho" name="despacho" placeholder="Digite...">
      </div>

      <div class="input-caixatexto">
        <label for="horachegada">Hora Chegada:</label>
        <input type="time" id="horachegada" name="horachegada" min="01:00" max="00:00" required />
      </div>

      <div class="input-caixatexto">
        <label for="kmfinal">KM Final:</label>
        <input type="text" id="kmfinal" name="kmfinal" placeholder="Digite..." oninput="autoCompleteKM(this)">
        <p id="mensagemErro-40" style="color: red;"></p>

    </div>

      <div class="input-caixatexto">
        <label for="codIr">CÓD. IR:</label>
        <input type="text" id="codIr" name="codIr" placeholder="Digite..." oninput="validarCodIR(this)">
        <p id="mensagemErro-7" style="color: red;"></p>
      </div>

      <div class="input-caixatexto">
        <label for="codPs">CÓD. PS:</label>
        <input type="text" id="codPs" name="codPs" placeholder="Digite..." oninput="validarCodPS(this)">
        <p id="mensagemErro-8" style="color: red;"></p>
      </div>

  <div class="input-caixatexto">
    <label for="codSiaSus">CÓD. SIA/SUS:</label>
    <input type="text" id="codSiaSus" name="codSiaSus" placeholder="Digite..." oninput="validarCodSIASUS(this)">
    <p id="mensagemErro-9" style="color: red;"></p>
  </div>


  <div class="subtitulo"></div>
  <div class="texto">Tipo de ocorrência (Pré-hospitalar): </div>
  <br>
  <div class="grid_ocorrencia">

    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Afogamento" onclick="selectCheckOcorrencia(this)">
      <label for="Afogamento">Afogamento</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Agressão" onclick="selectCheckOcorrencia(this)">
      <label for="Agressão">Agressão</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Atropelamento" onclick="selectCheckOcorrencia(this)">
      <label for="Atropelamento">Atropelamento</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="ChoqueElétrico" onclick="selectCheckOcorrencia(this)">
      <label for="Choque elétrico">Choque elétrico</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Desabamento" onclick="selectCheckOcorrencia(this)">
      <label for="Desabamento">Desabamento</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Doméstico" onclick="selectCheckOcorrencia(this)">
      <label for="Doméstico">Doméstico</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Esportivo" onclick="selectCheckOcorrencia(this)">
      <label for="Esportivo">Esportivo</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="CausadoPorAnimais" onclick="selectCheckOcorrencia(this)">
      <label for="CausadoPorAnimais">Causado por animais</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="ComMeiodeTransp." onclick="selectCheckOcorrencia(this)">
      <label for="ComMeioTransporte">Com meio de transp.</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Desmor.Desliz." onclick="selectCheckOcorrencia(this)">
      <label for="Desmor./Desliz.">Desmor./Desliz.</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Intoxicação" onclick="selectCheckOcorrencia(this)">
      <label for="Intoxicação">Intoxicação</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="QuedaBicicleta" onclick="selectCheckOcorrencia(this)">
      <label for="QuedaBicicleta">Queda bicicleta</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="QuedaMoto" onclick="selectCheckOcorrencia(this)">
      <label for="QuedaMoto">Queda moto</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="QuedaNivelMenor" onclick="selectCheckOcorrencia(this)">
      <label for="QuedaNivelMenor2M"> Queda nível &gt; 2M </label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Trabalho" onclick="selectCheckOcorrencia(this)">
      <label for="Trabalho">Trabalho</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="Transferência" onclick="selectCheckOcorrencia(this)">
      <label for="Transferência">Transferência</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="EmergênciaMédica" onclick="selectCheckOcorrencia(this)">
      <label for="EmergenciaMedica">Emergência Médica</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="QuedaAlturaMaior" onclick="selectCheckOcorrencia(this)">
      <label for="QuedaAlturaMaior2M">Queda de altura &lt; 2M</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="TentativaSuicídio" onclick="selectCheckOcorrencia(this)">
      <label for="TentativadeSuicidio">Tentativa de suicídio</label>
    </div>
    <div>
      <input type="checkbox" name="tipo_ocorrencia[]" class="selectCheckOcorrencia" id="QuedaPrópriaAltura" onclick="selectCheckOcorrencia(this)">
      <label for="QuedaPropriaAltura">Queda própria altura</label>
    </div>

  </div>
  <br>

  <div class="subtitulo"></div>
  <div class="texto">Avaliação de cinemática: </div>

  <br>

  <div class="grid_cinematica">
    <!-- TEXTOS DAS CHECKBOX -->

    <div class="grid_txt_cinematica">
      <div class="txt_cinematica">
        <p>Distúrbio comportamental</p>
      </div>
      <div class="txt_cinematica">
        <p>Encontrado com capacete</p>
      </div>
      <div class="txt_cinematica">
        <p>Encontrado de cinto</p>
      </div>
      <div class="txt_cinematica">
        <p>Para-brisa avariado</p>
      </div>
      <div class="txt_cinematica">
        <p>Caminhando na cena</p>
      </div>
      <div class="txt_cinematica">
        <p>Painel avariado</p>
      </div>
      <div class="txt_cinematica">
        <p>Volante torcido</p>
      </div>
    </div>

    <!-- CHECKBOX SIM -->
    <div class="grid_checkbox_sim_cinematica">
      <div>
        <input type="checkbox" name="disturbio[]" class="selectCheckDistúrbio" id="selectCheckDistúrbioSim" onclick="selectCheckDistúrbio(this)">
        <label for="selectCheckDistúrbioSim">Sim</label>
    </div>
      <div>
        <input type="checkbox" name="encontradoCapacete[]" class="selectCheckCapacete" id="selectCheckCapaceteSim" onclick="selectCheckCapacete(this)">
        <label for="Sim">Sim</label>
      </div>
      <div>
        <input type="checkbox" name="encontradoCinto[]" class="selectCheckCinto" id="selectCheckCintoSim" onclick="selectCheckCinto(this)">
        <label for="Sim">Sim</label>
      </div>
      <div>
        <input type="checkbox" name="parabrisaAvariado[]" class="selectCheckParabrisa" id="selectCheckParabrisaSim" onclick="selectCheckParabrisa(this)">
        <label for="Sim">Sim</label>
      </div>
      <div>
        <input type="checkbox" name="caminhandoCena[]" class="selectCheckCaminhando" id="selectCheckCaminhandoSim" onclick="selectCheckCaminhando(this)">
        <label for="Sim">Sim</label>
      </div>
      <div>
        <input type="checkbox" name="painelAvariado[]" class="selectCheckPainel" id="selectCheckPainelSim" onclick="selectCheckPainel(this)">
        <label for="Sim">Sim</label>
      </div>
      <div>
        <input type="checkbox" name="volanteTorcido[]" class="selectCheckVolante" id="selectCheckVolanteSim" onclick="selectCheckVolante(this)">
        <label for="Sim">Sim</label>
      </div>
    </div>

    <!-- CHECKBOX NÃO -->

    <div class="grid_checkbox_nao_cinematica">
      <div>
        <input type="checkbox" name="disturbio[]" class="selectCheckDistúrbio" id="selectCheckDistúrbioNao" onclick="selectCheckDistúrbio(this)">
        <label for="selectCheckDistúrbioNao">Não</label>
    </div>
      <div>
        <input type="checkbox" name="encontradoCapacete[]" class="selectCheckCapacete" id="selectCheckCapaceteNao" onclick="selectCheckCapacete(this)">
        <label for="Não">Não</label>
      </div>
      <div>
        <input type="checkbox" name="encontradoCinto[]" class="selectCheckCinto" id="selectCheckCintoNao" onclick="selectCheckCinto(this)">
        <label for="Não">Não</label>
      </div>
      <div>
        <input type="checkbox" name="parabrisaAvariado[]" class="selectCheckParabrisa" id="selectCheckParabrisaNao" onclick="selectCheckParabrisa(this)">
        <label for="Não">Não</label>
      </div>
      <div>
        <input type="checkbox" name="caminhandoCena[]" class="selectCheckCaminhando" id="selectCheckCaminhandoNao" onclick="selectCheckCaminhando(this)">
        <label for="Não">Não</label>
      </div>
      <div>
        <input type="checkbox" name="painelAvariado[]" class="selectCheckPainel" id="selectCheckPainelNao" onclick="selectCheckPainel(this)">
        <label for="Não">Não</label>
      </div>
      <div>
        <input type="checkbox" name="volanteTorcido[]" class="selectCheckVolante" id="selectCheckVolanteNao" onclick="selectCheckVolante(this)">
        <label for="Não">Não</label>
      </div>
    </div>
  </div>


  <br>

  </div>
  <hr class="hr1">

  <div class="container">
    <h1 class="title" id="situacao-paciente">Situação do paciente:</h1>
  </div>


  <div class="boxsituacaopaciente">

    <div class="input-caixatexto">
      <label for="medidaPressao">Medida de Pressão:</label>
      <input type="text" id="medidaPressao1" name="medidapressao" oninput="formatarMedidaPressao(this)" placeholder="___x___mmHg">
      <p id="mensagemErro-26" style="color: red;"></p>
    </div>



    <div class="input-caixatexto">
      <label for="numeroInput">Pulso:</label>
      <input type="text" id="numeroInput" name="pulso" oninput="completePulso(this)" placeholder="___B.C.P.M.">
      <p id="mensagemErro-23" style="color: red;"></p>
    </div>



    <div class="input-caixatexto">
      <label for="repiracao">Respiração:</label>
      <input type="text" id="formatarRespiration" name="respiracao" placeholder="___M.R.M." oninput="formatRespiration(this)">
      <p id="mensagemErro-12" style="color: red;"></p>
    </div>



    <div class="input-caixatexto">
      <label for="username">Saturação:</label>
      <input type="text" id="username" name="saturacao" placeholder="___%" oninput="completeSaturacao(this)">
      <p id="mensagemErro-22" style="color: red;"></p>
    </div>

    <div class="input-caixatexto">
      <label for="username">HGT:</label>
      <input type="text" id="username" name="hgt" placeholder="___mg/dL" oninput="completeWithHgt(this)">
      <p id="mensagemErro-20" style="color: red;"></p>
    </div>

    <div class="input-caixatexto">
      <label for="temperatura">Temperatura:</label>
      <input type="text" id="username" name="temperatura" placeholder="___°C" oninput="NumeroTemperatura(this)">
      <p id="mensagemErro-21" style="color: red;"></p>
    </div>


    <div class="input-caixatexto">
      <label for="username">Perfusão:</label>
    </div>

    <div class="checkbox-texto">
      <input type="checkbox" name="perfusao[]" class="selectCheckPerfusaoMaiorDois" id="selectCheckPerfusaoMaiorDois1" onclick="selectCheckPerfusaoMaiorDois(this)">
      <label for="Menor2seg">&gt;2 SEG</label>

      <input type="checkbox" name="perfusao[]" class="selectCheckPerfusaoMaiorDois" id="selectCheckPerfusaoMaiorDois2" onclick="selectCheckPerfusaoMaiorDois(this)">
      <label for="Maior2seg">&lt; 2 SEG</label>
    </div>



    <div class="checkbox-texto">
      <input type="checkbox" id="selectCheckNormalAnormal1" name="normalAnormal[]" class="selectCheckNormalAnormal" onclick="selectCheckNormalAnormal(this)" />
      <label for="checkbox-id-1">NORMAL</label>


      <input type="checkbox" id="selectCheckNormalAnormal2" name="normalAnormal[]" class="selectCheckNormalAnormal" onclick="selectCheckNormalAnormal(this)" />
      <label for="checkbox-id-2">ANORMAL</label>
    </div>

    <div class="container-Maiores-de-5-anos hidden">
      <div class="subtitulo"></div>
      <div class="texto" id="">Nível de consciência - Maiores de 5 anos </div>
      <br>
      <div class="grid_maior5">
        <div class="input-consciencia">
          <label for="AberturaOcular">ABERTURA<br>OCULAR</label>
        </div>
        <div class="check_ocular">

          <div class="checkbox">4
            <input type="checkbox" name="Maior5AberturOcularEspontânea" class="checkAberturaOcularMaior5" id="espontanea" onclick="selectAberturaOcularMaior5(this)">
            <label for="Espontânea">Espontânea</label>
            <div class="numeros_niveis"></div>
          </div>
          <div class="checkbox">3
            <input type="checkbox" name="Maior5AberturOcularComandoVerbal" class="checkAberturaOcularMaior5" id="comandoverbal" onclick="selectAberturaOcularMaior5(this)">
            <label for="ComandoVerbal">Comando verbal</label>
            <div class="numeros_niveis"></div>
          </div>
          <div class="checkbox">2
            <input type="checkbox" name="Maior5AberturOcularEstimuloDoloroso" class="checkAberturaOcularMaior5" id="estimulodoloroso" onclick="selectAberturaOcularMaior5(this)">
            <label for="EstímuloDoloroso">Estímulo doloroso</label>
            <div class="numeros_niveis"></div>
          </div>
          <div class="checkbox">1
            <input type="checkbox" name="Maior5AberturOcularNenhuma" class="checkAberturaOcularMaior5" id="nenhuma" onclick="selectAberturaOcularMaior5(this)">
            <label for="Nenhuma">Nenhuma</label>
            <div class="numeros_niveis"></div>
          </div>
          <div class="checkbox">
            <input type="checkbox" name="Maior5AberturOcularNT" class="checkAberturaOcularMaior5" id="NT" onclick="selectAberturaOcularMaior5(this)">
            <label for="NT">NT</label>
            <div class="numeros_niveis"></div>
          </div>
        </div>
      </div>

      <hr class="hr2">


      <div class="grid_maior5">
        <div class="input-consciencia">
          <label for="username">RESPOSTA<br>VERBAL</label>
        </div>
        <div class="check_ocular">

          <div class="checkbox">5
            <input type="checkbox" name="Maior5RespostaVerbalOrientado" class="checkRespostaVerbalMaior5" id="Orientado" onclick="selectRespostaVerbalMaior5(this)">
            <label for="Orientado">Orientado</label>
          </div>
          <div class="checkbox">4
            <input type="checkbox" name="Maior5RespostaVerbalConfuso" class="checkRespostaVerbalMaior5" id="Confuso" onclick="selectRespostaVerbalMaior5(this)">
            <label for="Confuso">Confuso</label>
          </div>
          <div class="checkbox">3
            <input type="checkbox" name="Maior5RespostaVerbalPalavrasInapro." class="checkRespostaVerbalMaior5" id="Palavras_Inapro." onclick="selectRespostaVerbalMaior5(this)">
            <label for="PalavrasInapro.">Palavras Inapro.</label>
          </div>
          <div class="checkbox">2
            <input type="checkbox" name="Maior5RespostaPalavrasIncomp." class="checkRespostaVerbalMaior5" id="Palavras_Incomp." onclick="selectRespostaVerbalMaior5(this)">
            <label for="PalavrasIncomp.">Palavras Incomp.</label>
          </div>
          <div class="checkbox">1
            <input type="checkbox" name="Maior5RespostaVerbalNenhuma" class="checkRespostaVerbalMaior5" id="Nenhuma" onclick="selectRespostaVerbalMaior5(this)">
            <label for="Nenhuma">Nenhuma</label>
          </div>
          <div class="checkbox">
            <input type="checkbox" name="Maior5RespostaVerbalNT" class="checkRespostaVerbalMaior5" id="NT" onclick="selectRespostaVerbalMaior5(this)">
            <label for="NT">NT</label>
            <div class="numeros_niveis"></div>
          </div>
        </div>


      </div>

      <hr class="hr2">

      <div class="grid_maior5">
        <div class="input-consciencia">
          <label for="username">RESPOSTA<br>MOTORA</label>
        </div>
        <div class="check_ocular">

          <div class="checkbox">6
            <input type="checkbox" name="Maior5RespostaMotoraObedeceComandos" class="checkRespostaMotoraMaior5" id="Obedece_comandos" onclick="selectRespostaMotoraMaior5(this)">
            <label for="ObedeceComandos">Obedece comandos</label>
          </div>
          <div class="checkbox">5
            <input type="checkbox" name="Maior5RespostaMotoraLocalizaDor" class="checkRespostaMotoraMaior5" id="Localiza_dor" onclick="selectRespostaMotoraMaior5(this)">
            <label for="LocalizaDor">Localiza dor</label>
          </div>
          <div class="checkbox">4
            <input type="checkbox" name="Maior5RespostaMotoraMov.Retirada" class="checkRespostaMotoraMaior5" id="Mov_retirada" onclick="selectRespostaMotoraMaior5(this)">
            <label for="Mov.deRetirada">Mov. de retirada</label>
          </div>
          <div class="checkbox">3
            <input type="checkbox" name="Maior5RespostaMotoraFlexaoNormal" class="checkRespostaMotoraMaior5" id="Flexão_anormal" onclick="selectRespostaMotoraMaior5(this)">
            <label for="FlexãoAnormal">Flexão anormal</label>
          </div>
          <div class="checkbox">2
            <input type="checkbox" name="Maior5RespostaMotoraExtensaoAnormal" class="checkRespostaMotoraMaior5" id="ExtensãoAnormal" onclick="selectRespostaMotoraMaior5(this)">
            <label for="ExtensãoAnormal">Extensão anormal</label>

            <div class="checkbox">1
              <input type="checkbox" name="Maior5RespostaMotoraNenhuma" class="checkRespostaMotoraMaior5" id="Nenhuma">
              <label for="Nenhuma">Nenhuma</label>
            </div>
            <div class="checkbox">
              <input type="checkbox" name="Maior5RespostaMotoraNT" class="checkRespostaMotoraMaior5" id="NT" onclick="selectRespostaMotoraMaior5(this)">
              <label for="NT">NT</label>
              <div class="numeros_niveis"></div>
            </div>
          </div>
        </div>


      </div>

      <hr class="hr2">

      <div class="totalgcs">
        <p>TOTAL (GCS) (3-15)
          <input type="text" id="gcs" name="totalGcs" placeholder="Digite um valor..." maxlength="2">
      </div>

    </div>


    <div class="container-Menor-de-5-anos hidden">
      <div class="subtitulo"></div>
      <div class="texto">Nível de consciência - Menores de 5 anos </div>

      <br>

      <div class="grid_maior5">
        <div class="input-consciencia">
          <label for="username">ABERTURA<br>OCULAR</label>
        </div>
        <div class="check_ocular">
          <div class="checkbox-menor5-aberturaocular">4
            <input type="checkbox"  class="checkAberturaOcularMenor5" id="checkbox-id-1" onclick="selectAberturaOcularMenor5(this)">
            <label for="checkbox-id-1">Espontânea</label>
            <div class="numeros_niveis"></div>
          </div>
          <div class="checkbox-menor5-aberturaocular">3
            <input type="checkbox"  class="checkAberturaOcularMenor5" id="checkbox-id-1" onclick="selectAberturaOcularMenor5(this)">
            <label for="checkbox-id-1">Comando verbal</label>
            <div class="numeros_niveis"></div>
          </div>
          <div class="checkbox-menor5-aberturaocular">2
            <input type="checkbox"  class="checkAberturaOcularMenor5" id="checkbox-id-1" onclick="selectAberturaOcularMenor5(this)">
            <label for="checkbox-id-1">Estímulo doloroso</label>
            <div class="numeros_niveis"></div>
          </div>
          <div class="checkbox-menor5-aberturaocular">1
            <input type="checkbox"  class="checkAberturaOcularMenor5" id="checkbox-id-1" onclick="selectAberturaOcularMenor5(this)">
            <label for="checkbox-id-1">Nenhuma</label>
            <div class="numeros_niveis"></div>
          </div>
          <div class="checkbox-menor5-nt1">
            <input type="checkbox"  class="checkAberturaOcularMenor5" id="checkbox-id-1" onclick="selectAberturaOcularMenor5(this)">
            <label for="checkbox-id-1">NT</label>
            <div class="numeros_niveis"></div>
          </div>
        </div>

      </div>

      <hr class="hr2">


      <div class="grid_maior5">
        <div class="input-consciencia">
          <label for="username">RESPOSTA<br>VERBAL</label>
        </div>
        <div class="check_ocular">

          <div class="checkbox-menor5-respostaverbal">5
            <input type="checkbox"  class="checkRespostaVerbalMenor5" id="checkbox-id-1" onclick="selectRespostaVerbalMenor5(this)">
            <label for="checkbox-id-1">Palavras/Frase apropriadas</label>
          </div>
          <div class="checkbox-menor5-respostaverbal">4
            <input type="checkbox"  class="checkRespostaVerbalMenor5" id="checkbox-id-1" onclick="selectRespostaVerbalMenor5(this)">
            <label for="checkbox-id-1">Palavras inapropriadas</label>
          </div>
          <div class="checkbox-menor5-respostaverbal">3
            <input type="checkbox"  class="checkRespostaVerbalMenor5" id="checkbox-id-1" onclick="selectRespostaVerbalMenor5(this)">
            <label for="checkbox-id-1">Choro/gritos persistentes</label>
          </div>
          <div class="checkbox-menor5-respostaverbal">2
            <input type="checkbox"  class="checkRespostaVerbalMenor5" id="checkbox-id-1" onclick="selectRespostaVerbalMenor5(this)">
            <label for="checkbox-id-1">Sons incomprieensíveis</label>
          </div>
          <div class="checkbox-menor5-respostaverbal">1
            <input type="checkbox"  class="checkRespostaVerbalMenor5" id="checkbox-id-1" onclick="selectRespostaVerbalMenor5(this)">
            <label for="checkbox-id-1">Nenhuma resposta</label>
          </div>
          <div class="checkbox-menor5-nt">
            <input type="checkbox"  class="checkRespostaVerbalMenor5" id="checkbox-id-1" onclick="selectRespostaVerbalMenor5(this)">
            <label for="checkbox-id-1">NT</label>
          </div>
        </div>
      </div>

      <hr class="hr2">

      <div class="grid_maior5">
        <div class="input-consciencia">
          <label for="username">RESPOSTA<br>MOTORA</label>
        </div>
        <div class="check_ocular">

          <div class="checkbox-menor5-respostamotora">6
            <input type="checkbox"  class="checkRespostaMotoraMenor5" id="checkbox-id-1" onclick="selectRespostaMotoraMenor5(this)">
            <label for="checkbox-id-1">Obedece prontamente</label>
          </div>
          <div class="checkbox-menor5-respostamotora">5
            <input type="checkbox"  class="checkRespostaMotoraMenor5" id="checkbox-id-1" onclick="selectRespostaMotoraMenor5(this)">
            <label for="checkbox-id-1">Localiza dor/estímulo</label>
          </div>
          <div class="checkbox-menor5-respostamotora">4
            <input type="checkbox"  class="checkRespostaMotoraMenor5" id="checkbox-id-1" onclick="selectRespostaMotoraMenor5(this)">
            <label for="checkbox-id-1">Retirada do segmento est.</label>
          </div>
          <div class="checkbox-menor5-respostamotora">3
            <input type="checkbox"  class="checkRespostaMotoraMenor5" id="checkbox-id-1" onclick="selectRespostaMotoraMenor5(this)">
            <label for="checkbox-id-1">Flexão anormal</label>
          </div>
          <div class="checkbox-menor5-respostamotora">2
            <input type="checkbox"  class="checkRespostaMotoraMenor5" id="checkbox-id-1" onclick="selectRespostaMotoraMenor5(this)">
            <label for="checkbox-id-1">Extensão anormal</label>
            <div class="checkbox-menor5-respostamotora-ausencia">1
              <input type="checkbox"  class="checkRespostaMotoraMenor5" id="checkbox-id-1" onclick="selectRespostaMotoraMenor5(this)">
              <label for="checkbox-id-1">Ausência</label>(paralisia flácida,flatônia)
            </div>
            <div class="checkbox-menor5-nt">
              <input type="checkbox"  class="checkRespostaMotoraMenor5" id="checkbox-id-1" onclick="selectRespostaMotoraMenor5(this)">
              <label for="checkbox-id-1">NT</label>
              <div class="numeros_niveis"></div>
            </div>
          </div>
        </div>
      </div>

      <hr class="hr2">

      <div class="totalgcs">
        <p>TOTAL (GCS) (3-15)
          <input type="text" id="gcs" name="totalGcs" placeholder="Digite um valor..." maxlength="2">
      </div>



    </div>


    <div class="subtitulo"></div>
    <div class="texto" id="problemas-encontrados">Problemas Encontrados</div>


    <div class="prob_psiq">
      <label class="item-psiquiatrico">
        <input type="checkbox"  name="problemaPsiquiatrico[]" class="main-checkbox-psiq"> Psiquiátrico
      </label>
    </div>

    <div class="prob">
      <label class="item">
        <input id="checkbox-id-768" type="checkbox" class="main-checkbox-resp" onchange="toggleRespiratorio()">
        Respiratório
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaRespiratorio[]" class="sub-checkbox-resp" disabled> Inalação de fumaça
      </label>
      <label class="sub-item">
        <input type="checkbox"  name="problemaRespiratorio[]"class="sub-checkbox-resp" disabled> DPOC
      </label>
    </div>

    <div class="prob">
      <label class="item">
        <input type="checkbox" class="main-checkbox-diab" onchange="toggleDiabetes()"> Diabetes
      </label>
      <label class="sub-item">
        <input type="checkbox"  name="problemaDiabete[]" class="sub-checkbox-diab" disabled> Hiperglicemia
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaDiabete[]" class="sub-checkbox-diab" disabled> Hipoglicemia
      </label>
    </div>
<br>
    <div class="fundo-input-outros1">
      <div class="input-ss">
        <label for="username">OUTROS:</label>
        <input type="text" id="username" name="problemaDiabeteOutros">
      </div>
    </div>




    <div class="prob">
      <label class="item">
        <input type="checkbox" class="main-checkbox-obst" onchange="toggleObstetrico()"> Obstétrico
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaObstetrico[]" class="sub-checkbox-obst" disabled> Parto Emergencial
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaObstetrico[]" class="sub-checkbox-obst" disabled> Gestante
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaObstetrico[]" class="sub-checkbox-obst" disabled> Hemor. Excessiva
      </label>
    </div>

    <div class="prob">
      <label class="item">
        <input type="checkbox" class="main-checkbox-transp" onchange="toggleTransporte()"> Transporte
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaTransporte[]" class="sub-checkbox-transp" disabled> Aéreo
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaTransporte[]" class="sub-checkbox-transp" disabled> Clínico
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaTransporte[]" class="sub-checkbox-transp" disabled> Emergencial
      </label>
      <label class="sub-item">
        <input type="checkbox"  name="problemaTransporte[]" class="sub-checkbox-transp" disabled> Pós-trauma
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaTransporte[]" class="sub-checkbox-transp" disabled> SAMU
      </label>
      <label class="sub-item">
        <input type="checkbox" name="problemaTransporte[]" class="sub-checkbox-transp" disabled> Sem remoção
      </label>

    </div>
<br>
    <div class="fundo-input-outros2">
      <div class="input-ss">
        <label for="username">OUTROS:</label>
        <input type="text" id="username" name="problemaTransporteOutros">
      </div>
    </div>


    <div class="input-caixatexto">
      <label for="username">Objetos recolhidos:</label>
      <input type="text" id="username" name="problemaObjetosRecolhidos" placeholder="Digite...">
    </div>

    <div class="subtitulo"></div>
    <div class="texto" id="localizacao-traumas">Localização dos traumas</div>

    <br>

    <banner>
    <div class="col position-relative">
      <canvas id="myCanvas" style="max-width: 100%;"></canvas>
      <button id="undoButton" class="btn btn-primary mt-2" type="button">Desfazer</button>
      <br>
      <div class="center-text">
        <label for="traumaType" class="mt-1 mb-2">Selecione o tipo de trauma:</label>
    </div>
      <div id="colorSelector"></div>
</div>
</banner>

    <br>

    <div class="grid_traumas">
  <div>
    <label for="checkbox-id-1" style="display: flex; align-items: center;">
      <span style="width: 10px; height: 10px; background-color: purple; border-radius: 50%; margin-right: 5px;"></span>
      Fraturas/Luxações/Entorses
  </label>  
</div>

  <div>
    <label for="checkbox-id-1" style="display: flex; align-items: center;">
      <span style="width: 10px; height: 10px; background-color: red; border-radius: 50%; margin-right: 5px;"></span>
      Queimadura 1°Grau
  </label>  </div>

  <div>
    <label for="checkbox-id-1" style="display: flex; align-items: center;">
      <span style="width: 10px; height: 10px; background-color: blue; border-radius: 50%; margin-right: 5px;"></span>
      Hemorragias Int.
  </label>
  </div>

  <div>
    <label for="checkbox-id-1" style="display: flex; align-items: center;">
      <span style="width: 10px; height: 10px; background-color: black; border-radius: 50%; margin-right: 5px;"></span>
      Queimadura 2°Grau
  </label>  </div>

  <div>
    <label for="checkbox-id-1" style="display: flex; align-items: center;">
      <span style="width: 10px; height: 10px; background-color: green; border-radius: 50%; margin-right: 5px;"></span>
      F.A.B./F.A.F.
  </label>  </div>

  <div>
    <label for="checkbox-id-1" style="display: flex; align-items: center;">
      <span style="width: 10px; height: 10px; background-color: darkorange; border-radius: 50%; margin-right: 5px;"></span>
      Queimadura 3°Grau
  </label>  </div>

  <div>
    <label for="checkbox-id-1" style="display: flex; align-items: center;">
      <span style="width: 10px; height: 10px; background-color: rgb(243, 0, 138); border-radius: 50%; margin-right: 5px;"></span>
      Ferimentos Diversos
  </label>  </div>

  <div>
    <label for="checkbox-id-1" style="display: flex; align-items: center;">
      <span style="width: 10px; height: 10px; background-color: rgb(0, 168, 174); border-radius: 50%; margin-right: 5px;"></span>
      Esviceração
  </label>  </div>

  <div>
    <label for="checkbox-id-1" style="display: flex; align-items: center;">
      <span style="width: 10px; height: 10px; background-color: rgb(233, 221, 0); margin-right: 5px;"></span>
      Hemorragias Ext.
  </label>  </div>
  </div>

    <br>


    <div class="subtitulo"></div>
    <div class="texto">Ferimentos / fraturas / entorses / luxação / contusão</div>

    <div class="table-container">
      <table>
        <tr>
          <th>LOCAL</th>
          <th>LADO</th>
          <th>FACE</th>
          <th>TIPO</th>
        </tr>
        <tr>
          <td><input type="text" name="tabelaTraumasLocal" id="celula1"></td>
          <td><input type="text" name="tabelaTraumasLado" id="celula2"></td>
          <td><input type="text" name="tabelaTraumasFace" id="celula3"></td>
          <td><input type="text" name="tabelaTraumasTipo" id="celula4"></td>
        </tr>
        <tr>
          <td><input type="text" name="tabelaTraumasLocal" id="celula5"></td>
          <td><input type="text" name="tabelaTraumasLado" id="celula6"></td>
          <td><input type="text" name="tabelaTraumasFace" id="celula7"></td>
          <td><input type="text" name="tabelaTraumasTipo" id="celula8"></td>
        </tr>
        <tr>
          <td><input type="text" name="tabelaTraumasLocal" id="celula9"></td>
          <td><input type="text" name="tabelaTraumasLado" id="celula10"></td>
          <td><input type="text" name="tabelaTraumasFace" id="celula11"></td>
          <td><input type="text" name="tabelaTraumasTipo" id="celula12"></td>
        </tr>
        <tr>
          <td><input type="text" name="tabelaTraumasLocal" id="celula13"></td>
          <td><input type="text" name="tabelaTraumasLado" id="celula14"></td>
          <td><input type="text" name="tabelaTraumasFace" id="celula15"></td>
          <td><input type="text" name="tabelaTraumasTipo" id="celula16"></td>
        </tr>
        <tr>
          <td><input type="text" name="tabelaTraumasLocal" id="celula17"></td>
          <td><input type="text" name="tabelaTraumasLado" id="celula18"></td>
          <td><input type="text" name="tabelaTraumasFace" id="celula19"></td>
          <td><input type="text" name="tabelaTraumasTipo" id="celula20"></td>
        </tr>
        <tr>
          <td><input type="text" name="tabelaTraumasLocal" id="celula21"></td>
          <td><input type="text" name="tabelaTraumasLado" id="celula22"></td>
          <td><input type="text" name="tabelaTraumasFace" id="celula23"></td>
          <td><input type="text" name="tabelaTraumasTipo" id="celula24"></td>
        </tr>
      </table>
    </div>

    <div class="subtitulo"></div>
    <div class="texto" id="localizacao-traumas">Queimaduras</div>
    <!-- <div class="table-container"> -->

    <button id="abrir-popup" type="button" class="botao-grau" name="1graubtn">1° GRAU</button>

    <div id="popup" class="popup">
      <div class="popup-content">
        <span class="fechar-popup" id="fechar-popup">&times;</span>
        <table id="tabela-editavel1">
          <tr>
            <th name="CABEÇA-1°GRAU">CABEÇA</th>
            <th name="PESCOÇO-1°GRAU">PESCOÇO</th>
            <th name="TORSO POS.-1°GRAU">TORSO POS.</th>
            <th name="TORSO ANT.-1°GRAU">TORSO ANT.</th>
            <th name="GENIT-1°GRAU">GENITAL.</th>
            <th name="M.I.D.-1°GRAU">M.I.D.</th>
            <th name="M.I.E.-1°GRAU">M.I.E.</th>
            <th name="M.S.D.-1°GRAU">M.S.D.</th>
            <th name="M.S.E.-1°GRAU">M.S.E.</th>
          </tr>
          <tr>
            <td class="linha-tabela">1°</td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
          </tr>
        </table>
        <button id="salvar" type="button" class="botao-grau" name="submitInfo">Pronto</button>
      </div>
    </div>

    <button id="abrir-popup2" type="button" class="botao-grau" name="2graubtn">2° GRAU</button>

    <div id="popup2" class="popup2">
      <div class="popup-content2">
        <span class="fechar-popup2" id="fechar-popup2">&times;</span>
        <table id="tabela-editavel2">
          <tr>
            <th name="CABEÇA-2°GRAU">CABEÇA</th>
            <th name="PESCOÇO-2°GRAU">PESCOÇO</th>
            <th name="TORSO POS.-2°GRAU">TORSO POS.</th>
            <th name="TORSO ANT.-2°GRAU">TORSO ANT.</th>
            <th name="GENIT-2°GRAU">GENITAL.</th>
            <th name="M.I.D.-2°GRAU">M.I.D.</th>
            <th name="M.I.E.-2°GRAU">M.I.E.</th>
            <th name="M.S.D.-2°GRAU">M.S.D.</th>
            <th name="M.S.E.-2°GRAU">M.S.E.</th>
          </tr>
          <tr>
            <td class="linha-tabela">2°</td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
          </tr>
        </table>
        <button id="salvar2" type="button" class="botao-grau" name="submitInfo">Pronto</button>
      </div>
    </div>

    <button id="abrir-popup3" type="button" class="botao-grau" name="3graubtn">3° GRAU</button>
<br>
    <div id="popup3" class="popup3">
      <div class="popup-content3">
        <span class="fechar-popup3" id="fechar-popup3">&times;</span>
        <table id="tabela-editavel3">
          <tr>
            <th>GRAU</th>
            <th name="CABEÇA-3°GRAU">CABEÇA</th>
            <th name="PESCOÇO-3°GRAU">PESCOÇO</th>
            <th name="TORSO POS.-3°GRAU">TORSO POS.</th>
            <th name="TORSO ANT.-3°GRAU">TORSO ANT.</th>
            <th name="GENIT-3°GRAU">GENITAL.</th>
            <th name="M.I.D.-3°GRAU">M.I.D.</th>
            <th name="M.I.E.-3°GRAU">M.I.E.</th>
            <th name="M.S.D.-3°GRAU">M.S.D.</th>
            <th name="M.S.E.-3°GRAU">M.S.E.</th>
          </tr>
          <tr>
            <td class="linha-tabela">3°</td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
            <td><input type="checkbox" name="queimadura"></td>
          </tr>
        </table>
        <button id="salvar3" class="botao-grau" type="button" name="submitInfo">Pronto</button>
      </div>
    </div>

    <div class="subtitulo"></div>
    <div class="texto">Decisão transporte</div>

    <br>
    <div class="grid_transporte">
      <div>
        <input type="checkbox" name="decisaoTransporte[]" class="selectCheckTransporte" id="selectCheckTransporte1" onclick="selectCheckTransporte(this)">
        <label for="checkbox-id-1">Ruim</label>
      </div>
      <div>
        <input type="checkbox" name="decisaoTransporte[]" class="selectCheckTransporte" id="selectCheckTransporte2" onclick="selectCheckTransporte(this)">
        <label for="checkbox-id-2">Péssimo</label>
      </div>
      <div>
        <input type="checkbox" name="decisaoTransporte[]" class="selectCheckTransporte" id="selectCheckTransporte3" onclick="selectCheckTransporte(this)">
        <label for="checkbox-id-3">Bom</label>
      </div>
      <div>
        <input type="checkbox" name="decisaoTransporte[]" class="selectCheckTransporte" id="selectCheckTransporte4" onclick="selectCheckTransporte(this)">
        <label for="checkbox-id-4">Ótimo</label>
      </div>
    </div>


    <div class="subtitulo"></div>
    <div class="texto" id="sinais-sintomas">Sinais e sintomas</div>

    <br>
    <div class="grid_ocorrencia">
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Abdomen">
        <label for="checkbox-id-1">Abdomen</label>sensível/rígido
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Afundamento">
        <label for="checkbox-id-1">Afundamento</label> de crânio
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Agitação">
        <label for="checkbox-id-1">Agitação</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Amnésia">
        <label for="checkbox-id-1">Amnésia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Angina">
        <label for="checkbox-id-1">Angina de peito</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Apinéia">
        <label for="checkbox-id-1">Apinéia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Bradicardia">
        <label for="checkbox-id-1">Bradicardia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Bradipnéia">
        <label for="checkbox-id-1">Bradipnéia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Bronco">
        <label for="checkbox-id-1">Bronco-Aspirando</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Cefaléia">
        <label for="checkbox-id-1">Cefaléia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Enfisema">
        <label for="checkbox-id-1">Enfisema subcutâneo</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Êstase">
        <label for="checkbox-id-1">Êstase de jugular</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Face">
        <label for="checkbox-id-1">Face pálida</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="O.V.A.C.E">
        <label for="checkbox-id-1">O.V.A.C.E</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Priaprismo">
        <label for="checkbox-id-1">Priaprismo</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Prurido">
        <label for="checkbox-id-1">Prurido na pele</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Sede">
        <label for="checkbox-id-1">Sede</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Sinal">
        <label for="checkbox-id-1">Sinal de battle</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Convulsão">
        <label for="checkbox-id-1">Convulsão</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Decorticação">
        <label for="checkbox-id-1">Decorticação</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Deformidade">
        <label for="checkbox-id-1">Deformidade</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Descerebração">
        <label for="checkbox-id-1">Descerebração</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Desmaio">
        <label for="checkbox-id-1">Desmaio</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Desvio">
        <label for="checkbox-id-1">Desvio de traquéia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Dispnéia">
        <label for="checkbox-id-1">Dispnéia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Dor">
        <label for="checkbox-id-1">Dor local</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="Otorréia">
        <label for="checkbox-id-1">Otorréia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Otorragia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Óbito</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Hipertensão</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Hipotensão</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Náusea e vômitos</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Nasoragia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Sinal de guaxinim</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Sudorese</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Taquipnéia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Taquicardia</label>
      </div>
      <div>
        <input type="checkbox" name="sinaisSintomas[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">Tontura</label>
      </div>
    </div>
    <br><br><br><br>

    <div class="prob">
      <label class="item">
        <input type="checkbox" id="checkbox-id-768" class="main-checkbox-resp" onchange="toggleHemorragia(this)">
        HEMORRAGIA
      </label>
      <label class="sub-item">
        <input type="checkbox" name="hemorragia" class="sub-checkbox-resp interna" disabled> INTERNA
      </label>
      <label class="sub-item">
        <input type="checkbox" name="hemorragia" class="sub-checkbox-resp externa" disabled> EXTERNA
      </label>
    </div>


    <div class="prob">
      <label class="item">
        <input type="checkbox" id="checkbox-id-768" class="main-checkbox-resp" onchange="toggleEdema(this)"> EDEMA
      </label>
      <label class="sub-item">
        <input type="checkbox" name="edema" class="sub-checkbox-resp generalizado" disabled> GENERALIZADO
      </label>
      <label class="sub-item">
        <input type="checkbox" name="edema" class="sub-checkbox-resp localizado" disabled> LOCALIZADO
      </label>
    </div>

    <div class="prob">
      <label class="item">
        <input type="checkbox" id="checkbox-id-768" class="main-checkbox-resp" onchange="toggleParada(this)"> PARADA
      </label>
      <label class="sub-item">
        <input type="checkbox" name="parada" class="sub-checkbox-resp cardiaca" disabled> CARDÍACA
      </label>
      <label class="sub-item">
        <input type="checkbox" name="parada" class="sub-checkbox-resp respiratoria" disabled> RESPIRATÓRIA
      </label>
    </div>

    <div class="prob">
      <label class="item">
        <input type="checkbox" id="checkbox-id-768" class="main-checkbox-resp" onchange="toggleCianose(this)"> CIANOSE
      </label>
      <label class="sub-item">
        <input type="checkbox" name="cianose" class="sub-checkbox-resp labios" disabled> LÁBIOS
      </label>
      <label class="sub-item">
        <input type="checkbox" name="cianose" class="sub-checkbox-resp extremidade" disabled> EXTREMIDADE
      </label>
    </div>

    <div class="prob">
      <label class="item">
        <input type="checkbox" id="checkbox-id-768" class="main-checkbox-resp" onchange="togglePupilas(this)"> PUPILAS
      </label>
      <label class="sub-item">
        <input type="checkbox" name="pupilas" class="sub-checkbox-resp anisocoria" disabled> ANISOCORIA
      </label>
      <label class="sub-item">
        <input type="checkbox" name="pupilas" class="sub-checkbox-resp isocoria" disabled> ISOCORIA
      </label>
      <label class="sub-item">
        <input type="checkbox" name="pupilas" class="sub-checkbox-resp midriase" disabled> MIDRIASE
      </label>
      <label class="sub-item">
        <input type="checkbox" name="pupilas" class="sub-checkbox-resp miose" disabled> MIOSE
      </label>
      <label class="sub-item">
        <input type="checkbox" name="pupilas" class="sub-checkbox-resp reagente" disabled> REAGENTE
      </label>
      <label class="sub-item">
        <input type="checkbox" name="pupilas" class="sub-checkbox-resp naoreagente" disabled> Ñ REAGENTE
      </label>
    </div>

    <div class="checkbox-container">
    </div>
    <br>
    <div class="fundo-input">
      <div class="input-ss">
        <label for="username">OUTROS:</label>
        <input type="text" id="username" name="outros">
      </div>
    </div>

    <div id="anamnese"></div>

    <div class="subtitulo"></div>
    <div class="texto">Anamnese da Emergência Médica</div>
<br>
    <div class="fundo-anamnese">
      <div class="input-anamnese">
      </div>

      <div class="actu">
        <label for="username">O que aconteceu (sinais e sintomas)</label>
      </div>

      <div class="input-anamnese">
        <textarea id="username" name="anamneseEmergencialOqueAconteceu" placeholder="   Digite..." class="textarea"></textarea>
      </div>
    </div>


    <br>
    <div class="grid_cinematica_aconteceu">
      <!-- TEXTOS DAS CHECKBOX -->
      <div class="grid_txt_cinematica_aconteceu">
        <div class="txt_cinematica">
          <p>Aconteceu outras vezes</p>
        </div>
      </div>


      <!-- CHECKBOX SIM -->
      <div class="grid_checkbox_sim_cinematica">
        <div>
          <input type="checkbox" name="anamneseAconteceuOutrasVezes[]" class="selectCheckAconteceuOutrasVezes" id="selectCheckAconteceuOutrasVezes1" onclick="selecionarCheckboxAconteceuOutrasVezes(this); habilitarContainerAconteceu(this)">
          <label for="selectCheckAconteceuOutrasVezes1">Sim</label>
        </div>
      </div>

      <div class="grid_checkbox_nao_cinematica">
        <div>
          <input type="checkbox" name="anamneseAconteceuOutrasVezes[]" class="selectCheckAconteceuOutrasVezes" id="selectCheckAconteceuOutrasVezes2" onclick="selecionarCheckboxAconteceuOutrasVezes(this); habilitarContainerAconteceu(this)">
          <label for="checkbox-id-8">Não</label>
        </div>
      </div>
    </div>

    <div class="grid_cinematica_aconteceu_input">
      <div class="container-aconteceu hidden">
        <div class="input-anme_sn_QntTempoAconteceu">
          <label for="QuantoTempoAconteceu" class="texto-medico">A quanto tempo aconteceu?</label>
          <input type="text" id="QuantoTempoAconteceu" name="anamneseQuantoTempo">
        </div>
      </div>
    </div>

    <div class="grid_cinematica_problemaSaude">
      <!-- TEXTOS DAS CHECKBOX -->
      <div class="grid_txt_cinematica_problemaSaude">
        <div class="txt_cinematica">
          <p>Possui algum problema de saúde</p>
        </div>
      </div>


      <!-- CHECKBOX SIM -->
      <div class="grid_checkbox_sim_cinematica">
        <div>
          <input type="checkbox" name="anamneseProblemaSaude[]" class="selectCheckProblemaSaude" id="selectCheckProblemaSaude1" onclick="selecionarCheckboxProblemaSaude(this); habilitarContainerPrbSaude(this)">
          <label for="ProblemaSaude">Sim</label>
        </div>
      </div>

      <div class="grid_checkbox_nao_cinematica">
        <div>
          <input type="checkbox" name="anamneseProblemaSaude[]" class="selectCheckProblemaSaude" id="selectCheckProblemaSaude2" onclick="selectCheckProblemaSaude(this); habilitarContainerPrbSaude(this)">
          <label for="ProblemaSaude">Não</label>
        </div>
      </div>
    </div>

    <div class="grid_cinematica_problemaSaude_input">
      <div class="container-PrbSaude hidden">
        <div class="input-anme_sn_Quais">
          <label for="Quais">Qual?</label>
          <input type="text" id="Quais" name="anamneseQuaisProblemas">
        </div>
      </div>
    </div>
    <br>


    <div class="grid_cinematica_medicacao">
      <!-- TEXTOS DAS CHECKBOX -->

      <div class="grid_txt_cinematica_medicacao">
        <div class="txt_cinematica">
          <p>Faz uso de medicação</p>
        </div>
      </div>


      <!-- CHECKBOX SIM -->
      <div class="grid_checkbox_sim_cinematica">
        <div>
          <input type="checkbox" name="anamneseUsoMedicacao[]" class="selectCheckMedicacao" id="selectCheckMedicacao1" onclick="selecionarCheckboxMedicacao(this); habilitarContainerMedicacao(this); habilitarContainerMedicacaoQuais(this)">
          <label for="Medicacao">Sim</label>
        </div>
      </div>

      <div class="grid_checkbox_nao_cinematica">
        <div>
          <input type="checkbox" name="anamneseUsoMedicacao[]" class="selectCheckMedicacao" id="selectCheckMedicacao2" onclick="selecionarCheckboxMedicacao(this); habilitarContainerMedicacao(this); habilitarContainerMedicacaoQuais(this)">
          <label for="Medicacao">Não</label>
        </div>
      </div>
    </div>

    <div class="grid_cinematica_medicacao_input">
      <div class="container-medicacao hidden">
        <div class="input-anme_sn_HorarioMedicacao">
          <label for="username">Ultima medicação:</label>
          <input type="time" id="HorarioMedicacao" name="anamneseHoraUltimaMedicacao">
        </div>
      </div>
    </div>

    <div class="grid_cinematica_medicacao_input">
      <div class="container-medicacao-quais hidden">
        <div class="input-anme_sn_HorarioMedicacao">
          <label for="QuaisMedicacao">Qual?</label>
          <input type="text" id="QuaisMedicacao" name="anamneseQualMedicacao">
        </div>
      </div>
    </div>

    <div class="grid_cinematica_alergico">
      <!-- TEXTOS DAS CHECKBOX -->

      <div class="grid_txt_cinematica_alergico">
        <div class="txt_cinematica">
          <p>Alérgico a alguma coisa?</p>
        </div>
      </div>


      <!-- CHECKBOX SIM -->
      <div class="grid_checkbox_sim_cinematica">
        <div>
          <input type="checkbox" name="anamneseAlergico" class="selectCheckAlergico" id="selectCheckAlergico1" onclick="selecionarCheckboxAlergico(this); habilitarContainerAlergico(this)">
          <label for="Alergico">Sim</label>
        </div>
      </div>

      <div class="grid_checkbox_nao_cinematica">
        <div>
          <input type="checkbox" name="anamneseAlergico" class="selectCheckAlergico" id="selectCheckAlergico2" onclick="selecionarCheckboxAlergico(this); habilitarContainerAlergico(this)">
          <label for="Alergico">Não</label>
        </div>
      </div>
    </div>

    <div class="grid_cinematica_alergico_input">
      <div class="container-Alergico hidden">
        <div class="input-anme_sn_Especifique">
          <label for="Quais">Qual?</label>
          <input type="text" id="Quais" name="anamneseQualAlergia">
        </div>
      </div>
    </div>
    <br>


    <div class="grid_cinematica_alimento">
      <!-- TEXTOS DAS CHECKBOX -->

      <div class="grid_txt_cinematica_alimento">
        <div class="txt_cinematica">
          <p>Inseriu alimento ou líquido a 6 horas ou mais?</p>
        </div>
      </div>


      <!-- CHECKBOX SIM -->
      <div class="grid_checkbox_sim_cinematica">
        <div>
          <input type="checkbox" name="anamneseAlimento6Horas[]" class="selectCheckAlimento6horas" id="selectCheckAlimento6horas1" onclick="selectCheckAlimento6horas(this); habilitarContainerAlimento_espec(this); habilitarContainerAlimento_horas(this)">
          <label for="checkbox-id-1">Sim</label>
        </div>
      </div>

      <div class="grid_checkbox_nao_cinematica">
        <div>
          <input type="checkbox" name="anamneseAlimento6Horas[]" class="selectCheckAlimento6horas" id="selectCheckAlimento6horas2" onclick="selectCheckAlimento6horas(this); habilitarContainerAlimento_espec(this); habilitarContainerAlimento_horas(this)">
          <label for="checkbox-id-8">Não</label>
        </div>
      </div>
    </div>


    <div class="grid_cinematica_alimento_input">
      <div class="container-alimento-espec hidden">
        <div class="input-anme_sn">
          <label for="username">Se sim, especifique:</label>
          <input type="text" id="username" name="anamneseEspecifique" placeholder="________________">
        </div>
      </div>
    </div>

    <div class="grid_cinematica_alimento_input">
      <div class="container-alimento-horas hidden">
        <div class="input-anme_sn">
          <label for="username">Que horas?</label>
          <input type="time" id="username" name="anamneseQueHoras" placeholder="________________">
        </div>
      </div>
    </div>

    <div class="gestacional hidden">
      <div class="subtitulo"></div>
      <div class="texto">Anamnese Gestacional</div>

      <div class="grid_cinematica_medicacao_input">
        <div class="input-anme_sn">
          <label for="username">Período da gestação:</label>
          <input type="text" id="username" name="gestacionalPeriodoGestacao" placeholder="________________">
        </div>
      </div>

      <div class="grid_cinematica_pre_natal">
        <!-- TEXTOS DAS CHECKBOX -->
        <div class="input-anme_sn">
          <div class="txt_cinematica">
            <p>Fez pré-natal?</p>
          </div>
        </div>

        <!-- CHECKBOX SIM -->
        <div class="grid_checkbox_sim_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPreNatal[]" class="selectCheckPreNatal_simnao" id="selectCheckPreNatal_simnao1" onclick="selecionarCheckbox(this); habilitarContainer(this);">
            <label for="checkbox-id-1">Sim</label>
          </div>
        </div>

        <!-- CHECKBOX NÃO -->
        <div class="grid_checkbox_nao_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPreNatal[]" class="selectCheckPreNatal_simnao" id="selectCheckPreNatal_simnao2" onclick="selecionarCheckbox(this); habilitarContainer(this);">
            <label for="checkbox-id-8">Não</label>
          </div>
        </div>

      </div>

      <div class="grid_cinematica_pre_natal_input">
        <div class="container-nome-medico hidden">
          <div class="input-anme_sn_nomemedico">
            <label for="username" class="texto-medico">Nome do médico:</label>
            <input type="text" id="nomeMedico" name="gestacionalNomeMedico" oninput="capitalizarPalavrasIniciais(this);">
          </div>
        </div>
      </div>



      <div class="grid_cinematica">
        <!-- TEXTOS DAS CHECKBOX -->

        <div class="grid_txt_cinematica">
          <div class="txt_cinematica">
            <p>Possibilidade de complicações?
            </p>
          </div>
        </div>


        <!-- CHECKBOX SIM -->
        <div class="grid_checkbox_sim_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPossibilidadeComplicacao[]" class="selectCheckComplicacoes" id="selectCheckComplicacoes1" onclick="selectCheckComplicacoes(this)">
            <label for="checkbox-id-1">Sim</label>
          </div>
        </div>

        <div class="grid_checkbox_nao_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPossibilidadeComplicacao[]" class="selectCheckComplicacoes" id="selectCheckComplicacoes2" onclick="selectCheckComplicacoes(this)">
            <label for="checkbox-id-8">Não</label>
          </div>
        </div>
      </div>

      <br>

      <div class="grid_cinematica_primeiro_filho">
        <!-- TEXTOS DAS CHECKBOX -->
        <div class="grid_txt_cinematica_primeiro_filho">
          <div class="txt_cinematica">
            <p>É o primeiro filho?</p>
          </div>
        </div>

        <!-- CHECKBOX SIM -->
        <div class="grid_checkbox_sim_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPrimeiroFilho[]" class="selectCheckPrimeiroFilho" id="selectCheckPrimeiroFilho1" onclick="selecionarCheckboxPrimeiroFilho(this); habilitarContainerQuantos(this);">
            <label for="selectCheckPrimeiroFilho1">Sim</label>
          </div>
        </div>

        <div class="grid_checkbox_nao_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPrimeiroFilho[]" class="selectCheckPrimeiroFilho" id="selectCheckPrimeiroFilho2" onclick="selecionarCheckboxPrimeiroFilho(this); habilitarContainerQuantos(this);">
            <label for="selectCheckPrimeiroFilho2">Não</label>
          </div>
        </div>
      </div>

      <div class="grid_cinematica_primeiro_filho_input">
        <div class="container-quantos hidden">
          <div class="input-anme_sn_quantos">
            <label for="QuantosFilhos" class="texto-medico">Quantos?</label>
            <input type="text" id="QuantosFilhos" name="gestacionalQuantos">
          </div>
        </div>
      </div>


      <div class="input-anme_sn">
        <label for="username">Que horas iniciaram as contrações?</label>
        <input type="time" id="username" name="gestacionalHoraContracao" placeholder="________________">
      </div>

      <br>

      <div class="input-anme_sn">
        <label for="username">Tempo das contrações:</label>
        <input type="text" id="username" name="gestacionalDuracaoContracao" placeholder="Duração...">
        <input type="text" id="username" name="gestacionalIntervaloContracao" placeholder="Intervalo...">
      </div>

      <br>

      <div class="grid_cinematica">
        <!-- TEXTOS DAS CHECKBOX -->

        <div class="grid_txt_cinematica">
          <div class="txt_cinematica">
            <p>Sente pressão na região do quadril ou vontade de evacuar?
            </p>
          </div>
        </div>


        <!-- CHECKBOX SIM -->
        <div class="grid_checkbox_sim_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPressaoQuadril[]" class="selectCheckPressaoEvacuar" id="selectCheckPressaoEvacuar1" onclick="selectCheckPressaoEvacuar(this)">
            <label for="checkbox-id-1">Sim</label>
          </div>
        </div>

        <div class="grid_checkbox_nao_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPressaoQuadril[]" class="selectCheckPressaoEvacuar" id="selectCheckPressaoEvacuar2" onclick="selectCheckPressaoEvacuar(this)">
            <label for="checkbox-id-8">Não</label>
          </div>
        </div>
      </div>

      <br>

      <div class="grid_cinematica">
        <!-- TEXTOS DAS CHECKBOX -->

        <div class="grid_txt_cinematica">
          <div class="txt_cinematica">
            <p>Já houve ruptura da bolsa?
            </p>
          </div>
        </div>


        <!-- CHECKBOX SIM -->
        <div class="grid_checkbox_sim_cinematica">
          <div>
            <input type="checkbox" name="gestacionalRupturaBolsa[]" class="selectCheckRupturaBolsa" id="selectCheckRupturaBolsa1" onclick="selectCheckRupturaBolsa(this)">
            <label for="checkbox-id-1">Sim</label>
          </div>
        </div>

        <div class="grid_checkbox_nao_cinematica">
          <div>
            <input type="checkbox" name="gestacionalRupturaBolsa[]" class="selectCheckRupturaBolsa" id="selectCheckRupturaBolsa2" onclick="selectCheckRupturaBolsa(this)">
            <label for="checkbox-id-8">Não</label>
          </div>
        </div>
      </div>

      <br>

      <div class="grid_cinematica">
        <!-- TEXTOS DAS CHECKBOX -->

        <div class="grid_txt_cinematica">
          <div class="txt_cinematica">
            <p>Foi feito inspeção visual?
            </p>
          </div>
        </div>


        <!-- CHECKBOX SIM -->
        <div class="grid_checkbox_sim_cinematica">
          <div>
            <input type="checkbox" name="gestacionalInspecaoVisual[]" class="selectCheckInspecaoVisual" id="selectCheckInspecaoVisual1" onclick="selectCheckInspecaoVisual(this)">
            <label for="checkbox-id-1">Sim</label>
          </div>
        </div>

        <div class="grid_checkbox_nao_cinematica">
          <div>
            <input type="checkbox" name="gestacionalInspecaoVisual[]" class="selectCheckInspecaoVisual" id="selectCheckInspecaoVisual2" onclick="selectCheckInspecaoVisual(this)">
            <label for="checkbox-id-8">Não</label>
          </div>
        </div>
      </div>

      <br>

      <div class="grid_cinematica">
        <!-- TEXTOS DAS CHECKBOX -->

        <div class="grid_txt_cinematica">
          <div class="txt_cinematica">
            <p>Parto realizado?
            </p>
          </div>
        </div>


        <!-- CHECKBOX SIM -->
        <div class="grid_checkbox_sim_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPartoRealizado[]" class="selectCheckPartoRealizado" id="selectCheckPartoRealizado1" onclick="selectCheckPartoRealizado(this)">
            <label for="checkbox-id-1">Sim</label>
          </div>
        </div>

        <div class="grid_checkbox_nao_cinematica">
          <div>
            <input type="checkbox" name="gestacionalPartoRealizado[]" class="selectCheckPartoRealizado" id="selectCheckPartoRealizado2" onclick="selectCheckPartoRealizado(this)">
            <label for="checkbox-id-8">Não</label>
          </div>
        </div>
      </div>

      <br>

      <div class="grid_cinematica">
        <!-- TEXTOS DAS CHECKBOX -->

        <div class="grid_txt_cinematica">
          <div class="txt_cinematica">
            <p>Sexo do bebê:
            </p>
          </div>
        </div>

        <!-- CHECKBOX SIM -->
        <div class="grid_checkbox_sim_cinematica">
          <div>
            <input type="checkbox" name="gestacionalSexoBebe[]" class="selectCheckSexoBebe" id="selectCheckSexoBebe1" onclick="selectCheckSexoBebe(this)">
            <label for="checkbox-id-1">Fem</label>
          </div>
        </div>


        <div class="grid_checkbox_nao_cinematica">
          <div>
            <input type="checkbox" name="gestacionalSexoBebe[]" class="selectCheckSexoBebe" id="selectCheckSexoBebe2" onclick="selectCheckSexoBebe(this)">
            <label for="checkbox-id-8">Mas</label>
          </div>
        </div>
      </div>

      <div class="input-anme_sn">
        <label for="username">Nome do bebê:</label>
        <input type="text" id="username" name="gestacionalNomeBebe" placeholder="________________">
      </div>
    </div>
  </div>

  <hr class="hr1">

  <div class="container">
    <h1 class="title" id="atendimento">Atendimento</h1>
  </div>

  <div class="boxatendimento">

    <div class="input-caixatexto">
      <label for="username">M:</label>
      <input type="text" id="username" name="motorista" oninput="validarAtendimentoM(this); capitalizarPalavrasIniciais(this);" placeholder="Digite...">
      <p id="mensagemErro-14" style="color: red;"></p>
    </div>

    <div class="input-caixatexto">
      <label for="username">S1:</label>
      <input type="text" id="username" name="socorrista1" oninput="validarS1(this); capitalizarPalavrasIniciais(this);" placeholder="Digite...">
      <p id="mensagemErro-15" style="color: red;"></p>
    </div>

    <div class="input-caixatexto">
      <label for="username">S2:</label>
      <input type="text" id="username" name="socorrista2" oninput="validarS2(this); capitalizarPalavrasIniciais(this);" placeholder="Digite...">
      <p id="mensagemErro-16" style="color: red;"></p>
    </div>

    <div class="input-caixatexto">
      <label for="username">S3:</label>
      <input type="text" id="username" name="socorrista3" oninput="validarS3(this); capitalizarPalavrasIniciais(this);" placeholder="Digite...">
      <p id="mensagemErro-17" style="color: red;"></p>
    </div>

    <div class="input-caixatexto">
      <label for="username">Demandante:</label>
      <input type="text" id="username" name="demandante" oninput="validarDemandante(this); capitalizarPalavrasIniciais(this);" placeholder="Digite...">
      <p id="mensagemErro-18" style="color: red;"></p>
    </div>

    <div class="input-caixatexto">
      <label for="username">Equipe:</label>
      <input type="text" id="username" name="equipe" placeholder="Digite..." oninput="capitalizarPalavrasIniciais(this);">
    </div>

    <div class="subtitulo"></div>
    <div class="texto">Procedimentos efetuados: </div>

    <br>
    <div class="grid_procedimentosefetuados">
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">ASPIRAÇÃO</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">CURATIVOS</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">AVALIAÇÃO INICIAL</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">COMPRESSIVO</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">AVALIAÇÃO DIRIGIDA</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">ENCRAVAMENTO</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">AVALIAÇÃO CONTIN.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">OCULAR</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">CHAVE DE RAUTEK</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">QUEIMADURA</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">CÂNULA DE GUEDEL</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">SIMPLES</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">DESOBSTRUÇÃO DE V.A.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">3 PONTAS</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">EMPREGO DO D.E.A.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">IMOBILIZAÇÕES</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">GESTÃO DE RISCOS</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">CERVICAL</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">LIMPEZA DE FERIMEN.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">MACA</label> SOB. RODAS
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">MEMBRO INF.DIR.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">MACA RÍGIDA</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">MEMBRO INF. ESQ.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">PONTE</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">MEMBRO SUP.DIR.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">RETIRA CAPACETE</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">MEMBRO SUP.ESQ.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">R.C.P.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">QUADRIL</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">ROLAMENTO 90°</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">TOMADA DECISÃO</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">ROLAMENTO 180°</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">TRATADO CHOQUE</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">USO KED</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">USO COLAR</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">USO TTF</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">OXIGENIOTERAPIA</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">VENTIL. SUPO.</label>
      </div>
      <div>
        <input type="checkbox" name="procedimentosefetuados1[]" class="checkbox-block" id="checkbox-id-1">
        <label for="checkbox-id-1">REANIMADOR</label>
      </div>
    </div>

    <br><br>

    <div class="proced">
      <label class="item_meiosauxiliares">
        <input type="checkbox" class="main-checkbox-meios" onchange="toggleMeiosAuxiliares()"> Meios Auxiliares
      </label>
      <label class="sub-item_meiosauxiliares">
        <input type="checkbox" name="procedimentomeiosauxiliares[]" class="sub-checkbox-meios" disabled> CELESC
      </label>
      <label class="sub-item_meiosauxiliares">
        <input type="checkbox" name="procedimentomeiosauxiliares[]" class="sub-checkbox-meios" disabled> Def. Civil
      </label>
      <label class="sub-item_meiosauxiliares">
        <input type="checkbox" name="procedimentomeiosauxiliares[]" class="sub-checkbox-meios" disabled> IGP / PC
      </label>
    </div>

    <div class="proced">
      <label class="item">
        <input type="checkbox" class="main-checkbox-policia" onchange="togglePolicia()"> Polícia
      </label>
      <label class="sub-item">
        <input type="checkbox" name="procedimentopolicia[]" class="sub-checkbox-policia" disabled> Civil
      </label>
      <label class="sub-item">
        <input type="checkbox" name="procedimentopolicia[]" class="sub-checkbox-policia" disabled> Militar
      </label>
      <label class="sub-item">
        <input type="checkbox" name="procedimentopolicia[]" class="sub-checkbox-policia" disabled> PRE
      </label>
      <label class="sub-item">
        <input type="checkbox" name="procedimentopolicia[]" class="sub-checkbox-policia" disabled> PRF
      </label>
    </div>

    <div class="proced">
      <label class="item">
        <input type="checkbox" class="main-checkbox-samu" onchange="toggleSamu()"> SAMU
      </label>
      <label class="sub-item">
        <input type="checkbox" name="procedimentosamu[]" class="sub-checkbox-samu" disabled> USA
      </label>
      <label class="sub-item">
        <input type="checkbox" name="procedimentosamu[]" class="sub-checkbox-samu" disabled> USB
      </label>
    </div>

    <div class="cit">
      <div class="cit-checkbox">
        <input type="checkbox" id="myCheckbox" onclick="toggleInputCit()">
        CIT
      </div>
      <div class="cit-input">
        <input type="text" name="procedimentocit" id="myInput" disabled>
      </div>
    </div>

    
    <div class="subtitulo"></div>
    <div class="texto">Materiais descartáveis utilizados: </div>

    <br>
    <div class="grid_procedimentos">
      <div class="legenda-materiais">Material
      </div>
      <div class="legenda-materiais">Quantidade
      </div>
      <hr class="hr2">
      <hr class="hr2">

      <div>
        <label class="item">
          <input type="checkbox" class="main-checkbox-atadura" id="atadura" onclick="toggleInputQuantidadeAtadura()" ; onchange="toggleAtadura()"> ATADURA</label><br>
        <input type="checkbox" name="descartaveisataduratamanho[]" class="sub-checkbox-atadura" disabled> 8
        <input type="checkbox" name="descartaveisataduratamanho[]" class="sub-checkbox-atadura" disabled> 12
        <input type="checkbox" name="descartaveisataduratamanho[]" class="sub-checkbox-atadura" disabled> 20

      </div>

      <div class="inputquantidade">
        <input type="text" name="descartaveisataduraquant"  id="quantidadeatadura" oninput="validarNumeroQuantidadeAtadura(this)" disabled>
        <p id="mensagemErro-27" style="color: red; font-size: 12px;"></p>
      </div>
      <hr class="hr2">
      <hr class="hr2">


      <div>
        <input type="checkbox" id="cateter" onclick="toggleInputQuantidadeCateter()">
        <label for="cateter">CATETER TP. OCÚLOS</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="descartaveiscateteroculosquant" id="quantidadecateter" oninput="validarNumeroQuantidadeCateter(this)" disabled>
        <p id="mensagemErro-28" style="color: red; font-size: 12px;"></p>
      </div>


      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="compressacomum" onclick="toggleInputQuantidadeCompressa()">
        <label for="compressacomum">COMPRESSA COMUM</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="descartaveiscompressacomumquant" id="quantidadecompressa" oninput="validarNumeroQuantidadeCompressa(this)" disabled>
        <p id="mensagemErro-29" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <label class="item">
          <input type="checkbox" class="main-checkbox-kits" id="kits" onclick="toggleInputQuantidadeKits()" ; onchange="toggleKits()"> KIT'S</label><br>
        <input type="checkbox" name="descartaveiskitstamanho[]" class="sub-checkbox-kits" disabled> H
        <input type="checkbox" name="descartaveiskitstamanho[]" class="sub-checkbox-kits" disabled> P
        <input type="checkbox" name="descartaveiskitstamanho[]" class="sub-checkbox-kits" disabled> Q
      </div>

      <div class="inputquantidade">
        <input type="text" name="descartaveiskitsquant" id="quantidadekits" oninput="validarNumeroQuantidadeKits(this)" disabled>
        <p id="mensagemErro-30" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="luvas" onclick="toggleInputQuantidadeLuvas()">
        <label for="luvas">LUVAS DESC. (PARES)</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="descartaveisluvasquant" id="quantidadeluvas" oninput="validarNumeroQuantidadeLuvas(this)" disabled>
        <p id="mensagemErro-31" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="mascara" onclick="toggleInputQuantidadeMascara()">
        <label for="mascara">MÁSCARA DESC.</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="descartaveismascaraquant" id="quantidademascara" oninput="validarNumeroQuantidadeMascara(this)" disabled>
        <p id="mensagemErro-32" style="color: red; font-size: 12px;"></p>
      </div>


      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="manta" onclick="toggleInputQuantidadeManta()">
        <label for="manta">MANTA ALUMINIZADA</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="descartaveismantaaluminizadaquant" id="quantidademanta" oninput="validarNumeroQuantidadeManta(this)" disabled>
        <p id="mensagemErro-33" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="pas" onclick="toggleInputQuantidadePas()">
        <label for="pas">PÁS DO DEA</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="descartaveispasdeaquant" id="quantidadepas" oninput="validarNumeroQuantidadePas(this)" disabled>
        <p id="mensagemErro-34" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="sonda" onclick="toggleInputQuantidadeSonda()">
        <label for="sonda">SONDA DE ASPIRAÇÃO</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="descartaveissondaaspiracaoquant" id="quantidadesonda" oninput="validarNumeroQuantidadeSonda(this)" disabled>
        <p id="mensagemErro-35" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="soro" onclick="toggleInputQuantidadeSoro()">
        <label for="soro">SORO FISIOLÓGICO</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="descartaveissorofisiologicoquant" id="quantidadesoro" oninput="validarNumeroQuantidadeSoro(this)" disabled>
        <p id="mensagemErro-36" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <label class="item">
          <input type="checkbox" class="main-checkbox-talas" id="talas" onclick="toggleInputQuantidadeTalas()" ; onchange="toggleTalas()"> TALAS PAP.</label><br>
        <input type="checkbox" name="descartaveistalaspaptamanho[]" class="sub-checkbox-talas" disabled> P
        <input type="checkbox" name="descartaveistalaspaptamanho[]" class="sub-checkbox-talas" disabled> G
      </div>


      <div class="inputquantidade">
        <input type="text" name="descartaveistalaspapquant" id="quantidadetalas" oninput="validarNumeroQuantidadeTalas(this)" disabled>
        <p id="mensagemErro-37" style="color: red; font-size: 12px;"></p>
      </div>
    </div>

    <br><br><br><br><br>

    <div class="materiais_descartaveis_outros">
      <div class="materiais_descartaveis_outros-checkbox">
        <input type="checkbox" id="materiaisOutrosCheckbox" onclick="toggleMateriais_descartaveis_outros()">
      </div>
      <div class="materiais_descartaveis_outros-input">
        <input type="text" name="descartaveisoutros" id="materiaisOutrosInput" disabled>
      </div>
    </div>


    <div class="subtitulo"></div>
    <div class="texto">Materiais utilizados deixados no hospital:</div>

    <br>
    <div class="grid_procedimentos">
      <div class="legenda-materiais">Material
      </div>
      <div class="legenda-materiais">Quantidade
      </div>
      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="base" onclick="toggleInputQuantidadeBase()">
        <label for="base">BASE DO ESTABILIZA.</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="deixadoshospitalbaseestabilizadorquant" id="quantidadebase" oninput="validarNumeroQuantidadeBase(this)" disabled>
        <p id="mensagemErro-38" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <label class="item">
          <input type="checkbox" class="main-checkbox-colar" id="colar" onclick="toggleInputQuantidadeColar()" ; onchange="toggleColar()"> COLAR</label><br>
        <input type="checkbox" name="deixadoshospitalcolartamanho[]" class="sub-checkbox-colar" disabled> PP
        <input type="checkbox" name="deixadoshospitalcolartamanho[]" class="sub-checkbox-colar" disabled> P
        <input type="checkbox" name="deixadoshospitalcolartamanho[]" class="sub-checkbox-colar" disabled> M
        <input type="checkbox" name="deixadoshospitalcolartamanho[]" class="sub-checkbox-colar" disabled> G
        <input type="checkbox" name="deixadoshospitalcolartamanho[]" class="sub-checkbox-colar" disabled> GG
      </div>

      <div class="inputquantidade">
        <input type="text" name="deixadoshospitalcolarquant" id="quantidadecolar" oninput="validarNumeroQuantidadeColar(this)" disabled>
        <p id="mensagemErro-39" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="coxins" onclick="toggleInputQuantidadeCoxins()">
        <label for="coxins">COXINS ESTABILIZA.</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="deixadoshospitalcoxinestabilizadorquant" id="quantidadecoxins" oninput="validarNumeroQuantidadeCoxins(this)" disabled>
        <p id="mensagemErro-41" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <label class="item">
          <input type="checkbox" class="main-checkbox-ked" id="ked" onclick="toggleInputQuantidadeKed()" ; onchange="toggleKed()"> KED</label><br>
        <input type="checkbox" name="deixadoshospitalkedtamanho[]" class="sub-checkbox-ked" disabled> ADULT.
        <input type="checkbox" name="deixadoshospitalkedtamanho[]" class="sub-checkbox-ked" disabled> INFA.
      </div>

      <div class="inputquantidade">
        <input type="text" name="deixadoshospitalkedQquant" id="quantidadeked" oninput="validarNumeroQuantidadeKed(this)" disabled>
        <p id="mensagemErro-42" style="color: red; font-size: 12px;"></p>
      </div>
      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="maca" onclick="toggleInputQuantidadeMaca()">
        <label for="maca">MACA RÍGIDA</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="deixadoshospitalmacarigidaquant" id="quantidademaca" oninput="validarNumeroQuantidadeMaca(this)" disabled>
        <p id="mensagemErro-43" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <label class="item">
          <input type="checkbox" class="main-checkbox-ttf" id="ttf" onclick="toggleInputQuantidadeTtf()" ; onchange="togglettf()"> T.T.F.</label><br>
        <input type="checkbox" name="deixadoshospitalttftamanho[]"  class="sub-checkbox-ttf" disabled> ADULT.
        <input type="checkbox" name="deixadoshospitalttftamanho[]" class="sub-checkbox-ttf" disabled> INFA.
      </div>

      <div class="inputquantidade">
        <input type="text" name="deixadoshospitalttfquant" id="quantidadettf" oninput="validarNumeroQuantidadeTtf(this)" disabled>
        <p id="mensagemErro-44" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="aranha" onclick="toggleInputQuantidadeAranha()">
        <label for="aranha">TIRANTE ARANHA</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="deixadoshospitaltirantearanhaquant" id="quantidadearanha" oninput="validarNumeroQuantidadeAranha(this)" disabled>
        <p id="mensagemErro-45" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">

      <div>
        <input type="checkbox" id="cabeca" onclick="toggleInputQuantidadeCabeca()">
        <label for="cabeca">TIRANTE DE CABEÇA</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="deixadoshospitaltirantecabecaquant" id="quantidadecabeca" oninput="validarNumeroQuantidadeCabeca(this)" disabled>
        <p id="mensagemErro-46" style="color: red; font-size: 12px;"></p>
      </div>

      <hr class="hr2">
      <hr class="hr2">
      <div>
        <input type="checkbox" id="canula" onclick="toggleInputQuantidadeCanula()">
        <label for="canula">CÂNULA</label>
      </div>
      <div class="inputquantidade">
        <input type="text" name="deixadoshospitalcanulaquant" id="quantidadecanula" oninput="validarNumeroQuantidadeCanula(this)" disabled>
        <p id="mensagemErro-47" style="color: red; font-size: 12px;"></p>
      </div>
    </div>
    <br><br><br><br>

    <div class="materiais_deixados_outros1">
      <div class="materiais_deixados_outros1-checkbox">
        <input type="checkbox" id="materiais_deixados_outros1Checkbox" onclick="togglemateriais_deixados_outros1()">
      </div>
      
      
      <div class="materiais_deixados_outros1-input">
        <input type="text" name="deixadoshospitaloutro" id="materiais_deixados_outros1Input" disabled>
      </div>
    </div>

<br>
    <div class="fundo-obsimp">
      <div class="input-obsimp">
        <label for="username">Observações importantes:</label>
      </div>

      <div class="input-obsimp">
        <textarea id="username" name="observacoes" placeholder="   Digite..." class="textarea"></textarea>
      </div>
    </div>
  </div>
  </div>


  <button type="submit" name="submitInfos">Enviar relatório</button>
  </form>
  <br><br>

  <script>
// Adicione este script para preencher o campo oculto antes de enviar o formulário
document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');
    var formContent = document.getElementById('form_content');

    form.addEventListener('submit', function () {
        // Preencher o campo oculto com o conteúdo HTML do formulário
        formContent.value = document.documentElement.outerHTML;
    });
});
</script>

<!-- <script>
function enviarFormulario() {
    // Lógica para decidir qual ação executar
    var formulario = document.getElementById("envioFormulario");
    
    var submitInfos = document.querySelector('button[name="submitInfos"]');
    var action;

    if (submitInfos) {
        // Verifica qual botão com name "submitInfos" foi clicado
        if (submitInfos.id === "salvar") {
            action = "processarInfoOcorrencia.php";
        } else if (submitInfos.id === "salvar2") {
            action = "processarInfoPaciente.php";
        } else if (submitInfos.id === "salvar3") {
            action = "processarSituacaoPaciente.php";
        } else {
            action = "processarAtendimento.php";
        }
    } else {
        action = "ficha_admin.php";
    }

    // Define a ação do formulário
    formulario.action = action;

    // Retorna true para permitir o envio do formulário ou false para impedir
    return true;
}
</script> -->
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="index.js"></script>
  <script src="relatorio.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.10/jspdf.plugin.autotable.min.js"></script>
  <script src="desenho.js"></script>
  <script src="tabela-queimadura.js"></script>
  <!-- <script src="salvamento.js"></script> -->
  <sc<script src="https://code.jquery.com/jquery-3.6.4.min.js">
    </script>


</body>

</html>