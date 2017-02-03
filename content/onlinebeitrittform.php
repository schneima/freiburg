<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<input type="checkbox" 
       name="membertype"
       value="passive"> passives Mitglied<br>
Jahresbeitrag 30.00 €
</p>

<p>
<input type="checkbox" 
       name="membertype" 
       value="supporter">förderndes Mitglied<br>
         	mit einer jährliche Spende<br>

	von 
    
    <input class="inputText" type="text" name="value"  value="30"> €
</p>

<p>
    <label for="vorname">Vorname</label>
     <input class="inputText" 
            type="text" 
            id="vorname" 
            name="Vorname" 
            value="Ihr Vorname">

    <label for="name">Name</label>
     <input class="inputText" 
            type="text" 
            id="name" 
            name="Name" 
            value="Ihr Name">
    
    <label for="street">Straße</label>
     <input class="inputText" 
            type="text" 
            id="street" 
            name="Straße" 
            value="Straße">
    
    <label for="ort">Ort</label>
     <input class="inputText" 
            type="text" 
            id="ort" 
            name="Ort" 
            value="Ort">
    
    <label for="birthday">Geburtstag</label>
     <input class="inputText" 
            type="date" 
            id="birthday" 
            name="Geburtstag" 
            value="Ihr Geburtstag">
    
    <label for="entrance">Datum Eintritt</label>
     <input class="inputText" 
            type="date" 
            id="entrance" 
            name="Eintritt" 
            value="Eintritt">
    
</p>



<p>

<h4>SEPA-Lastschriftmandat</h4>
Hiermit erlaube ich dem Musikverein/Trachtenkapelle  Bollschweil e.V. den Beitrag/Spende mittels Lastschrift von meinem Konto einzuziehen.
Hinweis: Ich kann innerhalb von acht Wochen, beginnend mit dem Belastungsdatum, die Erstattung des belasteten Betrages verlangen.
</p>


<p>
    <label for="bank">Bank</label>
    <input class="inputText" 
            type="text" 
            id="bank" 
            name="Bank" 
            value="Bank">
    <label for="ktonr">Kontonummer / IBAN</label>
    <input class="inputText" 
            type="text" 
            id="ktonr" 
            name="KtoNr" 
            value="Kontonummer / IBAN">

    <label for="blz">BLZ / SWIFT</label>
    <input class="inputText" 
            type="text" 
            id="blz" 
            name="blz" 
            value="BLZ / SWIFT">

    
    <label for="blz">Hiermit bestätige ich die oben genannten Daten und bin damit einverstanden, dass der obengennante Betrag jährlich von meinem Konto abgebucht wird.</label>
    <input type="checkbox" 
           name="agree"
           value="agree"/><br>


</p>

