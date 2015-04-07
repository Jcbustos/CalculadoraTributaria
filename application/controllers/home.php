<?php /**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->view('home');
	}

	function calcular(){
		$B2 = str_replace(".", "", $this->input->post('renta'));
		$B3 = str_replace(".", "", $this->input->post('ahorro'));
		$B4 = str_replace(".", "", $this->input->post('fumas'));

		$C6 = str_replace(".", "", $this->input->post('bencina'));
		$C7 = str_replace(".", "", $this->input->post('diesel'));
		
		$C8 = str_replace(".", "", $this->input->post('vino'));
		$C9 = str_replace(".", "", $this->input->post('cerveza'));
		$C10 = str_replace(".", "", $this->input->post('pisco'));
		$C11 = str_replace(".", "", $this->input->post('anhalcol'));

		$B13 = str_replace(".", "", $this->input->post('conoceValor'));
		$B14 = str_replace(".", "", $this->input->post('valorVivienda'));
		$B15 = str_replace(".", "", $this->input->post('dfl2'));

		//Variables calculadas
		$B33 = $this->afp($B2);
		$B34 = $this->isapre($B2);
		$B35 = $this->seguroCesantia($B2);
		$Q2 = $this->rentaImponible($B2,$B33, $B34, $B35);
		$B21 = $this->renta($Q2);
		$B24 = $this->ILA($C8, $C9, $C10);
		//echo "B24 = ".$B24."<br>";
		$B25 = $this->IABA($C11, $C10);
		//echo "B25 = ".$B25."<br>";
		$B26 = $this->tabaco($B4);
		//echo "B26 = ".$B26."<br>";
		$B27 = $this->combustibles($C6, $C7);
		//echo "B27 = ".$B27."<br>";
		$B28 = $this->contribuciones($B13, $B15, $B2, $B14,$Q2);
		
		$SUMA = $B24 + $B25 + $B26 + $B27 + $B28;
		//echo "----".$SUMA;
		$Q3 = $Q2-$B21;
		$B22 = $this->iva($Q3,$B3,$SUMA);
		$B23 = $this->arancel($Q3, $B3, $B22, $SUMA);

		$B37 = $this->totalImpuestos($B2,$B3,$SUMA,$B33, $B34, $B35);
		$B38 = $this->totalAnual($B37);
		$C39 = $this->totalImpuestoSegSocial($B37, $B33, $B34, $B35);
		$C40 = $this->totalImpuestoSegSocialAnual($C39);

		//Impuestos
		$data['renta'] = number_format($B21,0,',','.');
		$data['iva'] = number_format($B22,0,',','.');
		$data['aranceles'] = number_format($B23,0,',','.');
		$data['ILA'] = number_format($B24,0,',','.');
		$data['IABA'] = number_format($B25,0,',','.');
		$data['tabaco'] = number_format($B26,0,',','.');
		$data['bencina'] = number_format($B27,0,',','.');
		$data['contribuciones'] = number_format($B28,0,',','.');

		//Datos
		$data['afp'] = number_format($B33,0,',','.');
		$data['fonasa'] = number_format($B34,0,',','.');
		$data['cesantia'] = number_format($B35,0,',','.');
		$data['impuestos'] = number_format($B37,0,',','.');
		$data['anual'] = number_format($B38,0,',','.');
		$data['segSocial'] = number_format($C39,0,',','.');
		$data['segSocialAnual'] = number_format($C40,0,',','.');
		$this->load->view('resultados',$data);
	}

	function totalImpuestos($B2 = 0,$B3 = 0,$SUMA = 0, $B33 = 0, $B34 = 0, $B35 = 0){
		$Q2 = $this->rentaImponible($B2,$B33, $B34, $B35);
		$B21 = $this->renta($Q2);
		$Q3 = $Q2-$B21;
		$B22 = $this->iva($Q3,$B3,$SUMA);
		$B23 = $this->arancel($Q3, $B3, $B22, $SUMA);
		return $B21+$B22+$B23+$SUMA;
	}

	private function rentaImponible($B2 = 0,$B33 = 0, $B34 = 0, $B35 = 0){
		return $B2-$B33-$B34-$B35;
	}

	function totalImpuestoSegSocialAnual($C39 = 0){
		return $C39*12;
	}

	function totalImpuestoSegSocial($B37, $B33, $B34, $B35){
		return $B37+$B33+$B34+$B35;
	}


	function totalImpuesto($B21, $B22, $B23, $B24, $B25, $B26, $B27, $B28){
		return $B21+$B22+$B23+$B24+$B25+$B26+$B27+$B28;
	}

	function totalAnual($B37 = 0){
		return $B37*12;
	}

	function seguroCesantia($B2 = 0){
		$datos = array('estado' => 1);
		$datos['nombre'] = 'cesantia'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F12 = str_replace(",", ".", $valor[0]->valor);

		}else{
			$F12 = 0;
		}
		$datos['nombre'] = 'uf'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F2 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$F2 = 0;
		}
		if($B2 < $F12*$F2){
			return 0.006*$B2;
		}else{
			return $F12*$F2*0.006;
		}
	}

	function isapre($B2 = 0){
		$datos = array('estado' => 1);
		$datos['nombre'] = 'afp'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F11 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$F11 = 0;
		}
		$datos['nombre'] = 'uf'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F2 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$F2 = 0;
		}
		if($B2 < $F11*$F2){
			return 0.07*$B2;
		}else{
			return $F11*$F2*0.07;
		}
	}

	function afp($B2 = 0){
		$datos = array('estado' => 1);
		$datos['nombre'] = 'afp'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F11 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$F11 = 0;
		}
		$datos['nombre'] = 'uf'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F2 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$F2 = 0;
		}
		$datos['nombre'] = 'cajetilla'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F10 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$F10 = 0;
		}
		$I10 = $this->tasaAFP()/100;
		if($B2 < $F11*$F2){
			return $I10*$B2;
		}else{
			return $F11*$F2*$I10;
		}
	}

	private function tasaAFP(){
		$suma = 0;
		$datos = array('estado' => 1);
		$datos['nombre'] = 'afpCapital'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$suma += str_replace(",", ".", $valor[0]->valor);
		}
		$datos['nombre'] = 'afpCuprum'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$suma += str_replace(",", ".", $valor[0]->valor);
		}
		$datos['nombre'] = 'afpHabitat'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$suma += str_replace(",", ".", $valor[0]->valor);
		}
		$datos['nombre'] = 'afpPlanVital'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$suma += str_replace(",", ".", $valor[0]->valor);
		}
		$datos['nombre'] = 'afpProvida'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$suma += str_replace(",", ".", $valor[0]->valor);
		}
		$datos['nombre'] = 'afpModelo'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$suma += str_replace(",", ".", $valor[0]->valor);
		}
		return round(($suma) / 6,2);
	}

	function contribuciones($B13 = '',$B15 = 0,$B2 = 0,$B14 = 0,$Q2 = 0){
		$Q7 = $this->auxiliarContribuciones($B13,$B14,$B2,$Q2);
		if($B15 < 2){
			return $Q7;
		}else{
			return $Q7*0.5;
		}
	}

	function auxiliarContribuciones($B13 = '', $B14 = 0,$B2 = 0,$Q2 = 0){
		if($B13 == ''){
			return 0;
		}else{
			$var = $this->impuestoContribuciones($B13,$B14,$B2,$Q2);
			return $var/12;
		}
	}

	private function impuestoContribuciones($B13,$B14,$B2,$Q2){
		$var = 0;
		$datos = array('estado' => 1);
		if($B13 == '2'){
			//L25
			$L25 = 0;
			$datos['nombre'] = 'excentoSiHasta'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$J24 = str_replace(",", ".", $valor[0]->valor);
			}
			$datos['nombre'] = 'primerSiHasta'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$J25 = str_replace(",", ".", $valor[0]->valor);
			}
			$datos['nombre'] = 'primerSiTasa'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$K25 = str_replace(",", ".", $valor[0]->valor);
			}
			if($B14<$J25 && $B14>0){
				$var += ($B14-$J24)*$K25;
			}

			//L26
			$L26 = 0;
			$datos['nombre'] = 'segundoSiTasa'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$K26 = str_replace(",", ".", $valor[0]->valor);
			}
			if($B14>$J25){
				$var += ($B14-$J25)*$K26+($J25-$J24)*$K25;
			}
		}else{
			$Q8 = $this->auxiliarContribucionesNo($B2,$Q2);
			$datos['nombre'] = 'primerNoHasta'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$J30 = str_replace(",", ".", $valor[0]->valor);
			}
			$datos['nombre'] = 'excentoNoHasta'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$J29 = str_replace(",", ".", $valor[0]->valor);
			}
			$datos['nombre'] = 'primerNoTasa'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$K30 = str_replace(",", ".", $valor[0]->valor);
				$K30 = $K30/100;
			}

			if($Q8<$J30 && $Q8>0){
				$var += ($Q8-$J29)*$K30;
			}

			$datos['nombre'] = 'segundoNoTasa'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$K31 = str_replace(",", ".", $valor[0]->valor);
				$K31 = $K31/100;
			}
			if($Q8>$J30){
				$var+= ($Q8-$J30)*$K31+($J30-$J29)*$K30;
			}
		}
		return $var;
	}

	private function auxiliarContribucionesNo($B2 = 0,$Q2 = 0){
		$datos = array('estado' => 1);
		$datos['nombre'] = 'precioBase'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F20 = str_replace(",", ".", $valor[0]->valor);
		}
		$datos['nombre'] = 'uf'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F2 = str_replace(",", ".", $valor[0]->valor);
		}
		$datos['nombre'] = 'pendienteCasaSueldo'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F22 = str_replace(",", ".", $valor[0]->valor);
			$F22 = $F22/100;
		}
		$B21 = $this->renta($Q2);
		$Q3 = $Q2-$B21;
		$datos['nombre'] = 'ingresoLiquidoCasa'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F21 = str_replace(",", ".", $valor[0]->valor);
		}
		return round($F20*$F2+(1+$F22)*($Q3-$F21));
	}

	private function auxiliarContribucionesSi($B13 = 0){ //Pendiente
		$datos = array('estado' => 1);
		$datos['nombre'] = 'precioBase'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F20 = str_replace(",", ".", $valor[0]->valor);
		}
		
		if($B13==''){
			$aux = 0;
		}else{
			if($B13 == '2'){
				$aux = $L27;
			}else{
				$aux = $L32;
			}
			$aux = $aux/12;
		}
	}


	function combustibles($C6 = 0,$C7 = 0){
		$datos = array('estado' => 1);
		$datos['nombre'] = 'bencina'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F4 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$F4 = 0;
		}
		$datos['nombre'] = 'utm'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F3 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$F3 = 0;
		}
		$datos['nombre'] = 'diesel'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F5 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$F5 = 0;
		}
		return ($C6/$F4*6*$F3/1000)+($C7/$F5*1.5*$F3/1000);
	}

	function tabaco($B4 = 0){
		if($B4 == '' || $B4 == 0){
			return 0;
		}else{
			$datos = array('estado' => 1);
			$datos['nombre'] = 'cajetilla'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F10 = str_replace(",", ".", $valor[0]->valor);
			}else{
				$F10 = 0;
			}
			return $B4*$F10*4;
		}
	}

	function IABA($bebidas = 0,$pisco = 0){
		$C11 = $bebidas;
		$C10 = $pisco;
		if(($C11 == '' && $C10 == '') || ($C11 == '0' && $C10 == '0') || ($C11 == '0' && $C10 == '') || ($C11 == '' && $C10 == '0')){
			return 0;
		}else{
			$datos = array('estado' => 1);
			$datos['nombre'] = 'bebida'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F9 = str_replace(",", ".", $valor[0]->valor);
			}else{
				$F9 = 0;
			}
			$datos['nombre'] = 'impBebida'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F17 = str_replace(",", ".", $valor[0]->valor);
				$F17 = $F17/100;
			}else{
				$F17 = 0;
			}
			$datos['nombre'] = 'iva'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F14 = str_replace(",", ".", $valor[0]->valor);
				$F14 = $F14/100;
			}else{
				$F14 = 0;
			}
			$Q6 = $this->auxiliaBebidasGaseosasIndep($C11,$F9,$F17,$F14) + $this->auxiliaBebidasGaseosasPiscola($C10,$F9,$F17,$F14);
			return $Q6;
		}
	}

	private function auxiliaBebidasGaseosasPiscola($C10,$F9,$F17,$F14){
		if($C10 == ''){
			return 0;
		}else{
			return $C10/12.5*$F9/((1+$F17/(1+$F17)+$F14/(1+$F14))*$F17*4);
		}
	}

	private function auxiliaBebidasGaseosasIndep($C11,$F9,$F17,$F14){
		if($C11 == ''){
			return 0;
		}else{
			return $C11/5*$F9/(1+$F17/(1+$F17)+$F14/(1+$F14));
		}
	}

	function ILA($vino = '',$cerveza = '', $pisco = ''){
		$var = 0;
		$datos = array('estado' => 1);
		$C8 = $vino;
		$datos['nombre'] = 'iva'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F14 = str_replace(",", ".", $valor[0]->valor);
			$F14 = $F14/100;
		}else{
			$F14 = 0;
		}

		$datos['nombre'] = 'impCervezaVino'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F15 = str_replace(",", ".", $valor[0]->valor);
			$F15 = $F15/100;
		}else{
			$F15 = 0;
		}
		if($C8 != ''){
			$datos['nombre'] = 'vino'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F6 = str_replace(",", ".", $valor[0]->valor);
			}else{
				$F6 = 0;
			}
			$var = $C8/6*$F6/(1+$F14/(1+$F14)+$F15/(1+$F15))*$F15;
		}
		$C9 = $cerveza;
		if($C9 != ''){
			$datos['nombre'] = 'cerveza'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F7 = str_replace(",", ".", $valor[0]->valor);
			}else{
				$F7 = 0;
			}
			$var += $C9/3*$F7/(1+$F14/(1+$F14)+$F15/(1+$F15))*$F15;
		}
		$C10 = $pisco;
		if($C10 != ''){
			$datos['nombre'] = 'pisco'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F8 = str_replace(",", ".", $valor[0]->valor);
			}else{
				$F8 = 0;
			}

			$datos['nombre'] = 'impLicor'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F16 = str_replace(",", ".", $valor[0]->valor);
				$F16 = $F16/100;
			}else{
				$F16 = 0;
			}
			$var += $C10/9*$F8/(1+$F14/(1+$F14)+$F16/(1+$F16))*$F16;
		}
		return $var * 4;
	}

	function arancel($Q3 = 0,$B3 = 0,$IVA = 0,$SUMA = 0){
		if($Q3 == 0){
			return 0;
		}else{
			$B22 = $IVA;
			$datos = array('estado' => 1);
			$datos['nombre'] = 'arancel'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F18 = str_replace(",", ".", $valor[0]->valor);
				$F18 = $F18/100;
			}else{
				$F18 = 0;
			}
			$datos['nombre'] = 'bienesImportados'; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$F19 = str_replace(",", ".", $valor[0]->valor);
				$F19 = $F19/100;
			}else{
				$F19 = 0;
			}
			return round(($Q3-$B3-$B22-$SUMA)*($F18/(1+$F18)*$F19));
		}
	}

	function iva($Q3,$B3,$SUMA){
		$datos = array('estado' => 1);
		$datos['nombre'] = 'iva'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F14 = str_replace(",", ".", $valor[0]->valor);
			$F14 = $F14/100;
		}else{
			$F14 = 0;
		}
		$datos['nombre'] = 'arancel'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$F18 = str_replace(",", ".", $valor[0]->valor);
			$F18 = $F18/100;
		}else{
			$F18 = 0;
		}

		if($Q3 == 0){
			return 0;
		}else{
			return round(($Q3-$B3-$SUMA)*$F14/(1+$F14)*(1-$F18));
		}
		
	}

	function renta($q2){
		$datos = array('estado' => 1);
		$total = 0;
		$datos['nombre'] = 'utm'; 
		$valor = $this->model_datos->getWhere($datos);
		if($valor){
			$f3 = str_replace(",", ".", $valor[0]->valor);
		}else{
			$f3 = 0;
		}
		for ($i=0; $i < 8; $i++) { 
			//Recojo valores
		 	$datos['nombre'] = 'desde'.$i; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$hn = str_replace(",", ".", $valor[0]->valor);
			}else{
				$hn = 0;
			}
			
			$datos['nombre'] = 'hasta'.$i; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$in = str_replace(",", ".", $valor[0]->valor);
			}else{
				$in = 0;
			}
			
			$datos['nombre'] = 'tasaMG'.$i; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$jn = str_replace(",", ".", $valor[0]->valor);
			}else{
				$jn = 0;
			}
			
			$datos['nombre'] = 'exento'.$i; 
			$valor = $this->model_datos->getWhere($datos);
			if($valor){
				$kn = str_replace(",", ".", $valor[0]->valor);
			}else{
				$kn = 0;
			}

			//Calculo
			if($q2 > $hn*$f3  &&  ($q2 <= $in*$f3 || $in == 0)){
				$total += $jn*$q2-$kn*$f3;
			}
		}
		return round($total);
	}
} ?>