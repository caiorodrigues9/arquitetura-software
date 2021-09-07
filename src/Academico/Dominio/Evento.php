<?php

namespace Caio\Arquitetura\Academico\Dominio;

interface Evento
{
    public function momento(): \DateTimeImmutable;
}