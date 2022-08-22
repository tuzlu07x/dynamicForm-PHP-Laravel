<?php

namespace Dynamicform;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Form
{
    protected string $title;
    protected string $name;
    protected string $description;
    protected string $color;
    protected array $groups = [];

    public function __construct(string $title = null, string $name = null, string $description = null, string $color = null)
    {
        $this->title = $title;
        $this->name = $name;
        $this->description = $description;
        $this->color = $color;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    public function __get($groups)
    {
        if (property_exists($this, $groups)) {
            return $this->$groups;
        }
    }
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getInput()
    {
        return $this->inputs;
    }
    public function groups(): array
    {
        return $this->groups;
    }

    public function addGroup(Group $group): self
    {
        $this->groups[] = $group;
        return $this;
    }
    public function addInputs(Input $input): self
    {
        $this->input[] = $input;
        return $this;
    }

    public function rules()
    {
        return collect($this->groups)->map(function ($group) {
            return collect($group->inputs)->map(function (Input $input) use ($group) {
                return $input->rules();
            })
                ->collapse()
                ->toArray();
        })
            ->collapse()
            ->toArray();
    }

    public function validate(Request $request)
    {
        $validateRules = $this->rules();
        $validator = Validator::make($request->all(), $validateRules);
        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
        return $validator->validate();
    }
}
