<?php

namespace App\Http\Controllers;


class XhuliController extends Controller
{
    private $dalja = 'Dalja TU';
    private $transformator = 'Transformator Fuqie';
    private $panel = 'Panel TU'; private $cele = 'Cele';
    private $ndares = 'Ndares TM';

    private $lejlaNdertese = 'Ndertese;Kabine Elektrike';
    private $lejlaToke = 'Toke;Kabine Elektrike';

    private $shtylla = 'Shtylle';

    public function xhuli2(){
        $texhulit = array_map('str_getcsv', file(public_path(). '/DR Vlore-Per Vleresim-D.csv'));
        $tendryshuarat = array_map('str_getcsv', file(public_path(). '/Vlore Vleresim.csv'));

        foreach($texhulit as $line) {
            dd($line);
        }
        $ka4assetet = fopen("ka4assetet.csv", "a");
//        fputcsv($csvName, $line); # $line is an array of strings (array|string[])

    }

    public function xhuli(){
        $kabinat = array_map('str_getcsv', file(public_path(). '/perdorxlsx.csv'));
        $kabinaAssete = [];
        foreach ($kabinat as $kabine) {
            $kabinaAssete[$kabine[0]][] = isset($kabine[1]) ? $kabine[1] : "";
        }
        $ka4assetet = fopen("ka4assetet.csv", "a");
        $kaneVetemLejla = fopen("kaneVetemLejla2.csv", "a");
        $lejlaDheOtherStuff = fopen("lejlaDheOtherStuff.csv", "a");
        $skaLejlaFare = fopen("skaLejlaFare.csv", "a");
        $skaLejlaPorKaShtylle = fopen("skaLejlaPorKaShtylle.csv", "a");
        $juMungonNjeAsset = fopen("mungonNjeAsset.csv", "a");
        $kaDalje = fopen("kaDalje.csv", "a");
        $skaLejlaAsShtylle = fopen("skaLejlaAsShtylle.csv", "a");
        $skaTranformator = fopen("skatranformator2.csv", "a");
        $twoorMoreTranformator = fopen("2ormoretranformator.csv", "a");
        $kaVetemDalje = fopen("vetemDalje2.csv", "a");
        $asCeleAsPanel = fopen("asCeleAsPanel.csv", "a");
        $njeMePanelDheGjeraTjera = fopen("mePanelDhePaCaGjera.csv", "a");
        $shumeLejla = fopen("shumeLejla.csv", "a");

        foreach ($kabinaAssete as $kabina => $assetet) {
            if ($this->kaVetemDalje($assetet)) {
                $this->addToCsv($kaVetemDalje, $kabina, $assetet);
            }
            if ($this->skaTransformator($assetet)) {
                $this->addToCsv($skaTranformator, $kabina, $assetet);
            }
            if ($this->twoorMoreTransformator($assetet)) {
                $this->addToCsv($twoorMoreTranformator, $kabina, $assetet);
            }
            if ($this->skaCeleAsPanel($assetet)) {
                $this->addToCsv($asCeleAsPanel, $kabina, $assetet);
            }
            if ($this->panelPoJoCateTjera($assetet)) {
                $this->addToCsv($njeMePanelDheGjeraTjera, $kabina, $assetet);
            }
            if ($this->shumeLejla($assetet)) {
                $this->addToCsv($shumeLejla, $kabina, $assetet);
            }

//            if ($this->skaLejla($assetet) && !$this->kaShtylle($assetet)) {
//                                $this->addToCsv($skaLejlaAsShtylle, $kabina, $assetet);
//            }
//            if ($this->juMungonNjeAsset($assetet)) {
//                $this->addToCsv($juMungonNjeAsset, $kabina, $assetet);
//            }
//            if ($this->kaneDaljeOseLejlate($assetet)) {
//                $this->addToCsv($kaDalje, $kabina, $assetet);
//            }

//            if ($this->ka4assete($assetet)) {
//                $this->addToCsv($ka4assetet, $kabina, $assetet);
//            }
            if ($this->kaVetemLejla($assetet)) {
                $this->addToCsv($kaneVetemLejla, $kabina, $assetet);
            }
//            if ($this->kaLejlaDheTeTjera($assetet)) {
//                $this->addToCsv($lejlaDheOtherStuff, $kabina, $assetet);
//            }
//            if ($this->skaLejla($assetet)) {
//                $this->addToCsv($skaLejlaFare, $kabina, $assetet);
//            }
//            if ($this->skaLejla($assetet) && $this->kaShtylle($assetet)) {
//                $this->addToCsv($skaLejlaPorKaShtylle, $kabina, $assetet);
//            }
        }
        fclose($ka4assetet);
        fclose($kaneVetemLejla);
        fclose($lejlaDheOtherStuff);
        fclose($skaLejlaFare);
        fclose($skaLejlaPorKaShtylle);
    }

    public function xhuli3() {
        $kabinat = array_map('str_getcsv', file(public_path(). '/toka dhe ndertesa.csv'));
        $kabinaAssete = [];
        foreach ($kabinat as $kabine) {
            $kabinaAssete[$kabine[0]][] = isset($kabine[1]) ? $kabine[1] : "";
        }
        $kavtm1 = fopen("kavtm1.csv", "a");
        $asnje = fopen("asnje.csv", "a");

        foreach ($kabinaAssete as $kabina => $assetet) {
            if ($this->kaVetem1($assetet)) {
                $this->addToCsv($kavtm1, $kabina, $assetet);
            }
            if ($this->asnje($assetet)) {
                $this->addToCsv($asnje, $kabina, $assetet);
            }
        }
    }

    private function kaVetem1($assets) {
        $kaNdertese=false;
        $kaToke=false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->lejlaNdertese)) !== false)
                $kaNdertese = true;
            if (strpos(strtolower($asset), strtolower($this->lejlaToke)) !== false)
                $kaToke = true;
        }
        return ($kaNdertese && !$kaToke) || ($kaToke && !$kaNdertese);
    }

    private function asnje($assets) {
        $kaNdertese=false;
        $kaToke=false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->lejlaNdertese)) !== false)
                $kaNdertese = true;
            if (strpos(strtolower($asset), strtolower($this->lejlaToke)) !== false)
                $kaToke = true;
        }
        return !$kaToke && !$kaNdertese;
    }

    private function ka4assete($assets) {
        $kaDalje = false;
        $kaTransformator = false;
        $kaPanel = false;
        $kaCele = false;
        $kaNdares = false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->dalja)) !== false)
                $kaDalje = true;
            if (strpos(strtolower($asset), strtolower($this->transformator)) !== false)
                $kaTransformator = true;
            if (strpos(strtolower($asset), strtolower($this->panel)) !== false)
                $kaPanel = true;
            if (strpos(strtolower($asset), strtolower($this->cele)) !== false)
                $kaCele = true;
            if (strpos(strtolower($asset), strtolower($this->ndares)) !== false)
                $kaNdares = true;
        }
        return $kaDalje && $kaTransformator && ($kaPanel || $kaCele) && $kaNdares;
    }

    public function kaVetemLejla($assets) {
        if (count($assets) == 2) {
            if (
                (strpos(strtolower($assets[0]),strtolower($this->lejlaNdertese)) !== false
                    || strpos(strtolower($assets[1]),strtolower($this->lejlaNdertese)) !== false)
            && (strpos(strtolower($assets[0]),strtolower($this->lejlaToke)) !== false
                    || strpos(strtolower($assets[1]),strtolower($this->lejlaToke)) !== false)) {
                return true;
            }
        }
        return false;
    }

    public function kaLejlaDheTeTjera($assets) {
        $kaLejlaToke = false;
        $kaLejlaNdertese = false;
        if (count($assets) > 2) {
            foreach ($assets as $asset) {
                if (strpos(strtolower($asset), strtolower($this->lejlaNdertese)) !== false)
                    $kaLejlaNdertese = true;
                if (strpos(strtolower($asset), strtolower($this->lejlaToke)) !== false)
                    $kaLejlaToke = true;
            }
        }
        return $kaLejlaToke && $kaLejlaNdertese;
    }

    private function skaLejla($assets)
    {
        $kaLejlaToke = false;
        $kaLejlaNdertese = false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->lejlaNdertese)) !== false)
                $kaLejlaNdertese = true;
            if (strpos(strtolower($asset), strtolower($this->lejlaToke)) !== false)
                $kaLejlaToke = true;
        }
        return !$kaLejlaToke && !$kaLejlaNdertese;
    }

    public function kaShtylle($assets) {
        $kaShtylle = false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->shtylla)) !== false)
                $kaShtylle = true;
        }
        return $kaShtylle;
    }

    private function addToCsv($csvName, $kabina, $assets) {
        foreach ($assets as $asset) {
            $line = [$kabina, $asset];
            fputcsv($csvName, $line); # $line is an array of strings (array|string[])
        }
    }

    private function juMungonNjeAsset($assets) {
        $kaDalje = false;
        $kaTransformator = false;
        $kaPanel = false;
        $kaCele = false;
        $kaNdares = false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->dalja)) !== false)
                $kaDalje = true;
            if (strpos(strtolower($asset), strtolower($this->transformator)) !== false)
                $kaTransformator = true;
            if (strpos(strtolower($asset), strtolower($this->panel)) !== false)
                $kaPanel = true;
            if (strpos(strtolower($asset), strtolower($this->cele)) !== false)
                $kaCele = true;
            if (strpos(strtolower($asset), strtolower($this->ndares)) !== false)
                $kaNdares = true;
        }
        return (!$kaDalje && $kaTransformator && ($kaPanel || $kaCele) && $kaNdares)
            || ($kaDalje && !$kaTransformator && ($kaPanel || $kaCele) && $kaNdares)
            || ($kaDalje && $kaTransformator && !($kaPanel || $kaCele) && $kaNdares)
            || ($kaDalje && $kaTransformator && ($kaPanel || $kaCele) && !$kaNdares);
    }

    private function kaneDaljeOseLejlate($assets) {
        $kaDalje = false;
        $kaNDertese = false;
        $kaToke = false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->dalja)) !== false)
                $kaDalje = true;
            if (strpos(strtolower($asset), strtolower($this->lejlaNdertese)) !== false)
                $kaNDertese = true;
            if (strpos(strtolower($asset), strtolower($this->lejlaToke)) !== false)
                $kaToke = true;
        }
        return (count($assets) == 1 && $kaDalje) || (count($assets) ==3 && $kaDalje && $kaNDertese && $kaToke);
    }

    private function skaTransformator($assets) {
        $kaTransforamtor = false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->transformator)) !== false)
                $kaTransforamtor = true;
        }
        return !$kaTransforamtor;
    }
    private function twoorMoreTransformator($assets) {
        $kaTransforamtor = false;
        $transforamtor = 0;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->transformator)) !== false)
                $transforamtor = $transforamtor + 1;
        }
        return $transforamtor >= 2;
    }

    private function skaCeleAsPanel($assets) {
        $kaCele = false;
        $kaPanel = false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->cele)) !== false)
                $kaCele = true;
            if (strpos(strtolower($asset), strtolower($this->panel)) !== false)
                $kaPanel = true;
        }
        return !$kaCele && !$kaPanel;
    }

    private function panelPoJoCateTjera($assets) {
        $kaPanel = false;
        $kaNdares = false;
        $kaShkarkues = false;
        $kaSigurese = false;
        $kaBazamentSigurseash = false;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->panel)) !== false)
                $kaPanel = true;
            if (strpos(strtolower($asset), strtolower($this->ndares)) !== false)
                $kaNdares = true;
            if (strpos(strtolower($asset), strtolower('shkarkues tm')) !== false)
                $kaShkarkues = true;
            if (strpos(strtolower($asset), strtolower('sigurese tm')) !== false)
                $kaSigurese = true;
            if (strpos(strtolower($asset), strtolower('bazament siguresash tm')) !== false)
                $kaBazamentSigurseash = true;
        }
        return $kaPanel && (!$kaNdares || !$kaShkarkues || !$kaSigurese || !$kaBazamentSigurseash);
    }

    private function shumeLejla($assets) {
        $toke = 0;;
        $ndertese = 0;
        foreach ($assets as $asset) {
            if (strpos(strtolower($asset), strtolower($this->lejlaToke)) !== false)
                $toke++;
            if (strpos(strtolower($asset), strtolower($this->lejlaNdertese)) !== false)
                $ndertese++;
        }
        return ($toke >= 2) || ($ndertese >=2);
    }

    private function kaVetemDalje($assets) {
        $kaDalje = false;
        foreach ($assets as $asset) {
            if (count($assets) == 1 && strpos(strtolower($asset), strtolower($this->dalja)) !== false)
                $kaDalje = true;
        }
        return $kaDalje;
    }
}
