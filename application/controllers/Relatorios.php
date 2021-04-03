<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Relatorios extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->add_package_path( APPPATH . 'third_party/fpdf');
        $this->load->library('pdf');

        $coletas_model = $this->load->model('coletas_model');
        $clubes_model = $this->load->model('clubes_model');	
    }

    public function clube_coletas($clube)
	{

        $dados['clube'] = $this->clubes_model->getClube($clube);
        $dados['municipio'] = $this->clubes_model->getMunicipio($dados['clube']->MUNICIPIO); 
        $dados['coletas'] = $this->coletas_model->getColetasClube($clube); 
        $dados['redes_sociais'] = $this->clubes_model->getRedesSociais();


        $header = array('Clube', 'Divisão', 'Município', 'Data da Coleta');
        foreach($dados['redes_sociais'] as $key =>  $item){
            array_push($header,$item->NOME);
        }

        array_push($header,"Acumulado");

        $i = 0;
        foreach($dados['coletas'] as $key =>  $item){            
            $i++;
            $itens[$i]['CLUBE'] = $dados['clube']->CLUBE; 
            $itens[$i]['DIVISAO'] = $dados['clube']->DIVISAO; 
            $itens[$i]['MUNICIPIO'] = $this->clubes_model->getMunicipio($item->MUNICIPIO)->MUNICIPIO; 
            $itens[$i]['MES'] = $item['MES'];
            foreach($item['REDES'] as $c =>  $rede){
                $itens[$i][$c] = $rede['VALOR']." / ".$rede['PORCENTAGEM']."%";
            }               
            $itens[$i]['ACUMULADO'] = $item['ACUMULADO'];
           
       }

        // echo "<pre>";
        // print_r($itens);
        // echo "</pre>";
        // exit;
       
        $this->pdf = new Pdf();
        $this->pdf->Add_Page('P','A4',0);
        $this->pdf->AliasNbPages();

        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial','B',15);        
        $this->pdf->SetTextColor(0);
        $titulo = utf8_decode($dados['clube']->NOME_COMPLETO);       
        $w = $this->pdf->GetStringWidth($titulo)+6;
        $this->pdf->SetX((210-$w)/2);
        $this->pdf->Cell(10,0,$titulo);

        $this->tabela($header,$itens);
        
        $this->pdf->Output( 'page.pdf' , 'I' );
	}

	public function clubes_municipio($clube)
	{

        $dados['clube'] = $this->clubes_model->getClube($clube);
        $dados['municipio'] = $this->clubes_model->getMunicipio($dados['clube']->MUNICIPIO); 
        $dados['clubes_municipio'] = $this->clubes_model->getClubesMunicipio($dados['municipio']->ID);
        $dados['redes_sociais'] = $this->clubes_model->getRedesSociais();


        $header = array('Clube', 'Divisão', 'Município', 'Data da Coleta');
        foreach($dados['redes_sociais'] as $key =>  $item){
            array_push($header,$item->NOME);
        }

        array_push($header,"Acumulado");

        $i = 0;
        foreach($dados['clubes_municipio'] as $key =>  $item){
            foreach($item->COLETAS as $chave =>  $coleta){
                $i++;
                $itens[$i]['CLUBE'] = $item->CLUBE; 
                $itens[$i]['DIVISAO'] = $item->DIVISAO; 
                $itens[$i]['MUNICIPIO'] = $this->clubes_model->getMunicipio($item->MUNICIPIO)->MUNICIPIO; 
                $itens[$i]['MES'] = $coleta['MES'];
                foreach($coleta['REDES'] as $c =>  $rede){
                    $itens[$i][$c] = $rede['VALOR']." / ".$rede['PORCENTAGEM']."%";
                }               
                $itens[$i]['ACUMULADO'] = $coleta['ACUMULADO'];
            }
       }
       
        $this->pdf = new Pdf();
        $this->pdf->Add_Page('P','A4',0);
        $this->pdf->AliasNbPages();

        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial','B',15);        
        $this->pdf->SetTextColor(0);
        $titulo = utf8_decode('Clubes por Município - ').utf8_decode($dados['municipio']->MUNICIPIO);       
        $w = $this->pdf->GetStringWidth($titulo)+6;
        $this->pdf->SetX((210-$w)/2);
        $this->pdf->Cell(10,0,$titulo);

        $this->tabela($header,$itens);
        
        $this->pdf->Output( 'page.pdf' , 'I' );
	}

    public function clubes_divisao($clube)
	{

        $dados['clube'] = $this->clubes_model->getClube($clube);    

        // print_r($dados['clube']);
        // exit;

        $dados['municipio'] = $this->clubes_model->getMunicipio($dados['clube']->MUNICIPIO);    
        $dados['clubes_divisao'] = $this->clubes_model->getClubesDivisao($dados['clube']->DIVISAO);
        $dados['redes_sociais'] = $this->clubes_model->getRedesSociais();


        $header = array('Clube', 'Divisão', 'Município', 'Data da Coleta');
        foreach($dados['redes_sociais'] as $key =>  $item){
            array_push($header,$item->NOME);
        }

        array_push($header,"Acumulado");

        $i = 0;      


        foreach($dados['clubes_divisao'] as $key =>  $item){
            foreach($item->COLETAS as $chave =>  $coleta){
                $i++;
                $itens[$i]['CLUBE'] = $item->CLUBE; 
                $itens[$i]['DIVISAO'] = $item->DIVISAO->ID; 
                $itens[$i]['MUNICIPIO'] = $this->clubes_model->getMunicipio($item->MUNICIPIO)->MUNICIPIO; 
                $itens[$i]['MES'] = $coleta['MES'];
                foreach($coleta['REDES'] as $c =>  $rede){
                    $itens[$i][$c] = $rede['VALOR']." / ".$rede['PORCENTAGEM']."%";
                }               
                $itens[$i]['ACUMULADO'] = $coleta['ACUMULADO'];
            }
       }

    
       
        $this->pdf = new Pdf();
        $this->pdf->Add_Page('P','A4',0);
        $this->pdf->AliasNbPages();

        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial','B',15);        
        $this->pdf->SetTextColor(0);
        $titulo = utf8_decode('Clubes por Divisão - ').utf8_decode($dados['clubes_divisao'][0]->DIVISAO->TITULO);       
        $w = $this->pdf->GetStringWidth($titulo)+6;
        $this->pdf->SetX((210-$w)/2);
        $this->pdf->Cell(10,0,$titulo);

        $this->tabela($header,$itens);
        
        $this->pdf->Output( 'page.pdf' , 'I' );
	}


    public function tabela($header,$itens){       

        $this->pdf->Ln(10);   
        $this->pdf->SetX(11);      
        //$header = array('Qtde.', 'Unid.', 'Item');
        $this->pdf->SetFont('Arial','B',10); 
        $this->pdf->SetX(11); 
        $this->pdf->BasicTable($header,$itens);     
    }
}

/*
* application/controllers/Testpdf.php
*/
