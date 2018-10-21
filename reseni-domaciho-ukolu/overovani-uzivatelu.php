<?php

class Uzivatel
{
    private $jmeno;
    private $heslo;

    public function __construct($jmeno, $heslo)
    {
        $this->jmeno = $jmeno;
        $this->heslo = $heslo;
    }

    public function overeni($jmeno, $heslo)
    {
        return $jmeno === $this->jmeno && $heslo === $this->heslo;
    }

    public function ziskejJmeno()
    {
        return $this->jmeno;
    }
}

class Prihlasovani
{
    private $prihlaseniUzivatele = [];

    public function prihlas(Uzivatel $uzivatel, $jmeno, $heslo)
    {
        if ($uzivatel->overeni($jmeno, $heslo)) {
            $this->prihlaseniUzivatele[] = $jmeno;
        }
    }

    public function zobrazPrihlaseneUzivatele()
    {
        echo 'Prihlaseni uzivatele: ' . implode(', ', $this->prihlaseniUzivatele) . '<br>';
    }
}

$josef = new Uzivatel('josef', 'josef1234');
$prihlasovani = new Prihlasovani();

// zatim neni nikdo prihlasen
$prihlasovani->zobrazPrihlaseneUzivatele();

// prihlaseni uzivatele josef se spravnym jmenem/heslem
$prihlasovani->prihlas($josef, 'josef', 'josef1234');
$prihlasovani->zobrazPrihlaseneUzivatele();

// novy uzivatel karel
$karel = new Uzivatel('karel', 'karelABC');

// prihlaseni karla s chybnym heslem
$prihlasovani->prihlas($karel, 'karel', 'XYZ');
$prihlasovani->zobrazPrihlaseneUzivatele();

// prihlaseni karla se spravnym heslem
$prihlasovani->prihlas($karel, 'karel', 'karelABC');
$prihlasovani->zobrazPrihlaseneUzivatele();
