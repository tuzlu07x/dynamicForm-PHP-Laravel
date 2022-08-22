<?php

namespace Dynamicform;

class Input
{
    public ?Group $group = null;
    public string $label;
    public string $name;
    public string $type;
    public string $description;
    public array $options = [];
    public string $placeHolder;
    public string $prefix;
    public string $suffix;
    public $value = null;
    public int $colSize = 12;

    public $max = null;
    public $min = null;
    public $maxLength = null;

    public bool $readOnly = false;
    public bool $disabled = false;
    public bool $required = false;
    public bool $multiple = false;
    public bool $checked = false;
    public float $step = 0.01;
    public int $rows = 3;

    public function __construct(
        string $label,
        string $name,
        string $type,
        string $placeHolder = null,
        string $description = null,
        string $prefix = null,
        string $suffix = null,
    ) {
        $this->setLabel($label);
        $this->setName($name);
        $this->setType($type);
        $this->setPlaceHolder($placeHolder ?? '');
        $this->setDescription($description ?? '');
        $this->setPrefix($prefix ?? '');
        $this->setSuffix($suffix ?? '');
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
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
    public function setGroup(Group $group): self
    {
        $this->group = $group;
        return $this;
    }
    public function setPlaceHolder(string $placeHolder): self
    {
        $this->placeHolder = $placeHolder;
        return $this;
    }
    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;
        return $this;
    }
    public function setSuffix(string $suffix): self
    {
        $this->suffix = $suffix;
        return $this;
    }
    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }
    public function setColSize(int $colSize): self
    {
        $this->colSize = $colSize;
        return $this;
    }
    public function setMax(int $max): self
    {
        $this->max = $max;
        return $this;
    }
    public function setMin(int $min): self
    {
        $this->min = $min;
        return $this;
    }
    public function setMaxLength(int $maxLength): self
    {
        $this->maxLength = $maxLength;
        return $this;
    }
    public function setDisabled(bool $disabled): self
    {
        $this->disabled = $disabled;
        return $this;
    }
    public function setRequired(bool $required): self
    {
        $this->required = $required;
        return $this;
    }
    public function setMultiple(bool $multiple): self
    {
        $this->multiple = $multiple;
        return $this;
    }
    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;
        return $this;
    }
    public function setStep($step): self
    {
        $this->step = $step;
        return $this;
    }
    public function setRows(int $rows): self
    {
        $this->rows = $rows;
        return $this;
    }

    public function name(): string
    {
        if ($this->group) {
            return $this->group->name . '[' . $this->name . ']';
        }
        return $this->name;
    }
    public function addOption($value, $label): self
    {
        $this->options[$value] = $label;
        return $this;
    }
    public function rules()
    {
        if ($this->group) {
            $name = $this->group->name . '.' . $this->name;
        } else {
            $name = $this->name;
        }
        $rules = [];
        if ($this->required) {
            $rules[] = 'required';
        } else {
            $rules[] = 'nullable';
        }
        if ($this->max) {
            $rules[] = 'max:' . $this->max;
        }
        if ($this->min) {
            $rules[] = 'min:' . $this->min;
        }
        if ($this->maxLength) {
            $rules[] = 'max:' . $this->maxLength;
        }
        return [$name => implode("|", $rules)];
    }
}
