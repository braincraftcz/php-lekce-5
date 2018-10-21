<?php

interface TrojrozmernyObrazec
{
    public function ziskejObjem();

    public function ziskejPovrch();
}

class Krychle implements TrojrozmernyObrazec
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function ziskejObjem()
    {
        return $this->a ** 3;
    }

    public function ziskejPovrch()
    {
        return 6 * ($this->a ** 2);
    }
}

class Kvadr implements TrojrozmernyObrazec
{
    private $a;
    private $b;
    private $c;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function ziskejObjem()
    {
        return $this->a * $this->b * $this->c;
    }

    public function ziskejPovrch()
    {
        return 2 * (($this->a * $this->b) + ($this->a * $this->c) + ($this->b * $this->c));
    }
}

class Koule implements TrojrozmernyObrazec
{
    private $r;

    public function __construct($r)
    {
        $this->r = $r;
    }

    public function ziskejObjem()
    {
        return (4 * M_PI * ($this->r ** 3)) / 3;
    }

    public function ziskejPovrch()
    {
        return 4 * M_PI * ($this->r ** 2);
    }
}

class Jehlan implements TrojrozmernyObrazec
{
    private $a;
    private $v;

    public function __construct($a, $v)
    {
        $this->a = $a;
        $this->v = $v;
    }

    public function ziskejObjem()
    {
        return (($this->a ** 2) * $this->v) / 3;
    }

    public function ziskejPovrch()
    {
        $vs = sqrt($this->v + ($this->a ** 2) / 4);

        return 2 * $this->a * $vs;
    }
}

function vypisObjem(TrojrozmernyObrazec $obrazec) {
    echo get_class($obrazec) . ' ma objem ' . $obrazec->ziskejObjem() . '<br>' . "\n";
}

function vypisPovrch(TrojrozmernyObrazec $obrazec) {
    echo get_class($obrazec) . ' ma povrch ' . $obrazec->ziskejPovrch() . '<br>' . "\n";
}

$obrazce = [
    new Krychle(5),
    new Kvadr(2, 3, 7),
    new Koule(6),
    new Jehlan(3, 4)
];

foreach ($obrazce as $obrazec) {
    vypisObjem($obrazec);
    vypisPovrch($obrazec);
}
