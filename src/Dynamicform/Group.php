<?php

namespace Dynamicform;

class Group
{

    protected string $title;
    protected string $name;
    protected string $description;
    protected string $color;
    protected array $inputs = [];

    public function __construct(string $title = null, string $name = null, string $description = null, string $color = null)
    {
        $this->title = $title;
        $this->name = $name;
        $this->description = $description;
        $this->color = $color;
    }
    public function __get($input)
    {
        if (property_exists($this, $input)) {
            return $this->$input;
        }
    }
    public function inputs(): array
    {
        return $this->inputs;
    }
    public function addInput(Input $input): Input
    {
        $input->setGroup($this);
        $this->inputs[] = $input;
        return $input;
    }
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setColSize(int $colSize): self
    {
        $this->colSize = $colSize;
        return $this;
    }
    public function getLabel()
    {
        $this->label;
    }
    public function getName()
    {
        $this->name;
    }
    public function getDescription()
    {
        $this->description;
    }
    public function getColSize()
    {
        $this->colSize;
    }
}
