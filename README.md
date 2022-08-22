<h3 align="center"> PHP 8.1 Dynamic Form LARAVEL 9<br></h3>

<p align="center">PHP 8.1 Laravel making Dynamic Form </p>

## Setup
composer require fatihtuzlu/dynamic-form

## Usage

You can use this package in your project.

```php
<?php
$builder = new Form('title', 'name','description', 'color');

            $builderGroup = new Group($group->title, $group->name, $group->description, $group->color);
            $builder->addGroup($builderGroup);
                $builderInput = new Input(
                    $input->label,
                    $input->name,
                    $input->type,
                    $input->placeholder,
                    $input->description,
                    $input->prefix,
                    $input->suffix,
                );
                $builderGroup->addInput($builderInput);
                $builderInput->setRequired($input->required);
                $builderInput->setValue($input->value);
                if ($input->colsize) $builderInput->setColSize($input->colsize);
                $builderInput->setDisabled($input->disabled);
                $builderInput->setMultiple($input->multiple);
                $builderInput->setChecked($input->checked);
                $builderInput->setStep($input->step);
                $builderInput->setRows($input->rows);
                    $builderInput->addOption($option->id, $option->value);

                echo $builder;
?>
```


## License

MIT License

Copyright (c) 2022 Fatih Tuzlu

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

## Author

    Fatih Tuzlu <
    fatihtuzlu07@gmail.com <
