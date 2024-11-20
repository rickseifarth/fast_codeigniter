<?php

// funções básicas 

function simNao($valor): string
{
    if ($valor) {
        return 'Sim';
    } else {
        return 'Não';
    }
}

// criação de campos
function inputText($field_name, $label_name, $value = null)
{
    $retorno = "<div class=\"form-floating mb-4\">";
    $retorno .= form_input($field_name, old($field_name, isset($value) ? $value : ''), ['id' => $field_name, 'class' => 'form-control', 'placeholder' => $label_name]);
    $retorno .= form_label($label_name, $field_name);
    $retorno .= "</div>";
    return $retorno;
}

function inputNumber($field_name, $label_name, $value = null)
{
    $retorno = "<div class=\"form-floating mb-4\">";
    $retorno .= form_input($field_name, old($field_name, isset($value) ? $value : ''), ['id' => $field_name, 'class' => 'form-control', 'placeholder' => $label_name], 'number');
    $retorno .= form_label($label_name, $field_name);
    $retorno .= "</div>";
    return $retorno;
}

function inputTextArea($field_name, $label_name, $value = null)
{
    $retorno = "<div class=\"form-floating mb-4\">";
    $retorno .= form_textarea($field_name, old($field_name, isset($value) ? $value : '', 'raw'), ['id' => $field_name, 'class' => 'form-control', 'placeholder' => $label_name]);
    $retorno .= form_label($label_name, $field_name);
    $retorno .= "</div>";
    return $retorno;
}

function inputEmail($field_name, $label_name, $value = null)
{
    $retorno = "<div class=\"form-floating mb-4\">";
    $retorno .= form_input($field_name, old($field_name, isset($value) ? $value : ''), ['class' => 'form-control', 'inputmode' => 'email', 'autocomplete' => 'email', 'placeholder' => $label_name]);
    $retorno .= form_label($label_name, $field_name);
    $retorno .= "</div>";
    return $retorno;
}

function inputPass($field_name, $label_name, $value = null)
{
    $retorno = "<div class=\"form-floating mb-4\">";
    $retorno .= form_input($field_name, old($field_name, isset($value) ? $value : ''), ['class' => 'form-control', 'autocomplete' => 'current-password', 'placeholder' => $label_name], 'password');
    $retorno .= form_label($label_name, $field_name);
    $retorno .= "</div>";
    return $retorno;
}

function inputFile($field_name, $label_name)
{
    $retorno = "<div class=\"form-floating mb-4\">";
    $retorno .= form_input($field_name, '', ['class' => 'form-control', 'autocomplete' => 'current-password', 'placeholder' => $label_name], 'file');
    $retorno .= form_label($label_name, $field_name);
    $retorno .= "</div>";
    return $retorno;
}

function inputDate($field_name, $label_name, $value = null)
{
    $retorno = "<div class=\"form-floating mb-4\">";
    $retorno .= form_input($field_name, old($field_name, isset($value) ? $value : ''), ['id' => $field_name, 'class' => 'form-control', 'placeholder' => "dd/mm/yyyy", 'format' => 'dMY', 'autocomplete' => 'false']);
    $retorno .= form_label($label_name, $field_name);
    $retorno .= "</div>";
    return $retorno;
}

function inputTime($field_name, $label_name, $value = null)
{
    $retorno = "<div class=\"form-floating mb-4\">";
    $retorno .= form_input($field_name, old($field_name, isset($value) ? $value : ''), ['id' => $field_name, 'class' => 'form-control', 'placeholder' => $label_name], 'time');
    $retorno .= form_label($label_name, $field_name);
    $retorno .= "</div>";
    return $retorno;
}

function inputHidden($field_name, $value = null)
{
    return form_hidden($field_name, isset($value) ? $value : old($field_name, ''));
}

// Facilitadores de JS
function trumbowyg($field_name)
{
    $retorno = "
        $('#$field_name').trumbowyg({
            lang: 'pt_br',
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['foreColor', 'backColor'],
                ['superscript', 'subscript'],
                ['link'],
                ['emoji'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ]
        });";
    return $retorno;
}

function inputFormat($field_name, $format, $reverse = 'false')
{
    $retorno = "$('#$field_name').mask('$format', {reverse: $reverse})";
    return $retorno;
}

function timepicker($field_name)
{
    return "
      $('#$field_name').datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado' ],
        dayNamesMin: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
        monthNames: [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
        changeYear: true,
        yearRange: '" . date('Y') - 100 . ":" . date('Y') . "'});";
}


//facilitadores no controller

//ajustar quando temos checkbox que devem votlar como boolean pra base
function ajustarBooleano($dados, $campo)
{
    if (!isset($dados[$campo])) {
        $dados[$campo] = "0";
    } else {
        $dados[$campo] = "1";
    }

    return $dados;
}
