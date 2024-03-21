@php

    setlocale(LC_TIME, 'es_ES', 'esp_esp');
    date_default_timezone_set('America/Bogota');

    $radicado = '';
    $hora = '';
    $minutos = '';
    $radicado = substr($codigo, 12, 15);
    $hora = substr($codigo, 8, -12);
    $minutos = substr($codigo, 10, -10);

@endphp

<style type="text/css">
    th,
    td {
        margin: 0px 0px;
        padding: 0px;
    }

    .container {
        width: 90%;
    }

    .titulo {
        font-family: "Comic Sans MS", cursive;
        font-size: 10px;
    }


    body,
    td,
    th {
        color: #000;
        font-family: Terminal;
    }

    .td font {
        font-size: 16px;
        font-family: Terminal;
    }

    .TD {
        font-size: 16px;
    }

    .td {
        font-family: Fixedsys;
    }
</style>


<table width="379" style="line-height: 90%">

    <tr>

        <td width="100" align="left">{!! DNS1D::getBarcodeHTML("$codigo", 'C128C') !!}</td>
        <td width="101" rowspan="4" align="left" valign="top" nowrap="nowrap"> &nbsp;&nbsp;<img
                src="{{ asset('img/logo2.png') }}" width="76" height="74" /></td>
    </tr>
    <tr>

        <td>

            <font SIZE=2 face="Verdana">&nbsp;&nbsp;&nbsp;&nbsp;COMUNICACIONES ENVIADAS</font>

        </td>
    </tr>

    <tr>
        <td valign="top" align="left">
            <font SIZE=2.8>&nbsp;&nbsp;&nbsp;&nbsp;@php echo ucfirst(strftime('%B %d ,  %Y &nbsp; &nbsp;  %I:%M')); @endphp</font>
        </td>
    </tr>

    <td " align=" left" valign="top" nowrap="nowrap"><span class="td">
         <FONT face="terminal" SIZE=2>&nbsp;&nbsp;&nbsp;Radicado</font>
      </span>
      <FONT face="terminal" SIZE=2 class="TD"> &nbsp; &nbsp; &nbsp;</font></span>
      <font face="terminal"> <strong>{{ $radicado }}</strong></font>
   </td>
   <tr>

      <td align="left" valign="top" nowrap="nowrap"></td>
   </tr>

</table>
<style>

</style>
