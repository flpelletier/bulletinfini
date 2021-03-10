<?php

namespace App\Http\Controllers;

use App\Bulletin;
use App\MatieresCertification;
use App\Moyenne;
use App\MoyenneCertification;
use App\MoyenneClasse;
use App\MoyenneClasseCertification;
use App\Note;
use Illuminate\Http\Request;
use App\Promotion;
use Spipu\Html2Pdf\Html2Pdf;

class GestionCertificationController extends Controller
{
    function index()
    {

        return view("management.certification.index")->with("promotions", Promotion::all());
    }

    function bulletin(Request $request)
    {
        return view("management.certification.certification")->with("promotion", Promotion::find($request->selector));
    }

    function add_bulletin($id)
    {
        $promotion = Promotion::find($id);
        $matieres = MatieresCertification::all();
        return view("management.certification.create", compact("matieres", "promotion"));
    }

    function create(Request $request)
    {
        $promotion = Promotion::find($request->input("promotion"));
        $matieres = MatieresCertification::all();
        foreach ($promotion->eleves as $eleve) {
            if ($request->input($eleve->id) != null) {
                foreach ($matieres as $matiere) {
                    if ($eleve->certif_notes->where('matiere_id', $matiere->id)->count() > 0) {
                        $number = 0;
                        $total = 0;
                        $numberc = 0;
                        $totalc = 0;
                        $numbere = 0;
                        $totale = 0;
                        foreach ($eleve->certif_notes->where('matiere_id', $matiere->id) as $note) {
                            $total += $note->note * $note->coefficient;
                            $number += $note->coefficient;
                            if ($note->type == "continue") {
                                $totalc += $note->note * $note->coefficient;
                                $numberc += $note->coefficient;
                            } else {
                                $totale += $note->note * $note->coefficient;
                                $numbere += $note->coefficient;
                            }
                        }
                        $d = MoyenneCertification::where("eleve_id", $eleve->id)->where("matiere_id", $matiere->id)->get();
                        try {
                            if ($d->count() == 0) {
                                $moyenne = new MoyenneCertification();
                                $moyenne->note = $total / $number;
                                if ($numbere != 0) {
                                    $moyenne->exam = $totale / $numbere;
                                }
                                if ($numberc != 0) {
                                    $moyenne->continue = $totalc / $numberc;
                                }
                                $moyenne->remarque = $request->input("r_" . $eleve->id . "_" . $matiere->id);
                                $moyenne->eleve_id = $eleve->id;
                                $moyenne->matiere_id = $matiere->id;
                                $moyenne->save();

                            } else {
                                $d[0]->remarque = $request->input("r_" . $eleve->id . "_" . $matiere->id);
                                $d[0]->note = $total / $number;
                                $d[0]->save();
                            }
                        } catch (\Exception $e) {
                            echo $e;
                        }
                    }
                }
            }
        }


        foreach ($matieres as $matiere) {

            $total = 0;
            $number = 0;
            foreach ($promotion->eleves as $eleve) {
                if ($request->input($eleve->id) != null) {
                    foreach ($eleve->moyennes_certif->where("matiere_id", $matiere->id) as $moy) {
                        $total += $moy->note;
                        $number++;
                    }
                }
            }

            if ($number != 0) {
                $d = MoyenneClasseCertification::where("matiere_id", $matiere->id)->where("promotion_id", $promotion->id)->get();
                if ($d->count() == 0) {
                    $mc = new MoyenneClasseCertification();
                    $mc->promotion_id = $promotion->id;
                    $mc->matiere_id = $matiere->id;
                    $mc->note = $total / $number;
                    $mc->save();
                } else {
                    $d[0]->note = $total / $number;
                    $d[0]->save();
                }
            }
        }


        foreach ($promotion->eleves as $eleve) {
            if ($request->input($eleve->id) != null) {
                dump($request->input($eleve->id));
                if ($eleve->certif_notes->count() != 0) {
                    $html2pdf = new Html2Pdf();
                    $html2pdf->writeHTML($this->gethtml($eleve, $promotion));
                    $pdf_name = $this->randomstr(20) . '.pdf';
                    $pdf_path = $_SERVER['DOCUMENT_ROOT'] . '/pdf/' . $pdf_name;
                    $html2pdf->Output($pdf_path, 'F');
                    dd("je suis la");
                    /*   if (Bulletin::where('eleve_id', $eleve->id)->where('periode_id', $periode->id)->get()->count() > 0) {

                           $bt = Bulletin::where('eleve_id', $eleve->id)->where('periode_id', $periode->id)->get();
                           unlink($bt[0]->path);
                           $bt[0]->nom = 'bulletin de ' . $eleve->nom . "-" . $eleve->prenom;
                           $bt[0]->path = 'pdf/' . $pdf_name;
                           $bt[0]->appreciation = $request->input("appr_" . $eleve->id);
                           $bt[0]->date = date("Y-m-d H:i:s");
                           $bt[0]->eleve_id = $eleve->id;
                           $bt[0]->periode_id = $periode->id;
                           $bt[0]->save();
                       } else {

                           $bt = new Bulletin;
                           $bt->nom = 'bulletin de ' . $eleve->nom . "-" . $eleve->prenom;
                           $bt->path = 'pdf/' . $pdf_name;
                           $bt->appreciation = $request->input("appr_" . $eleve->id);
                           $bt->date = date("Y-m-d H:i:s");
                           $bt->eleve_id = $eleve->id;
                           $bt->periode_id = $periode->id;
                           $bt->save();
                       }*/
                }
            }
        }


    }

    private function caculate($eleve, $periode)
    {
        $notes = Note::where('eleve_id', $eleve->id)->where('periode_id', $periode->id)->get();
        $totalc = 0;
        $numberc = 0;
        foreach ($notes as $note) {
            $totalc += $note->note * $note->coefficient;
            $numberc += $note->coefficient;

        }
        if ($numberc != 0) {
            return ($totalc / $numberc);
        }
        return "XX";

    }

    function randomstr($length)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $string;
    }

    private function gethtml($eleve, $promotion)
    {
        $html = '<style type="text/css">
    table {
        border: 1px solid;
        margin: auto;
    }

    td, th {
        border: 0.5px solid;

    }
</style>
<div style="clear: both; float: left; width: 550px;">
<h3 style="text-align: center;"><img src="http://bult/images/header.png" /></h3>
</div>
<h5 style="text-align: center;">Formation:&nbsp; ' . $promotion->nom_complet . '</h5>
<table style="width: 100%; height: 100%; border-color: white;">
<tbody style="width: 100%; height: 100%; border-color: white;">
<tr style="height: 53px;">
<td style="width: 22.3001%; height: 53px; border-color: white;">
<p>Nom de l\'apprentis :&nbsp; &nbsp;&nbsp;</p>
</td>
<td style="width: 74.6999%; height: 53px; border-color: white;">
<p>' . strtoupper($eleve->nom) . ' ' . strtolower($eleve->prenom) . '</p>
</td>
</tr>
</tbody>
</table>
<table cellspacing="0">
<tbody>
<tr style="height: p24px;">
<td style="height: 20px; background-color: #e5e7e9; text-align: center" colspan="7">
<p>Evaluation au sein du centre de formation</p>
</td>
</tr>
<tr style="height: p24px;">
<td style="height: 62px;" rowspan="2">
<p>Mati&egrave;re</p>
</td>
<td style="height: p24px; text-align : center;" colspan="5">
<p>Notes sur 20</p>
</td>
<td style="height: 62px;" rowspan="2">
<p>Remarques</p>
</td>
</tr>
<tr style="height: p24px;">
<td style="height: p24px;">
<p>Coef</p>
</td>
<td style="height: p24px;">
<p>Ctrl Cont</p>
</td>
<td style="height: p24px;">
<p>Examen</p>
</td>
<td style="height: p24px;">
<p>Total</p>
</td>
<td style="height: p24px;">
<p>Classe</p>
</td>
</tr>
';

        foreach ($eleve->moyennes_certif as $moyenne) {

            $html = $html . '
<tr style="height: p24px;">
<td style="height: p24px;">
<p>' . $moyenne->matiere->matiere . '</p>
</td>
<td style="height: p24px;">
<p>' . $moyenne->matiere->coefficient . '</p>
</td>
<td style="height: p24px; background-color: #e5e7e9">
<p>&nbsp;</p>
</td>
<td style="height: p24px;">
<p>' . $moyenne->exam . '</p>
</td>
<td style="height: p24px;">
<p>' . $moyenne->note . '</p>
</td>
<td style="height: p24px;">
<p>' . $moyenne->matiere->moyenne_classes[0]->note . '</p>
</td>
<td style="height: p24px;">
<p>' . $moyenne->remarque . '</p>
</td>
</tr>';
        }
        $total = 0;
        $number = 0;
        $totalc = 0;
        $numberc = 0;
        $totale = 0;
        $numbere = 0;
        $totalec = 0;
        $numberec = 0;
        foreach ($eleve->moyennes_certif as $moyenne) {
            $total += $moyenne->note * $moyenne->matiere->coefficient;
            $number += $moyenne->matiere->coefficient;
            $totalc += $moyenne->matiere->moyenne_classes[0]->note * $moyenne->matiere->coefficient;
            $numberc += $moyenne->matiere->coefficient;
            if ($moyenne->matiere->id == 1 || $moyenne->matiere->id == 3) {
                dump($moyenne->matiere->id);
                $totale += $moyenne->note * $moyenne->matiere->coefficient;
                $numbere += $moyenne->matiere->coefficient;
                $totalec += $moyenne->matiere->moyenne_classes[0]->note * $moyenne->matiere->coefficient;
                $numberec += $moyenne->matiere->coefficient;
            }
        }
        $moy_eleve = $total / $number;
        $moy_class = $totalc / $numberc;
        $moy_elevePro = $totale / $numbere;
        $moy_classPro = $totalec / $numberec;
        $html = $html . '<tr style="height: p24px;">
<td style="height: p24px;" colspan="4">
<p>Moyenne</p>
</td>
<td style="height: p24px;">
<p>' . substr($moy_eleve, 0, 4) . '</p>
</td>
<td style="height: p24px;">
<p>' . substr($moy_class, 0, 4) . '</p>
</td>
<td style="height: p24px;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="height: 10px;" colspan="7">&nbsp;</td>
</tr>
<tr style="height: p24px;">
<td style="height: 20px; background-color: #e5e7e9;" colspan="7">
<p>Evaluation en entreprise</p>
</td>
</tr>
<tr style="height: p24px;">
<td style="height: p24px;" colspan="4">
<p>Projet entreprise</p>
</td>
<td style="height: p24px;">
<p>' . substr($moy_elevePro, 0, 4) . '</p>
</td>
<td style="height: p24px;">
<p>' . substr($moy_classPro, 0, 4) . '</p>
</td>
<td style="height: p24px;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="height: 10px;" colspan="7">&nbsp;</td>
</tr>
<tr style="height: p24px;">
<td style="height: 20px; background-color: #e5e7e9; text-align : center; " colspan="7">
<p>Appr&eacute;ciation du conseil de promotion et du responsable de dispositif</p>
</td>
</tr>
';
        $total_moy = 0;
        $numbert = 0;
        foreach ($promotion->periodes as $periode) {

           $note =  $this->caculate($eleve, $periode);
            $html = $html . '<tr style="height: p24px;">
<td style="height: p24px; border-color: white;" colspan="1">
<p>Moyenne ' . $periode->nom . '</p>
</td>
<td style="height: p24px; border-color: black; text-align : center;" colspan="6">
<p>' . $note. '/20</p>
</td>
</tr>';


            if(is_numeric($note)){
                $total_moy = $total_moy + intval ( $note ,  10 ) ;
                $numbert++;
            }
        }
        $numbert = $numbert + 2;
        $total_moy = $total_moy + ($moy_eleve * 2);
        $moyenne_total = $total_moy/$numbert;




        $html = $html . '<tr>
<td style="height: p24px; border-color: white;" colspan="7">&nbsp;</td>
</tr>
<tr style="height: p24px; border-color: white;">
<td style="height: p24px; border-color: white;">
<p>Moyenne Certification</p>
</td>
  <td style="height: p24px; border-color: black;">
<p>' . substr($moy_eleve, 0, 4) . '</p>
</td>
<td style="height: p24px; border-color: white;" colspan="3">
<p>A Dole le</p>
</td>
<td style="height: p24px; border-color: white;">
<p>'.date("d/m/Y").'</p>
</td>
<td style="height: p24px; border-color: white;">
<p>&nbsp;</p>
</td>
</tr>
<tr style="height: p24px;">
<td style="height: p24px; border-color: white;" >
<p>Total</p>
</td>
  <td style="height: p24px; border-color: black;">
<p>'.$moyenne_total.'</p>
</td>
<td style="height: p24px; border-color: white;" colspan="3">
<p>Le responsable de dispositif :</p>
</td>
<td style="height: p24px; border-color: white;">
<p>Julian Courbez</p>
</td>
<td style="height: p24px; border-color: white;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
';
        return $html;
    }
}
