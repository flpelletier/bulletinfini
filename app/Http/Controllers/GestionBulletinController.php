<?php

namespace App\Http\Controllers;


use Spipu\Html2Pdf\Html2Pdf;
use App\Moyenne;
use App\Periode;
use App\Promotion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GestionBulletinController extends Controller
{
    function index()
    {

        return view("management.bulletin.index")->with("promotions", Promotion::all());
    }

    function bulletin(Request $request)
    {
        return view("management.bulletin.bulletin")->with("promotion", Promotion::find($request->selector));
    }

    function add_bulletin($id)
    {
        return view("management.bulletin.create")->with("periode", Periode::find($id));
    }

    function create(Request $request)
    {
        //generatioon du pdf
        $periode = Periode::find($request->input("periode"));
        foreach ($periode->promotion->eleves as $eleve) {
            if ($request->input($eleve->id) != null) {
                foreach ($periode->promotion->matieres as $matiere) {

                    if ($eleve->notes->where('matiere_id', $matiere->id)->count() > 0) {

                        $number = 0;
                        $total = 0;
                        foreach ($eleve->notes->where('matiere_id', $matiere->id) as $note) {

                            $total += $note->note * $note->coefficient;
                            $number += $note->coefficient;
                        }
                        $d = Moyenne::where("eleve_id", $eleve->id)->where("matiere_id", $matiere->id)->where("periode_id", $periode->id)->get();
                        if ($d->count() == 0) {
                            $moyenne = new Moyenne();
                            $moyenne->note = $total / $number;
                            $moyenne->periode_id = $periode->id;
                            $moyenne->eleve_id = $eleve->id;
                            $moyenne->matiere_id = $matiere->id;
                            $moyenne->save();
                        } else {
                            $d[0]->note = $total / $number;
                            $d[0]->save();
                        }

                    }

                }

                $html2pdf = new Html2Pdf();
                $html2pdf->writeHTML($this->gethtml($eleve, $periode));
                $html2pdf->output();

            }
        }

    }

    function gethtml($eleve, $periode)
    {
        $html = "";
        $html = $html . '
<style type="text/css">
    table {
        border: 1px solid;
        margin: auto;
    }

    td, th {
        border: 0.5px solid;

    }
</style>
<div style="clear: both; float: left; width: 550px;">
    <h3 style="text-align: center;"><img src="' . url("images/header.png") . '" /></h3>
</div>
<h3 style="text-align: center;">RELEVE DE NOTES&nbsp; - Promotion '.$eleve->promotion->annee.' - '.$periode->nom.'</h3>
<table style="width: 100%; height: 100%; border-color: white;">
    <tbody style="width: 100%; height: 100%; border-color: white;">
    <tr style="height: 83px; border-color: white;">
        <td style="width: 22.3001%; height: 83px; border-color: white;">
            <p>Formation :&nbsp;</p>
        </td>
        <td style="width: 74.6999%; text-align: center; height: 83px; border-color: white;">
            <p>XXX</p>
            <p>XXXX</p>
        </td>
    </tr>
    <tr style="height: 53px;">
        <td style="width: 22.3001%; height: 53px; border-color: white;">
            <p>Nom de l\'apprentis :&nbsp; &nbsp;&nbsp;</p>
        </td>
        <td style="width: 74.6999%; height: 53px; border-color: white;">
            <p>'.strtoupper($eleve->nom) .' '.strtolower($eleve->prenom) .'</p>
        </td>
    </tr>
    </tbody>
</table>
<table cellspacing="0">
    <tbody>
    <tr style="height: p24px;">
        <td style="height: 20px; background-color: #E5E7E9" colspan="7">
            <p>Evaluation au sein du centre de formation</p>
        </td>
    </tr>
    <tr style="height: p24px;">
        <td style="height: 62px;" rowspan="2">
            <p>Mati&egrave;re</p>
        </td>
        <td style="height: p24px;" colspan="5">
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
    </tr>';
        foreach ($eleve->moyennes as $moyenne){
            $html = $html .'
        <tr style="height: p24px;">
        <td style="height: p24px;">
            <p>'.$moyenne->matiere->intitule.'</p>
        </td>
        <td style="height: p24px;">
            <p>'.$moyenne->matiere->coefficient.'</p>
        </td>
        <td style="height: p24px;">
            <p>12,50</p>
        </td>
        <td style="height: p24px;">&nbsp;</td>
        <td style="height: p24px;">
            <p>12,50</p>
        </td>
        <td style="height: p24px;">
            <p>11,39</p>
        </td>
        <td style="height: p24px;">
            <p>'.$moyenne->remarque.'</p>
        </td>
        </tr>';

        }

        $html = $html . '
    <tr style="height: p24px;">
        <td style="height: p24px;" colspan="4">
            <p>Moyenne</p>
        </td>
        <td style="height: p24px;">
            <p>14 ,34</p>
        </td>
        <td style="height: p24px;">
            <p>13,00</p>
        </td>
        <td style="height: p24px;">
            <p></p>
        </td>
    </tr>
    <tr>
        <td style="height: 10px;" colspan="7">&nbsp;</td>
    </tr>
    <tr style="height: p24px;">
        <td style="height: 20px; background-color: #E5E7E9;" colspan="7">
            <p>Evaluation en entreprise</p>
        </td>
    </tr>
    <tr style="height: p24px;">
        <td style="height: p24px;">
            <p>Anglais Professionnel</p>
        </td>
        <td style="height: p24px;">
            <p>1</p>
        </td>
        <td style="height: p24px;">
            <p>12,50</p>
        </td>
        <td style="height: p24px;">&nbsp;</td>
        <td style="height: p24px;">
            <p>12,50</p>
        </td>
        <td style="height: p24px;">
            <p>11,39</p>
        </td>
        <td style="height: p24px;">
            <p>Examen annul&eacute; pour cause de crise sanitaire.</p>
        </td>
    </tr>
    <tr>
        <td style="height: p24px;" colspan="7">&nbsp;</td>
    </tr>
    <tr style="height: p24px;">
        <td style="height: p24px;" colspan="4">
            <p>Moyenne</p>
        </td>
        <td style="height: p24px;">
            <p>14 ,34</p>
        </td>
        <td style="height: p24px;">
            <p>13,00</p>
        </td>
        <td style="height: p24px;">
            <p></p>
        </td>
    </tr>
      <tr>
<td style="height: 10px;" colspan="7">&nbsp;</td>
</tr>
<tr style="height: p24px;">
<td style="height: 20px; background-color: #E5E7E9;" colspan="7">
<p>Appréciation du conseil de promotion et du responsable de dispositif</p>
</td>
</tr>
<tr style="height: p24px;">
<td style="height: p24px;border-color: white;" colspan="1">
<p>Moyenne '.$periode->nom.'</p>
</td>
<td style="height: p24px; border-color: white;" colspan="6">
<p>XX/20</p>
</td>
</tr>
<tr>
<td style="height: p24px;border-color: white;" colspan="7">&nbsp;</td>
</tr>
<tr style="height: p24px;border-color: white;">
<td style="height: p24px;border-color: white;" colspan="2">
<p></p>
</td>
<td style="height: p24px;border-color: white;" colspan="3">
<p>A dole le</p>
</td>
<td style="height: p24px;border-color: white;">
<p>' . date("m.d.y").'</p>
</td>
  <td style="height: p24px;border-color: white;">
<p></p>
</td>
</tr>
  <tr style="height: p24px;">
<td style="height: p24px;border-color: white;" colspan="2">
<p></p>
</td>
<td style="height: p24px;border-color: white;" colspan="3">
<p>Le responsable de dispositif : </p>
</td>
<td style="height: p24px;border-color: white;">
<p>'. Auth::user()->surname.' '.Auth::user()->name .'</p>
</td>
  <td style="height: p24px;border-color: white;">
<p></p>
</td>
</tr>
    </tbody>
</table>';
        return $html;
    }
}
