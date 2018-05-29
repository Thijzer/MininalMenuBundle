<?php

namespace Html\Element;

use Html\Html;
use Html\Functions\PaginationInterface;

class Datagrid
{
    use BuildTrait;

    private $paging;
    private $table;

    public function __construct(PaginationInterface $paging)
    {
        $this->paging = $paging;
        $this->table = new Table();
    }

    public function getTable()
    {
        return $this->table;
    }

    public function createButton(string $url, string $name, string $label = null)
    {
        $span = Html::elem('span');
        return Html::elem('a')->href($url)->_add($span->class('badge '.$label)->_add($name));
    }

    public function build()
    {
        $this->table->setData($this->paging->getCurrentPageResults());

        return Html::elem('div')->id('datagrid')
            ->_add($this->table)
            ->_add($this->getPagination())
        ;
    }

    private function getPagination()
    {
        if ($this->paging->haveToPaginate()) {
            return new Pagination($this->paging);
        }
    }
}
