<?php 
use yii\helpers\Html;

class EnLetras {
var $Void = "";
var $SP = " ";
var $Dot = ".";
var $Zero = "0";
var $Neg = "Menos";
function ValorEnLetras($x, $Moneda){
$s="";
$Ent="";
$Frc="";
$Signo="";

if(floatVal($x) < 0)
$Signo = $this->Neg . " ";
else
$Signo = "";

if(intval(number_format($x,2,'.','') )!=$x) //<- averiguar si tiene decimales
$s = number_format($x,2,'.','');
else
$s = number_format($x,2,'.','');

$Pto = strpos($s, $this->Dot);

if ($Pto === false)
{
$Ent = $s;
$Frc = $this->Void;
}
else
{
$Ent = substr($s, 0, $Pto );
$Frc = substr($s, $Pto+1);
}

if($Ent == $this->Zero || $Ent == $this->Void)
$s = "Cero ";
elseif( strlen($Ent) > 7)
{
$s = $this->SubValLetra(intval( substr($Ent, 0, strlen($Ent) - 6))) .
"Millones " . $this->SubValLetra(intval(substr($Ent,-6, 6)));
}
else
{
$s = $this->SubValLetra(intval($Ent));
}

if (substr($s,-9, 9) == "Millones " || substr($s,-7, 7) == "Millón ")
$s = $s . "de ";

$s = $s . $Moneda;

if($Frc != $this->Void)
{
//$s = $s . " " . $Frc. "/100";
//$s = $s . " " . $Frc . "/100";
}
//$letrass=$Signo . $s . " M.N.";
return ($Signo . $s . " M/CTE.");
}
function SubValLetra($numero){
$Ptr="";
$n=0;
$i=0;
$x ="";
$Rtn ="";
$Tem ="";
$x = trim("$numero");
$n = strlen($x);
$Tem = $this->Void;
$i = $n;
while( $i > 0)
{
$Tem = $this->Parte(intval(substr($x, $n - $i, 1).
str_repeat($this->Zero, $i - 1 )));
If( $Tem != "Cero" )
$Rtn .= $Tem . $this->SP;
$i = $i - 1;
}
//--------------------- GoSub FiltroMil ------------------------------
$Rtn=str_replace(" Mil Mil", " Un Mil", $Rtn );
$Rtn=str_replace("Diez Un", "Once", $Rtn );
$Rtn=str_replace("Diez Dos", "Doce", $Rtn );
$Rtn=str_replace("Diez Tres", "Trece", $Rtn );
$Rtn=str_replace("Diez Cuatro", "Catorce", $Rtn );
$Rtn=str_replace("Diez Cinco", "Quince", $Rtn );
$Rtn=str_replace("Diez Seis", "Dieciseis", $Rtn );
$Rtn=str_replace("Diez Siete", "Diecisiete", $Rtn );
$Rtn=str_replace("Diez Ocho", "Dieciocho", $Rtn );
$Rtn=str_replace("Diez Nueve", "Diecinueve", $Rtn );
$Rtn=str_replace("Veinte Un", "Veintiun", $Rtn );
$Rtn=str_replace("Veinte Dos", "Veintidos", $Rtn );
$Rtn=str_replace("Veinte Tres", "Veintitres", $Rtn );
$Rtn=str_replace("Veinte Cuatro", "Veinticuatro", $Rtn );
$Rtn=str_replace("Veinte Cinco", "Veinticinco", $Rtn );
$Rtn=str_replace("Veinte Seis", "Veintiseís", $Rtn );
$Rtn=str_replace("Veinte Siete", "Veintisiete", $Rtn );
$Rtn=str_replace("Veinte Ocho", "Veintiocho", $Rtn );
$Rtn=str_replace("Veinte Nueve", "Veintinueve", $Rtn );
while(1)
{
$Ptr = strpos($Rtn, "Mil ");
If(!($Ptr===false))
{
If(! (strpos($Rtn, "Mil ",$Ptr + 1) === false ))
$this->ReplaceStringFrom($Rtn, "Mil ", "", $Ptr);
Else
break;
}
else break;
}
//--------------------- GoSub FiltroCiento ------------------------------
$Ptr = -1;
do{
$Ptr = strpos($Rtn, "Cien ", $Ptr+1);
if(!($Ptr===false))
{
$Tem = substr($Rtn, $Ptr + 5 ,1);
if( $Tem == "M" || $Tem == $this->Void)
;
else
$this->ReplaceStringFrom($Rtn, "Cien", "Ciento", $Ptr);
}
}while(!($Ptr === false));
//--------------------- FiltroEspeciales ------------------------------
$Rtn=str_replace("Diez Un", "Once", $Rtn );
$Rtn=str_replace("Diez Dos", "Doce", $Rtn );
$Rtn=str_replace("Diez Tres", "Trece", $Rtn );
$Rtn=str_replace("Diez Cuatro", "Catorce", $Rtn );
$Rtn=str_replace("Diez Cinco", "Quince", $Rtn );
$Rtn=str_replace("Diez Seis", "Dieciseis", $Rtn );
$Rtn=str_replace("Diez Siete", "Diecisiete", $Rtn );
$Rtn=str_replace("Diez Ocho", "Dieciocho", $Rtn );
$Rtn=str_replace("Diez Nueve", "Diecinueve", $Rtn );
$Rtn=str_replace("Veinte Un", "Veintiun", $Rtn );
$Rtn=str_replace("Veinte Dos", "Veintidos", $Rtn );
$Rtn=str_replace("Veinte Tres", "Veintitres", $Rtn );
$Rtn=str_replace("Veinte Cuatro", "Veinticuatro", $Rtn );
$Rtn=str_replace("Veinte Cinco", "Veinticinco", $Rtn );
$Rtn=str_replace("Veinte Seis", "Veintiseís", $Rtn );
$Rtn=str_replace("Veinte Siete", "Veintisiete", $Rtn );
$Rtn=str_replace("Veinte Ocho", "Veintiocho", $Rtn );
$Rtn=str_replace("Veinte Nueve", "Veintinueve", $Rtn );
$Rtn=str_replace("Un Mil", "Mil", $Rtn );
  //--------------------- FiltroUn ------------------------------
    If(substr($Rtn,0,1) == "M") $Rtn = "Un " . $Rtn;
    //--------------------- Adicionar Y ------------------------------
    for($i=65; $i<=88; $i++)
    {
      If($i != 77)
         $Rtn=str_replace("a " . Chr($i), "* y " . Chr($i), $Rtn);
    }
    $Rtn=str_replace("*", "a" , $Rtn);
    return($Rtn);
}


function ReplaceStringFrom(&$x, $OldWrd, $NewWrd, $Ptr)
{
  $x = substr($x, 0, $Ptr)  . $NewWrd . substr($x, strlen($OldWrd) + $Ptr);
}


function Parte($x)
{
    $Rtn='';
    $t='';
    $i='';
    Do
    {
      switch($x)
      {
         Case 0:  $t = "Cero";break;
         Case 1:  $t = "Un";break;
         Case 2:  $t = "Dos";break;
         Case 3:  $t = "Tres";break;
         Case 4:  $t = "Cuatro";break;
         Case 5:  $t = "Cinco";break;
         Case 6:  $t = "Seis";break;
         Case 7:  $t = "Siete";break;
         Case 8:  $t = "Ocho";break;
         Case 9:  $t = "Nueve";break;
         Case 10: $t = "Diez";break;
         Case 20: $t = "Veinte";break;
         Case 30: $t = "Treinta";break;
         Case 40: $t = "Cuarenta";break;
         Case 50: $t = "Cincuenta";break;
         Case 60: $t = "Sesenta";break;
         Case 70: $t = "Setenta";break;
         Case 80: $t = "Ochenta";break;
         Case 90: $t = "Noventa";break;
         Case 100: $t = "Cien";break;
         Case 200: $t = "Doscientos";break;
         Case 300: $t = "Trescientos";break;
         Case 400: $t = "Cuatrocientos";break;
         Case 500: $t = "Quinientos";break;
         Case 600: $t = "Seiscientos";break;
         Case 700: $t = "Setecientos";break;
         Case 800: $t = "Ochocientos";break;
         Case 900: $t = "Novecientos";break;
         Case 1000: $t = "Mil";break;
         Case 1000000: $t = "Millón";break;
      }

      If($t == $this->Void)
      {
        $i = $i + 1;
        $x = $x / 1000;
        If($x== 0) $i = 0;
      }
      else
         break;
           
    }while($i != 0);
   
    $Rtn = $t;
    Switch($i)
    {
       Case 0: $t = $this->Void;break;
       Case 1: $t = " Mil";break;
       Case 2: $t = " Millones";break;
       Case 3: $t = " Billones";break;
    }
    return($Rtn . $t);
}

}
//-------------- Programa principal ------------------------ 

?>
<?php 

  $numeros= new EnLetras();
 // $letras= $numeros->ValorEnLetras(1000,"pesos");
?>
<div class="center">
	<div class="titulo">
    <h2>DOCUMENTO EQUIVALENTE A FACTURAS EN OPERACIONES CON PERSONAS NATURALES INSCRITAS EN EL REGIMEN SIMPLIFICADO</h2>
    <q>No: ARE - <?= $model->id_cuenta ?></q>
  </div>
	<q >Art. 3 Dec. 3050/1997 y el Art. 3 Dec. Reg. 522/2003</q>
	<br>

<div class="cuerpo">
	<p>Fecha: <?= $model->fecha ?></p>
	<h1><?= strtoupper($model->idTercero->nombre) ?></h1>
	<H3>Nit: <?= $model->idTercero->nit ?>-<?= $model->idTercero->digito_verificacion?></H3>
	<H4>Debe A:</H4>

</div>


<div class="cuerpo2">

  <table>
    <tr>
      <td class="col">Nombre:</td>
      <td class="col"><?= $model->idEmpresa->nombre ?></td>
    </tr>
    <tr>
      <td class="col">nit:</td>
      <td class="col"><?= $model->idEmpresa->nit ?>-<?= $model->idEmpresa->digito_verificacion ?></td>
    </tr>
    <tr>
      <td class="col">dirección:</td>
      <td class="col"><?= $model->idEmpresa->direccion ?></td>
    </tr>
    <tr>
      <td class="col">ciudad:</td>
      <td class="col"><?= $model->idEmpresa->ciudad ?></td>
    </tr>
    <tr>
      <td class="col">telefono:</td>
      <td class="col"><?= $model->idEmpresa->telefono ?></td>
    </tr>
  </table>


  
</div>

<div class="cuerpo2">
  <?php 
  $f = new NumberFormatter("es_CO", NumberFormatter::CURRENCY);
   ?>
	<p>Valor: <?= $f->format($model->valor) ?></p>
	<p>Valor en letras: <?= strtoupper($numeros->ValorEnLetras($model->valor,"PESOS")); ?> </p>
	<p>Por Concepto de: <?= strtoupper($model->detalle) ?></p>
</div>

<div class="cuerpo2">
  <?php 
  use app\models\Bancos;
  $bancos = new Bancos();
  $cuentas = $bancos->find()->all(); 
  ?>
  <p>Puede Consignar en las siguentes cuentas:</p>
  <?php foreach ($cuentas as $row) { ?>
    <?php if ($row->id_empresa == $model->idEmpresa->id_empresa) {?>
    <span><?= $row->banco ?> </span><b>Nº <?= $row->numero_cuenta?> <?= $row->tipo_cuenta = ('1') ? 'ahorro' : 'corriente' ; ?></b> ||  
    <?php } ?>
    
  
  <?php } ?>
</div>
<div class="cuerpo3">
    <p class="centro"> Declaro voluntariamente y bajo la gravedad de juramento que no estoy obligado a expedir factura.</p>
    <div class="firma">
        <?= Html::img('uploads/'.$model->idEmpresa->firma,['width'=>'150px','margin-left'=>'10px']);?>
        
    </div>
    <div class="columna">
        <p>Firma: ________________________________</p>
    </div>
    <div class="columna">
        <p>Recibido: ________________________________</p>
    </div>
</div>
 
</div>

